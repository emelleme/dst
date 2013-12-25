<?php

$allowed_hosts = array('preview.phillypolice.com', 'dev.phillypolice.com');
define('SS_ENVIRONMENT_TYPE', 'dev');
define('SS_DATABASE_SERVER', $_ENV['OPENSHIFT_MYSQL_DB_HOST']);
define('SS_DATABASE_PORT', $_ENV['OPENSHIFT_MYSQL_DB_PORT']);
define("SS_DATABASE_USERNAME", "$_ENV['OPENSHIFT_MYSQL_DB_USERNAME']");
define('SS_DATABASE_PASSWORD', '$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']');
//define('SS_DEFAULT_ADMIN_USERNAME', 'admin');
//define('SS_DEFAULT_ADMIN_PASSWORD', 'sw0rdfish');

global $_FILE_TO_URL_MAPPING;
$_FILE_TO_URL_MAPPING[$_ENV['OPENSHIFT_REPO_DIR'].'php'] = 'http://parcel-maxglass.rhcloud.com/';

