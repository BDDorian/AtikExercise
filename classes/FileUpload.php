<?php

require('Upload.php');

/**
 * Child class from Parent class Upload
 * Some variables described here belong to this unique class.
 */
class FileUpload extends Upload{

   /**
    * Contains the extension allowed for the file uploaded.
    * @var array 
    */
   private $allowed = array("txt");

   /**
    * Refers to the maximum size of the file selected.
    * @var int 
    */
   private $fileMaxSize = 1000;

   /**
    * Regards to the MIME-TYPE of the file uploaded.
    * @var string 
    */
   private $mimeType = "text/plain";



    /****
    * GETTER AND SETTER
    ***/

   /**
    * Get the value of allowed
    */ 
   public function getAllowed()
   {
      return $this->allowed;
   }

   /**
    * Set the value of allowed
    *
    * @return  self
    */ 
   public function setAllowed($allowed)
   {
      $this->allowed = $allowed;

      return $this;
   }

   /**
    * Get the value of fileMaxSize
    */ 
   public function getFileMaxSize()
   {
      return $this->fileMaxSize;
   }

   /**
    * Set the value of fileMaxSize
    *
    * @return  self
    */ 
   public function setFileMaxSize($fileMaxSize)
   {
      $this->fileMaxSize = $fileMaxSize;

      return $this;
   }

   /**
    * Get the value of mimeType
    */ 
   public function getMimeType()
   {
      return $this->mimeType;
   }

   /**
    * Set the value of mimeType
    *
    * @return  self
    */ 
   public function setMimeType($mimeType)
   {
      $this->mimeType = $mimeType;

      return $this;
   }
}


?>