<?php

/*
 * DumpSQLCommand class file.
 *
 * @author seb
 * @package app.commands
 */

/**
 * Dumps a database tables / data to the SQL script
 */
class DumpSQLCommand extends CConsoleCommand {

	/**
	 * (non-PHPdoc)
	 * @see CConsoleCommand::getHelp()
	 */
	public function getHelp() {
		return <<<EOD
USAGE
  yiic dumpSQL <config-file>

DESCRIPTION
  This command dumps database tables data to standard output

PARAMETERS
 * config-file: required, the path of the configuration file. You can find
   an example in framework/messages/config.php.

   The file can be placed anywhere and must be a valid PHP script which
   returns an array of name-value pairs. Each name-value pair represents
   a configuration option.

   The following options must be specified:

   - tables: array, tables to dump data from, each array element can be:
     - a string - table name
     - string key => string value - table name => data select condition
   - createInfo: boolean, default true, whether to generate create statements
   - createOptions: string, additional options to add to create table statements
   - data: boolean, default true, whether to generate data insert statements

EOD;
	}

    /**
     * (non-PHPdoc)
     * @see CConsoleCommand::run()
     */
    public function run($args) {
		if(!isset($args[0]))
			$this->usageError('the configuration file is not specified.');
		if(!is_file($args[0]))
			$this->usageError("the configuration file {$args[0]} does not exist.");

		$config=require_once($args[0]);
		extract($config);

		if(!isset($tables) || !is_array($tables))
			$this->usageError('The "tables" parameter must be an array.');
		if(!isset($createInfo))
            $createInfo = true;
		if(!isset($createOptions))
            $createOptions = null;
		if(!isset($data))
            $data = true;

        foreach ($tables as $key => $val) {
            if (is_numeric($key)) {
                $table = $val;
                $condition = '1 = 1';
            } else {
                $table = $key;
                $condition = $val;
            }
            $tableDefinition = Yii::app()->db->schema->getTable($table);
            if (!$tableDefinition) {
                $this->usageError("the table '{$table}' can not be found in the database.");
            }
            if ($createInfo) {
                $this->showCreateInfo($tableDefinition, $createOptions);
            }
            if ($data) {
                $this->showData($tableDefinition, $condition);
            }
        }

    }

    /**
     * Outputs create table statement
     * @param CDbTableSchema $def table definition
     */
    protected function showCreateInfo($def, $createOptions) {
        $columns = array();
        foreach ($def->columns as $colName=>$colDef) {
            $columns[$colName] = $colDef->type;
        }
        if (is_string($def->primaryKey)) {
            $columns[] = "PRIMARY KEY ('{$def->primaryKey}')";
        } else {
            $pkCol = "PRIMARY KEY (";
            foreach ($def->primaryKey as $colName) {
                $pkCol .= "'$colName',";
            }
            $pkCol[count($pkCol)-1] = ')';
            $columns[] = $pkCol;
        }
        //add primary key to columns -  PRIMARY KEY (`id`) or 'PRIMARY KEY (name, type)'

        $result = "DROP TABLE IF EXISTS `{$def->name}`;\n";
        $result .= Yii::app()->db->schema->createTable($def->name, $columns, $createOptions);
        foreach ($def->foreignKeys as $colName => $keyData) { //foreignTable => $foreignColumn
            $name = 'fk_' . $def->name . '_' . $keyData[0];
            $result .= Yii::app()->db->schema->addForeignKey($name,
                $def->name, $colName, $keyData[0], $keyData[1]);
        }
        $result .= ";\n\n";
        //foreach ($def->indexes as ...) not supported?
        echo $result;
    }

    protected function showData($def, $condition) {
        $data = Yii::app()->db->createCommand()
            ->from($def->name)
            ->where($condition)
            ->query();
        if (count($data) == 0) return;
        $result = "INSERT INTO `{$def->name}` (";
        foreach($def->columns as $name => $colDef) {
            $result .= "`$name`,";
        }
        $result[strlen($result)-1] = ')';
        $result .= ' VALUES ';
        foreach ($data AS $row) {
            $result .= '(';
            foreach($row AS $column => $value) {
                if ($value == null) {
                    $result .= "NULL,";
                } elseif (is_integer($value)) {
                    $result .= "$value,";
                } else {
                    $result .= "'$value',";
                }
                $result[strlen($result)-1] = ',';
            }
            $result[strlen($result)-1] = ')';
            $result .= ',';
        }
        $result[strlen($result)-1] = ';';
        $result .= "\n\n";
        echo $result;
    }
}