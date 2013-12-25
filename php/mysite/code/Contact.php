<?php

class Contact extends DataObject{
	private static $db = array(
		'Address' => 'Varchar',
		'City' => 'Varchar',
		'ParcelId' => 'Varchar',
		'PhoneNumber' => '',
		'PhoneType' => 'Varchar',
		'OutboundAttempts' => 'Int',
		'InboundAttempts' => 'Int'
	);

	private static $defaults = array(
	);

	private static $has_one = array(
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