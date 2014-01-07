<?php

class TaxData extends DataObject{
	private static $db = array(
		'YearsDelinquent' => 'Varchar',  //this is the number of years the property has been tax delinquent
		'TotalTaxDelinquency' => 'Varchar', //this is the total dollar amount of the taxes in arrears
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
