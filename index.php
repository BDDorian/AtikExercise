<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upload a file into a database.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://bootswatch.com/4/darkly/bootstrap.min.css" rel="stylesheet"> 

</head>
<body>

<div class="container">
    <div class="jumbotron">
    <h1 class="display-3">Welcome !</h1>
        <p class="lead">This is a simple example of uploading a file into a database in php.</p>
        <!-- form with post method and enctype multipart/form-data to handle file ressources uploading  -->
            <form action="../data/script.php" method="post" enctype="multipart/form-data">
                <!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
                <input type="file" name="file">
                <button type="submit" name="submit" class="btn btn-primary"> Send </button>
            </form>
    </div>  
</div>

</body>
</html>

