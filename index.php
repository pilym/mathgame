<?php include("include/header.php"); ?>
    <body>
        <?php 
        // is the user logged in? If not, go to login.php
        if(!isset($_SESSION['logged_in'])) {
            header("Location: login.php"); die();
        }
        
        // initialize score-related variables
        if(!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
        }
        if(!isset($_SESSION['total'])) {
            $_SESSION['total'] = 0;
        }
        
        extract($_POST);
        
        // sets the display to the user's answer, if it exists
        // displays nothing on first play
        $result = "";
        if(isset($_POST['your_answer'])) {

            if (!is_numeric($_POST['your_answer'])) {
                $result = "You must enter a number for your answer.";
            } elseif ($_POST['your_answer'] == $_SESSION['actual_answer']) {
                $result = "You got it!";
                $_SESSION['score'] += 1;
                $_SESSION['total'] += 1;
            } else {
                $result = "Wrong! " . $_SESSION['equation'] . " = " . $_SESSION['actual_answer'];
                $_SESSION['total'] += 1;
            }
        }
        
        // sets the game variables
        $num1 = rand(0,20);
        $num2 = rand(0,20);
        $numOp = rand(0,1); // 0 is +, 1 is -
        if ($numOp == 1) {
            $_SESSION['equation'] = $num1 . " + " . $num2;
            $_SESSION['actual_answer'] = $num1 + $num2;
        } else {
            $_SESSION['equation'] = $num1 . " - " . $num2;
            $_SESSION['actual_answer'] = $num1 - $num2;
        }
        ?>
        <div class="container">
            
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2"><h1>Math game</h1></div>
                <div class="col-sm-2">
                    <a href="logout.php" class="btn btn-default btn-sm" id="logoutbutton">Logout</a>
                </div>
            </div>
            
            <form class="form-horizontal" action="index.php" method="post" role="form">
                <div class="row">
                    <div class="text-center" id="question"><?php echo$_SESSION['equation'] ?></div>
                </div>
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="text" class="form-control" id="your_answer" name="your_answer" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <button type="submit" class="btn btn-primary center-block">Enter</button>
                        </div>
                    </div>
                </div>
            </form>
            
            <hr>
                
            <?php echo $result . "</br>Score: " . $_SESSION['score'] . "/" . $_SESSION['total']?>
        </div>
    </body>
</html>
