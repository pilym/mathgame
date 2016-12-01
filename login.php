<?php include("include/header.php"); ?>
    <body>
        <div class="container">
            <h1>Login to play the math game</h1>
            <?php
            // verify login
            extract($_POST);
            if(isset($_POST['email']) && isset($_POST['password'])) {
                if ($_POST['email'] == "a@a.a" && $_POST['password'] == "a") {
                    $_SESSION["logged_in"] = true;
                    header("Location: index.php"); die();
                } else {
                    echo "The email or password is not valid.";
                }
            }
            ?>

            <form class="form-horizontal" action="login.php" method="post" role="form">
                <div class="form-group">
                    <div class="col-sm-3 text-right">Email:</div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-sm-4"></div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 text-right">Password:</div>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-sm-4"></div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
