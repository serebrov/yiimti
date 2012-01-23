<?php

/*
* MysqlCommand class file.
*
* @author seb
* @package app.commands
*/

/**
* Dumps a database tables / data using mysqldump programm
*/
class MysqlCommand extends CConsoleCommand {

    /**
     * @var string path to mysql program
     */
    public $mysql = 'mysql';
    /**
     * @var string path to the mysqldump program
     */
    public $mysqldump = 'mysqldump';

    /**
     * @var string database host, will override a db name from the app config
     */
    public $dbHost = "localhost";
    /**
     * @var string database name, will override a db name from the app config
     */
    public $dbName;
    /**
     * @var string database user name, will override a user name from the app config
     */
    public $username;
    /**
     * @var string database passwors, will override a password from the app config
     */
    public $password;

    /**
     * @var string the application component ID that specifies the database connection
     */
    public $connectionID='db';

    /**
    * (non-PHPdoc)
    * @see CConsoleCommand::getHelp()
    */
    public function getHelp() {
        return <<<EOD
USAGE
yiic mysql <command> [options]

DESCRIPTION
This command executes extrnal shell program

PARAMETERS
* command: dump | exec | script
* options: options for specified command

Mysqldump invokes mysqldump command and allows to dump db structure and data
    yiic mysql dump [options]

Exec invokes mysql program and allows to execute a single line sql
    yiic mysql exec <sql> [options]

Script invokes mysql program and allows to execute an sql script from a file
    yiic mysql script <file> [options]

EXAMPLES
   * yiic mysql dump
   Makes a database dump, db access parameters are taken from the config file
   * yiic mysql dump --username=root --password=pass
   Makes a database dump, db username and password provided as parameters
   * yiic mysql dump --mysqldump='/usr/bin/mysqldump'
   Makes a database dump, custom path to mysqldump
   * yiic mysql dump --no-data
   Makes a database dump without data, '--no-data' parameter is passed to the mysqldump

   * yiic mysql exec 'select * from user'
   Executes select statement, db access parameters are taken from the config
   * yiic mysql exec 'select * from user' '-v --html=TRUE'
   Executes select, passing additional parameters to mysql
   * yiic mysql exec 'drop database if exists \$DB'
   Drops current database, \$DB placeholder is replaced with database name from the config
   * yiic mysql exec 'CREATE DATABASE \$DB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci'
   Creates databse, \$DB placeholder is replaced with database name from the config

   * yiic mysql script path/to/test_data.sql 1> /dev/null 2> error.tmp
   Executes sql script form the file

EOD;
    }

    /**
     * Invokes mysqldump program
     * @param array $args additional mysqldump options
     */
    public function actionDump($args) {
        $options = '';
        foreach ($args as $arg) {
            $options .= ' ' . $arg;
        }

        $dbParams = $this->getDbParams();
        extract($dbParams);
        $password = $password ? '-p '. $password : '';
        $username = '-u '. $username;
        echo shell_exec("{$this->mysqldump} $username $password -c $dbName $dbhost $options");
    }

    /**
     * Invokes mysql program
     * @param array $args first element should be sql string to exeute, other elements
     * are additional mysql options
     */
    public function actionExec($args) {
        if(isset($args[0])) {
            $sql=$args[0];
        } else {
            $this->usageError('Please provide the sql to execute.');
        }
        $options = '';
        foreach ($args as $i => $arg) {
            if ($i > 0) $options .= ' ' . $arg;
        }

        $dbParams = $this->getDbParams();
        extract($dbParams);
        $password = $password ? '--password='. $password : '';
        $username = '--user='. $username;

        $matchCount = 0;
        $sql = str_replace('$DB', $dbName, $sql, $matchCount);
        if (!$matchCount) {
            //if db name was not specified in the SQL - add it as last parameter to mysql
            $options .= ' ' . $dbName;
        }
        if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
            //windows's echo does not work when string is quoted, linux's - vise versa
            $sql = '"' . $sql . '"';
        }
        echo "echo $sql | {$this->mysql} $username $password $dbhost $options\n"; //TODO: debugging command line
        echo shell_exec("echo $sql | {$this->mysql} $username $password $dbhost $options");
    }

    /**
     * Invokes mysql program
     * @param array $args first element should be file name with sql script to exeute,
     * other elements are additional mysql options
     */
    public function actionScript($args) {
        if(isset($args[0])) {
            $script=$args[0];
        } else {
            $this->usageError('Please provide the file name with sql script to execute.');
        }
        $options = '';
        foreach ($args as $i => $arg) {
            if ($i > 0) $options .= ' ' . $arg;
        }

        $dbParams = $this->getDbParams();
        extract($dbParams);
        $password = $password ? '--password='. $password : '';
        $username = '--user='. $username;
        echo "{$this->mysql} $username $password $options $dbName $dbhost < $script\n";//TODO: debugging command line
        echo shell_exec("{$this->mysql} $username $password $options $dbName $dbhost < $script");
    }

    protected function getDbParams() {
        $dsn = array();
        //'connectionString' => 'mysql:host=localhost;dbname=appceo',
        $components = Yii::app()->getComponents(false);
        //db component should not be loaded - we do not use direct db operations
        //so we should get its config as array
        $dbConfig = $components[$this->connectionID];
        preg_match_all('/dbname=([^;^$]*)[;$]?/', $dbConfig['connectionString'], $dsn);
        $dbName = $this->dbName? $this->dbName : $dsn[1][0];
        preg_match_all('/host=([^;^$]*)[;$]?/', $dbConfig['connectionString'], $dsn);
        $dbhost = "--host=".($dsn[1][0] ? $dsn[1][0] : $this->dbHost);
        $username = $this->username ? $this->username : $dbConfig['username'];
        $password = $this->password ? $this->password : $dbConfig['password'];
        return compact('dbName', 'username', 'password', 'dbhost');
    }
}
