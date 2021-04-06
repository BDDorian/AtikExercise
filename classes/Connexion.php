<?php

/**
 * Class created to connect to a database and use some functions such as checking the duplicates and insert queries.
 */
class Connexion {

    /**
     * Username used to connect to the database.
     * @var string
     */
    private $username;

    /**
     * Password used to connect to the database.
     * @var string - empty variable - 
     * Notes: For real database, needed to be hash before stored in databse.
     */
    private $password;

    /**
     * Data Source Name of the database.
     * @var string
     */
    private $dsn;

    /**
     * Function created in order to initialize any object of Connexion Class with variables to connect to the database.
     */
    public function __construct()
    {
        $this->username = 'root';
        $this->password = '';
        $this->dsn ='mysql:host=localhost;dbname=testdb';
    }


    /**
     * Function used to connect to the database.
     */
    public function connectToDatabase()
    {
        try{
            $connexion =  new Connexion();
            $conn = new PDO($connexion->getDsn(), $connexion->getUsername(), $connexion->getPassword());
          } catch(PDOException $e) {
            print("Connection failed: " . $e->getMessage());
          }
    }

    /**
     * Function created so as to check if a file already exists in the database before storing it.
     * @param $fileName defined the name of the file selected from the form.
     */
    public function checkIfAlreadyExists($fileName)
    {
        try{
            $connexion =  new Connexion();
            $conn = new PDO($connexion->getDsn(), $connexion->getUsername(), $connexion->getPassword());
          } catch(PDOException $e) {
            print("Connection failed: " . $e->getMessage());
          }
        try{
            //Step 6 : Check if the file already exists in the database.
           $queryIfExists = $conn->prepare("SELECT name_file FROM uploadfile WHERE name_file = '$fileName' ");
           $queryIfExists->execute();
           $result = $queryIfExists->rowCount();
           
           if($result > 0)
           {
               return true;
           }
           else {
               return false;
           }
           //$queryIfExists->fetchColumn() ? 'true' : 'false';
           }
           catch(PDOException $e){
               print("Error: " . $e->getMessage());
           }
          
    }

    /**
     * Function created to insert the name of the file and its content to the database.
     * @param $fileName, $fileContent.
     */
    public function insertTextFile($fileName, $fileContent) {
        try{
            $connexion =  new Connexion();
            $conn = new PDO($connexion->getDsn(), $connexion->getUsername(), $connexion->getPassword());
          } catch(PDOException $e) {
            print("Connection failed: " . $e->getMessage());
          }
          
        try{
            echo $fileContent;
            //Step 7 : insert the data into the table 'perso' of the database.  
            $reqDB = $conn->prepare("INSERT INTO uploadfile (name_file, content_file) VALUES ('$fileName','$fileContent') ");
            $reqDB->execute();
        }  
        catch (PDOException $e) {
            echo " error when inserting the datas..." . $e->getMessage();
        }
    }

    /****
    * GETTER AND SETTER
    ***/


    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of dsn
     */ 
    public function getDsn()
    {
        return $this->dsn;
    }

    /**
     * Set the value of dsn
     *
     * @return  self
     */ 
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;

        return $this;
    }
}

?>