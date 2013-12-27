<?php

class CallDetails extends DataObject{
	private static $has_one = array(
		'SoundClip' => 'File',
		'ParcelsFile' => 'File'
	);

	private static $defaults = array(
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