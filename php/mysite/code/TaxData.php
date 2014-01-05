<?php

class TaxData extends DataObject{
	private static $db = array(
		'LastName' => 'Varchar',
		'FirstName' => 'Varchar',
	);

	private static $defaults = array(
	);

	private static $has_many = array(
		'Parcel' => 'Parcel'
	);

	private static $belongs_many_many = array(
	);
	
	static $api_access = true;
	
	
	
    
	/*static $searchable_fields = array(
    //"DistrictID",
    );*/ 
    
	public function getCMSFields()
	{
	    $fields = parent::getCMSFields();
		return $fields;
	}

}
