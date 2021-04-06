<?php
require('../classes/Connexion.php');
require('../classes/FileUpload.php');


/* If the button of the form from views/index.php submit is clicked */
if(isset($_POST['submit']))
{
     //Step 1 : Instantiate a new FileUpload Object from FileUploadClass;
    $file = new FileUpload("file");
    
    //Step 2 : Get the fileName and the FileTemp and FileSource, FileSize and stored them into variables.
    $fileName = $file->getFileName();
    $fileTemp = $file->getFileTemp();
    $fileSrc = $file->getFileSrc();
    $fileSize = $file->getFileSize();
    $fileType = $file->getFileType();
    $fileSizeMax = $file->getFileMaxSize();
    $fileExtension = $file->getAllowed();
    $fileMime = $file->getMimeType();

    foreach($fileExtension as $data){
        //echo $data;
    }

    //Step 3 : Condition to verify if the fileType is equal to MimeType for .txt file = "text/plain".
    if($fileType == $fileMime) 
    {
        //Step 3.1 : Condition to check if the fileSize is below the max allowed.
        if( $fileSize <= $fileSizeMax )
        {
             //Step 3.2 : Condition to verifiy if $fileName exists.
            if(isset($fileName))
            {
                //Step 3.3 : Condition to check if $fileName is not empty
                if(!empty($fileName))
                {
                    //Step 3.3.1 : Condition to move the file selected into a the folder files/ 
                    if(move_uploaded_file($fileTemp, $fileSrc))
                    {
                    //echo " File Uploaded";
                    }

                    //Step 3.3.2 : Getting the file extension.
                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                    //Step 3.3.3 : Condition to verify if the file selected containted the file extension
                    //echo $fileName;
                    if(in_array($fileExt, $fileExtension))
                    {
                        //Step 3.3.4 : Using a variable to contain the fopen informations such as the filename and the method "r" per reading only.
                        $fileOpenning = fopen($fileName, "r");

                        //Step 3.3.5 : If condition throws an error since the fopen doesn't work properly.
                        if($fileOpenning == false)
                        {
                            echo " Error when openning the file...";
                        }

                        //Step 3.3.5.1 Else, the code continues...
                        else{
            
                        //Step 3.3.5.2 : Using function fread in order to get the contents of the file and stored it into a variable.
                        $fileContent = fread($fileOpenning, $fileSize);
                        $file->setFileContent($fileContent);   
                        //Step 3.3.5.3 : Closing the file.
                        fclose($fileOpenning);
                        }

                        //Step 3.3.6 : Connexion to the database.
                        $connexion = new Connexion();
                        $connexion->connectToDatabase();

                        //Step 3.3.7 : Check if the file already exists in the database.        
                        try{ 
                            $resultIfFileExist = $connexion->checkIfAlreadyExists($fileName);
                            
                            //Step 3.3.7.1 : If the file exists so the code is aborted.
                            if($resultIfFileExist == true){
                                echo  " The file already exists ! ";
                            }
                            //Step 3.3.7.2 : Else, it writes the files in the database.
                            else{
                                //print_r($fileContent);
                                echo " The file not found in database... Proceed to insert data ! ";
                                $connexion->insertTextFile($fileName, $fileContent);  
                            }
                        }
                        catch(PDOException $e){
                        print("Error: " . $e->getMessage());
                        }
                    }
                    //Step 3.4. : If the file is not in .txt extension, it will throw an error.
                    else {
                        echo " Error occured : file extension is not in txt.";
                    } 
                }
            }
        }
        //Step 3.5 : If the file size is not below fileMaxSize variable allowed.
        else{
            echo " Error : the file size is too high.";
        }      
    }
    //Step 3.6 : If the mimetype is not equal to file type.
    else{
        echo " Error occured with the mimeType";
    }
}