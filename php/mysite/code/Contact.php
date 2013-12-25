<?php

class Contact extends DataObject{
	private static $db = array(
		'Address' => 'Varchar',
		'City' => 'Varchar',
		'ParcelId' => 'Varchar',
		'PhoneNumber' => 'Varchar',
		'PhoneType' => 'Varchar',
		'OutboundAttempts' => 'Int',
		'InboundAttempts' => 'Int'
	);

	private static $defaults = array(
		'OutboundAttempts' => 0,
		'InboundAttempts' => 0
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