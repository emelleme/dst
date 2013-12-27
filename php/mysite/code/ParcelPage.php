<?php

class ParcelPage extends Page {

}
class ParcelPage_Controller extends Page_Controller {
    private static $allowed_actions = array (
        'SoundForm','index','AllParcels'
    );

    public function index(SS_HTTPRequest $request){
        $this->Content = $this->AllParcels();
        return $this->render();
    }

    public function AllParcels()
    {
        $g = CallDetails::get()->First();
        $cd = ($g) ? $g : false;
        $d = new ArrayList();
        for ($i=0; $i < 4; $i++) { 
            $o = Injector::inst()->get('DataObject');
            $o->Title = 'Test';
            $d->add($o);
        }
        if($cd){
            $gridField = new GridField('pages', 'All pages', $d); 
            $dataColumns = $gridField->getConfig()->getComponentByType('GridFieldDataColumns');
            $dataColumns->setDisplayFields(array(
                'Title' => 'Title',
                'ID'=> 'ID'
            ));
            return new Form($this, "AllParcels", new FieldList($gridField), new FieldList());
        }else{
            'Upload files below.';
        }
    }
    public function SoundForm() {
        $fields = new FieldList(
            $field1 = new UploadField('SoundClip', 'Upload SoundClip (minimum 15 sec; must be mp3)'),
            $l = new LiteralField('Notice', 'Note, the previous sound will be removed.'),
            $field2 = new UploadField('ParcelsFile', 'Upload CSV of Parcels'),
            $l2 = new LiteralField('ParcelsFormat', 'CSV should contain phone number fields.')
        ); 
        $field1->setFolderName('sounds'); // Block access to Silverstripe assets library
        $field1->setAllowedExtensions(array('mp3','wav')); // Don't show target filesystem folder on upload field
        $field2->setFolderName('csv'); // Block access to Silverstripe assets library
        $field2->setAllowedExtensions(array('csv')); // Don't show target filesystem folder on upload field
        $field1->relationAutoSetting = false; // Prevents the form thinking the GalleryPage is the underlying object
        $field2->relationAutoSetting = false; // Prevents the form thinking the GalleryPage is the underlying object
        $actions = new FieldList(FormAction::create("submit")->setTitle("Save"));
        return new Form($this, 'SoundForm', $fields, $actions, null);
    }

 
    public function submit($data, Form $form) {
        // Remove files
        //$f = Folder::find_or_make('/sounds');
        //var_dump();
        /*$files = glob(); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }*/
        $g = CallDetails::get()->First();
        $gallery = ($g) ? $g : new CallDetails();
        $form->saveInto($gallery);
        $gallery->write();
        Controller::curr()->redirect('index');
    }

    public function submitParcels($data, Form $form) {
        // Remove files
        //$f = Folder::find_or_make('/sounds');
        //var_dump();
        /*$files = glob(); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }
        $gallery = new File();
        $form->saveInto($gallery);
        $gallery->write();
        return $this;*/
        return $this;
    }
}