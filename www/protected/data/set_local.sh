#!/bin/sh

SCRIPT_PATH=`dirname $0`
YIIC=$SCRIPT_PATH/../yiic

$YIIC mysql exec 'DROP DATABASE IF EXISTS $DB' -v
$YIIC mysql exec 'CREATE DATABASE $DB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci' -v

$YIIC mysql script $SCRIPT_PATH/schema.mysql.sql 1> /dev/null 2>> error.tmp
$YIIC migrate --interactive=0  1> migrate.tmp

if grep -q "Migrated up successfully." migrate.tmp
then
    echo "Migration: OK"
else
    cat migrate.tmp >> error.tmp
fi
rm migrate.tmp

if [ ! -s error.tmp ]
then
    echo 'Database setup succesfully!!!'
    rm error.tmp
else
    echo 'Found errors in database setup!!!'
    cat error.tmp
    rm error.tmp
    exit 1
fi
