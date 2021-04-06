<?php

/**
 * Parent class Upload.
 */
class Upload{

    /**
     * The source of the repository where the files will be stored.
     * @var string 
     */
    protected  string $fileSrc = "../data/";

    /**
     * The temporary name of the file selected which is stored on the server side by PHP.
     * @var string 
     */
    protected  $fileTemp;

    /**
     * The name of the file selected.
     * @var string 
     */
    protected  string $fileName;

    /**
     * The type of the file selected.
     * @var string 
     */
    protected string $fileType;

    /**
     * The size of the file selected.
     * @var int 
     */
    protected int $fileSize;

    /**
     * The content of the file selected ( stored as LONGTEXT in database ).
     * @var string 
     */
    protected string $fileContent;


    /**
     * Function created in order to initialize any object of Upload Class with $_FILES variables of file selected.
     * @param string name of the file selected.
     */
    public function __construct($string) {
        $this->fileName = $_FILES[$string]['name'];
        $this->fileTemp = $_FILES[$string]['tmp_name'];
        $this->fileType = $_FILES[$string]['type'];
        $this->fileSize = $_FILES[$string]['size'];
        $this->fileSrc = $this->fileSrc . $this->fileName;
    }

     /****
    * GETTER AND SETTER
    ***/

    /**
     * Get the value of fileTemp
     */ 
    public function getFileTemp()
    {
        return $this->fileTemp;
    }

    /**
     * Set the value of fileTemp
     *
     * @return  self
     */ 
    public function setFileTemp($fileTemp)
    {
        $this->fileTemp = $fileTemp;

        return $this;
    }

    /**
     * Get the value of fileName
     */ 
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set the value of fileName
     *
     * @return  self
     */ 
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get the value of fileType
     */ 
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * Set the value of fileType
     *
     * @return  self
     */ 
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * Get the value of fileSize
     */ 
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set the value of fileSize
     *
     * @return  self
     */ 
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get the value of fileContent
     */ 
    public function getFileContent()
    {
        return $this->fileContent;
    }

    /**
     * Set the value of fileContent
     *
     * @return  self
     */ 
    public function setFileContent($fileContent)
    {
        $this->fileContent = $fileContent;

        return $this;
    }

    /**
     * Get the value of allowedExtension
     */ 
    public function getAllowedExtension()
    {
        return $this->allowedExtension;
    }

    /**
     * Set the value of allowedExtension
     *
     * @return  self
     */ 
    public function setAllowedExtension($allowedExtension)
    {
        $this->allowedExtension = $allowedExtension;

        return $this;
    }
    

    /**
     * Get the value of fileSrc
     */ 
    public function getFileSrc()
    {
        return $this->fileSrc;
    }

    /**
     * Set the value of fileSrc
     *
     * @return  self
     */ 
    public function setFileSrc($fileSrc)
    {
        $this->fileSrc = $fileSrc;

        return $this;
    }
}


?>