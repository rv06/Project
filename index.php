<?php
    include_once('config.php');  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="fault management system">
        <title>Fault Management System</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
    </head>
    
    <body>
        
        <!-- NAVIGATION BAR -->
        
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Fault Management System</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-collapse">
                        <li class="active"><a href="#">View Entries</a></li>
                        <li><a href="add.php"><span class="glyphicon glyphicon-plus"></span> Add Fault Entry</a></li>
                        <li><a href="edit.php"><span class="glyphicon glyphicon-pencil"></span> Edit List Entries</a></li>
                    </ul>
                </div>
            </div>        
        </nav>
        
        <!-- CONTENT -->
        
    </body>
</html>