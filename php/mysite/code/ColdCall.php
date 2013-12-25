<?php

     	#doc
	#	classname:	TwitterTask
        #	scope:          PUBLIC
        #
	#/This task checks twitter ever hour for the latest updates


class ColdCall extends Controller {

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
    protected $enabled = true;


    function index($request) {
        list($usec, $sec) = explode(' ', microtime());
        $script_start = (float) $sec + (float) $usec;
        if($request->getVar('dial') === 0) {
                $this->toCall = false;
        } else {    //verbose logging is the default, unless we specify otherwise
                $this->toCall = $request->getVar('dial');
                $num = Contact::get()->filter(array('PhoneNumber'=>$this->toCall))->First();
                if(!$num){
                    $num = new Contact();
                    $num->PhoneNumber = $this->toCall;
                    $num->Address = ($request->getVar('address') !== 0) ? $request->getVar('address');
                    $num->ParcelId = ($request->getVar('parcel') !== 0) ? $request->getVar('parcel');
                    $num->write();
                }
        }
        if($this->toCall){
            printf('Initiating Call to '.$this->toCall.PHP_EOL);
            // This task initiates a cold call to the number passed by variable
            $t = new Services_Twilio($_ENV['TWILIO_SID'],$_ENV['TWILIO_TOKEN']);
            $tcall = $t->account->calls->create(
            '2673314081', // From a valid Twilio number
            $this->toCall, // Call this number

            // Read TwiML at this URL when a call connects (hold music)
            'http://twimlets.com/echo?Twiml=%3CResponse%3E%3CPlay%3Ehttp://live.phillyopen.org/MerryChristmas.wav%3C/Play%3E%3C%2FResponse%3E',
            array('Record'=>true)
            );
            $num->OutboundAttempts = $num->OutboundAttempts+1;
            $num->write();
        }else{
            printf('Please enter a phone number.'.PHP_EOL);
        }
        
        
        list($usec, $sec) = explode(' ', microtime());
        $script_end = (float) $sec + (float) $usec;
        $elapsed_time = round($script_end - $script_start, 5);
        printf('Process took '.$elapsed_time.PHP_EOL);
    }
}