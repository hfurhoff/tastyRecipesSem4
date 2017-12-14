<h2>Here you can log in!</h2>
<p>Dont have an account? <a href="signup.php">Create an account here!</a></p>
<br>
<?php 
if (!$succededLogin) {
    echo '<p>Failed to login! Please try again.</p><br>';
}
?>
    <article>
        <div id="signlogin">
            <form name="login" action="login.php" method="post">
                <div>
                    <label for="acc">Account:</label>
                    <input type="text"
                           name="acc"
                           id="acc"/>
                </div>
                <div>
                    <label for="pass">Password:</label>
                    <input type="password"
                           name="pass"
                           id="pass"/>
                </div>
                <input type="submit" value="Log in"/>
            </form>
        </div>
    </article>