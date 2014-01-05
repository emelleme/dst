<?php

class Contact extends DataObject{
	private static $db = array(
		'LastName' => 'Varchar',
		'FirstName' => 'Varchar',
		'PhoneNumber' => 'Varchar',
		'PhoneType' => 'Varchar',
		'OutboundAttempts' => 'Int',
		'InboundAttempts' => 'Int',
		'Deceased' => 'Varchar'
	);

	private static $defaults = array(
		'OutboundAttempts' => 0,
		'InboundAttempts' => 0
	);

	private static $has_many = array(
		'PrimaryParcels' => 'Parcel.PrimaryContact'
	);

	private static $belongs_many_many = array(
		'RelativeParcels' => 'Parcel'
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