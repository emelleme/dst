<?php
class ParcelCsvBulkLoader extends CsvBulkLoader {
   public $columnMap = array(
      'PARCEL' => 'LocationId', 
      'NUMBER' => 'StreetNumber', 
      'STREET' => 'StreetName', 
      'TYPE' => 'StreetType', 
      'City' => 'City', 
      'TYPE' => 'StreetType',
      'DIRECTION' => 'StreetDirection',
      'Dead_Alone' => 'PrimaryContact.Deceased',
      'FIRST' => 'PrimaryContact.FirstName',
      'LAST' => 'PrimaryContact.LastName',
      'TloPhone1' => 'PrimaryContact.PhoneNumber'
   );
   public $duplicateChecks = array(
      'PARCEL' => 'LocationId'
   );
   public $relationCallbacks = array(
      'PrimaryContact.PhoneNumber' => array(
         'relationname' => 'PrimaryContact',
         'callback' => 'getPrimaryContact'
      )
   );
   public static function importFirstAndLastName(&$obj, $val, $record) {
      $parts = explode(' ', $val);
      if(count($parts) != 2) return false;
      $obj->FirstName = $parts[0];
      $obj->LastName = $parts[1];
   }
   public static function getPrimaryContact(&$obj, $val, $record) {
      return Contact::get()->filter('PhoneNumber', $val)->First();
   }
}
?>