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