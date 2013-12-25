<?php

global $project;
$project = 'mysite';

global $database;
$database = 'parcel';

// Use _ss_environment.php file for configuration
require_once("conf/ConfigureFromEnv.php");

MySQLDatabase::set_connection_charset('utf8');

// Set the current theme. More themes can be downloaded from
// http://www.silverstripe.org/themes/
Director::set_environment_type("dev");
//SSViewer::setOption('rewriteHashlinks', false);
//Security::setDefaultAdmin('admin','sw0rdfish');
// Set the site locale
//SiteConfig::add_extension('SiteConfigExtension');
i18n::set_locale('en_US');
//SS_Log::add_writer(new SS_LogEmailWriter('admin@phillypolice.com'), SS_Log::ERR);
//SS_Log::add_writer(new SS_LogEmailWriter('admin@phillypolice.com'), SS_Log::WARN, '<=');
