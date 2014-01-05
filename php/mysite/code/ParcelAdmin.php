<?php
class ParcelAdmin extends ModelAdmin {
   private static $managed_models = array(
      'Parcel'
   );
   private static $model_importers = array(
      'Parcel' => 'ParcelCsvBulkLoader', 
   );
   private static $url_segment = 'parcels';
}
?>