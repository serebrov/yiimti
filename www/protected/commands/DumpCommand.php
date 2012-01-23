<?php

/*
 * DumpCommand class file.
 *
 * @author seb
 * @package app.commands
 */

/**
 * Dumps a database tables / data to the migration command
 * based on
 * http://www.yiiframework.com/forum/index.php?/topic/17222-dump-db-records-for-db-migration/
 */
class DumpCommand extends CConsoleCommand {

	/**
	 * (non-PHPdoc)
	 * @see CConsoleCommand::getHelp()
	 */
	public function getHelp() {
		return <<<EOD
USAGE
  yiic dump <config-file>

DESCRIPTION
  This command dumps database tables structure / data to standard output

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
                $this->showCreateInfo($tableDefinition);
            }
            if ($data) {
                $this->showData($tableDefinition, $condition);
            }
        }

    }

    protected function showCreateInfo($def) {
        $result .= '$this->createTable("' . $def->name . '", array(' . "\n";
        foreach ($def->columns as $col) {
            $result .= '    "' . $col->name . '"=>"' . $this->getColType($col) . '",' . "\n";
        }
        $result .= '), "");' . "\n\n";
        echo $result;
    }

    protected function showData($def, $condition) {
        $data = Yii::app()->db->createCommand()
            ->from($def->name)
            ->where($condition)
            ->query();
        $result = '';
        foreach ($data AS $row) {
            $result .= '$this->insert("' . $def->name . '", array(' . "\n";
            foreach($row AS $column => $value) {
                $result .= '    "' . $column . '"=>"' .  $value . '",' . "\n";
            }
            $result .= ') );' . "\n\n";
        }
        echo $result;
    }
}