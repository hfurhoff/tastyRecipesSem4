<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Tasty Recipes</title>
        <meta charset="UTF-8"/>
        <link rel ="stylesheet"
            type ="text/css"
            href ="resources/stylesheets/reset.css"/>
        <link rel ="stylesheet"
            type ="text/css"
            href ="resources/stylesheets/style.css"/>
        <script type="text/javascript" 
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
        <script type="text/javascript" 
            src="resources/scripts/jasc.js"></script>
    </head>
    <body>
        <header>
            <nav id="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="meatballs.php">Meatballs</a></li>
                    <li><a href="pancakes.php">Pancakes</a></li>
                    <li><a href="calendar.php">Calendar</a></li>
                    <li>
                        <?php
                            if (!$loggedIn) {
                                echo '<a href="login.php">Log in</a>';
                            }
                            else {
                                echo '<a href="login.php">Log out</a>';
                            }
                        ?>
                    </li>
                    <li><a href="signup.php">New user</a></li>
                </ul>
            </nav>
        </header>