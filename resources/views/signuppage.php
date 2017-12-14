<?php
    include 'fragments/header.php';
?>
        <section>
            <h2>Here you can register a new user!</h2>
            <?php
                if ($loggedIn) {
                    include 'fragments/errorLoggedIn.php';
                    include 'fragments/logoutform.php';
                } else {
                    if ($hasTriedToSignup){
                        if (isset($succededSignup)) {
                            if($succededSignup){
                                include 'fragments/succededSignup.php';
                            } else {
                                include 'fragments/errorFailedSignup.php';
                            }
                        }
                    }
                    include 'fragments/signupform.php';
                }
            ?>
        </section>
    </body>
</html>
