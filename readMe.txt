Exercise :
Create a php script in order to read a txt file and upload its content in a database using Mysql.

Folders created :

-data ( Back-end activity).
-views ( Front-end activity).
-css ( CSS files if needed).

Files created :
-/data/script.php => script to read the file selected from the user and upload its name and content with unique id to a database.
-/views/index.php => the user can select a file in .txt extension to upload.
-/classes/Connexion.php =>  Class of a connexion object in order to connect to the database and uses some query functions.
-classes/Upload.php => Motherclass to define the object upload from the file selected by the user.
-classes/FileUpload.php => Daughterclass of Upload, specify the type of the file and its size.


