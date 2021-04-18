<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
        include('./database.php');
        if ($_GET['loginrq']=='tr') {
            $log = validate_user(connection(),$_POST['log-username'],$_POST['log-pass']);
            echo $log;
            if ($log) {
                setcookie('cookie_username',$_POST['log-username'],time()+(86400*30),"/");
                setcookie('cookie_pass',$_POST['log-pass'],time()+(86400*30),"/");
                setcookie('cookie_loged',True,time()+(86400*30),"/");
                header("location:./index.php");
            }
        }
    ?>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./">TextWrapper</a>
    </nav>

    <div class="cont-box">
    <h1>Log in</h1>
    <form action="?loginrq=tr" method="post">
    <input class="form-control" type="text" name='log-username' placeholder="Enter your username">
    <br>
    <input class="form-control" type="password" name="log-pass" placeholder="Enter your password">
    <br>
    <input class="btn btn-primary" type="submit" value="Login">
    <a class="btn btn-secondary" href="./regester.php">Regester</a>
    </form>
    </div>

    <div class="row  bg-dark footer">
        <div class="col-md-6 ta-c">
            Copyrights@cherishpatel2001@gmail.com <br>
            Open For contribute for anyone
            <br><br>
            Contect me :
            <br> <i> cherishpatel2001@gmail.com 
                <br>8200314290</i>

        </div>
        <div class="col-md-6 ta-c">
            A website where you can easily utilize your text .<br>
            if your text is not longer than 100 charectars<br> you dont even have to signup.
            <br><h1>TextWrapper</h1>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>