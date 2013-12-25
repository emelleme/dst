<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
        "type" => 'MySQLDatabase',
        "server" => '127.2.188.130',
        "username" => $_ENV['OPENSHIFT_MYSQL_DB_HOST'],
        "password" => 'bc68E-QSE8Fd',
        "database" => 'parcels',
        "port" => $_ENV['OPENSHIFT_MYSQL_DB_PORT']
);

// Set the site locale
i18n::set_locale('en_US');
