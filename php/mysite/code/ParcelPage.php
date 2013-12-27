<?php

class ParcelPage extends Page {

}
class ParcelPage_Controller extends Page_Controller {
    private static $allowed_actions = array (
        'submitSound'
    );
    public function SoundForm() {
        $fields = new FieldList(
            $field = new UploadField('SoundClip', 'Upload SoundClip (min. 15 sec; must be mp3)'),
            $l = new LiteralField('Notice', 'Note, the previous sound will be removed.')
        ); 
        $field->setFolderName('sounds'); // Block access to Silverstripe assets library
        $field->setAllowedExtensions(array('mp3')); // Don't show target filesystem folder on upload field
        $field->relationAutoSetting = false; // Prevents the form thinking the GalleryPage is the underlying object
        $actions = new FieldList(new FormAction('submitSound', 'Save Sound'));
        return new Form($this, 'Form', $fields, $actions, null);
    }
 
    public function submitSound($data, Form $form) {
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