<?php

require('Upload.php');

class ImgUpload extends Upload{

   private $allowed = array("jpg", "png", "jpeg");

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