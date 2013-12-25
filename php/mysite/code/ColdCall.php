<?php

     	#doc
	#	classname:	TwitterTask
        #	scope:          PUBLIC
        #
	#/This task checks twitter ever hour for the latest updates


class ColdCall extends CliController {

    /**
     * cold call number
     * cronjobs.
     *
     * @var boolean
     */
    protected $toCall = false;

    /**
     * cold call number
     * cronjobs.
     *
     * @var boolean
     */
    protected $isEnabled = true;


    function process() {
    if(Director::is_cli()){
        list($usec, $sec) = explode(' ', microtime());
        $script_start = (float) $sec + (float) $usec;

        printf('Initiating Call...');
        // This task initiates a cold call to the number passed by variable
        $t = new Services_Twilio($_ENV['TWILIO_SID'],$_ENV['TWILIO_TOKEN']);
        $t = $client->account->calls->create(
        '8325166865', // From a valid Twilio number
        '7137020650', // Call this number

        // Read TwiML at this URL when a call connects (hold music)
        'http://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient'
        );
        
        list($usec, $sec) = explode(' ', microtime());
        $script_end = (float) $sec + (float) $usec;
        $elapsed_time = round($script_end - $script_start, 5);
        printf('Process took '.$elapsed_time.PHP_EOL);
     }
    }
}