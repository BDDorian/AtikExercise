<?php

require('Upload.php');

class PdfUpload extends Upload{

   private $allowed = array("pdf");

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
}


?>