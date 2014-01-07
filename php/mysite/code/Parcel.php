<?php

/* Parcel Data Partially Based on PHLAPI: http://phlapi.com/licenseapi.html#histories */

class Parcel extends DataObject {
   private static $db = array(
      'LocationId' => 'Int',
      'StreetNumber' => 'Varchar', 
      'StreetName' => 'Varchar(100)', 
      'StreetSuffix' => 'Varchar', 
      'StreetDirection' => 'Varchar', 
      'City' => 'Varchar(50)', 
      'State' => 'Varchar', 
      'Zip' => 'Varchar',
      'X' => 'Decimal', //X NARD83 HARD
      'Y' => 'Decimal', //Y NARD83 HARD
      'CensusTract' => 'Varchar',
      'UnitNumber' => 'Varchar', 
      'CondoUnit' => 'Varchar',
      'Ward' => 'Varchar',
      'YearsDelinquent' => 'Varchar',
      'TotalDelinquency' => 'Varchar',
      'Sale' => 'Varchar',



   );
   private static $has_one = array(
      'PrimaryContact' => 'Contact',
      'TaxData' => 'TaxData',
   );

   private static $many_many = array(
      'Relatives' => 'Contact'
   );
}
?>