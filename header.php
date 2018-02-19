<?php

ini_set('display_errors', 1); // see an error when they pop up
error_reporting(E_ALL); // report all php errors
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; ?></title>

        <!-- Bootstrap CSS -->
        <link href="library/css/bootstrap.css" rel="stylesheet" media="screen" />
        <link href="library/css/bootstrap.min.css" rel="stylesheet">
        <script src="library/js/bootstrap.min.js"></script>

        <!-- some custom CSS -->
        <style>
            .left-margin{
                margin:0 .5em 0 0;
            }

            .right-button-margin{
                margin: 0 0 1em 0;
                overflow: hidden;
            }
        </style>
    </head>

    <body>

        <!-- nav -->
        <?php 

            include_once 'initial.php';
            include_once 'classes/pages.php';


            $pages = new Pages($db);

            // select all users
            $prep_state = $pages->getAll();
            $num = $prep_state->rowCount();


            if($num>=0){

                echo "<nav class=\"navbar navbar-inverse\">";
                echo "<div class=\"container-fluid\">";
                echo "<div class=\"navbar-header\">";
                echo "<a class=\"navbar-brand\" href=\"#\">Students Hub</a>";
                echo "</div>";
                echo "<ul class=\"nav navbar-nav\">";

                while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

                    extract($row); //Import variables into the current symbol table from an array

                    echo "<li class=\"active\"><a href=\"$row[page_url]\">$row[title]</a></li>";

        
                }
                //end for ul tags for pages
                echo "</ul>";

            }

            // if there are no pages
            else{
                echo "<div> No Page found. </div>";
                }
        ?>
        <!-- <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Students Hub</a>
                </div>
                <ul class="nav navbar-nav"> 
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul> -->
            </div>
        </nav>

        <!-- container -->
        <div class="container">
            <?php
                 // show page header
                 echo "<div class='page-header'>";
                 echo "<h1>{$page_title}</h1>";
                 echo "</div>";
            ?>

         <!-- For the following code look at footer.php -->


