<?php

class ParcelPage extends Page {

}
class ParcelPage_Controller extends Page_Controller {
    private static $allowed_actions = array (
        'submitSound'
    );
    public function SoundForm() {
        $fields = new FieldList(
            $field = new UploadField('SoundClip', 'Upload SoundClip (minimum 15 sec; must be mp3)'),
            $l = new LiteralField('Notice', 'Note, the previous sound will be removed.'),
            $field2 = new UploadField('ParcelsFile', 'Upload CSV of Parcels'),
            $l2 = new LiteralField('ParcelsFormat', 'CSV should contain phone number fields.')
        ); 
        $field1->setFolderName('sounds'); // Block access to Silverstripe assets library
        $field1->setAllowedExtensions(array('mp3','wav')); // Don't show target filesystem folder on upload field
        $field1->setFolderName('csv'); // Block access to Silverstripe assets library
        $field1->setAllowedExtensions(array('csv')); // Don't show target filesystem folder on upload field
        $field->relationAutoSetting = false; // Prevents the form thinking the GalleryPage is the underlying object
        $actions = new FieldList(new FormAction('submit', 'Save'));
        return new Form($this, 'submit', $fields, $actions, null);
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

        $gallery = new CallDetails();
        $form->saveInto($gallery);
        $gallery->write();
        return $this;
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