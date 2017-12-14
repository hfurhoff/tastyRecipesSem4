<?php
    include 'fragments/header.php';
?>
        <section>
            <?php
                if (!$loggedIn) {
                    if(!$succededLogin){
                        include 'frgments/errorLogIn.php';
                    }
                    include 'fragments/loginform.php';
                } else {
                    include 'fragments/logoutform.php';
                }
            ?>
        </section>
    </body>
</html>
