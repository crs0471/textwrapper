<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <?php $result_text = "" ?>

<!--php oprations -->
    
    <?php
        include('./dataprocess.php');
        include("./database.php");
        #echo 'username : '.$_COOKIE["cookie_username"]."<br>";
        #echo 'pass : '.$_COOKIE["cookie_pass"]."<br>";

        if($_GET['formsubmited'] == 'tr')
        {
          if (!$_COOKIE['cookie_loged'] && (strlen($_POST['orignal-text'])>100)) {
              header("location:./login.php");
          }  
          else{
              $result_text = init($_POST['orignal-text'],$_POST['capitalize'],$_POST['newline'],$_POST['uppercase'],$_POST['lowercase']);
          }

        }

        if ($_GET['logoutrq']=='tr') {
            unset($_COOKIE['cookie_username']);
            setcookie("cookie_username",null,-1,'/');
            unset($_COOKIE['cookie_pass']);
            setcookie("cookie_pass",null,-1,'/');
            unset($_COOKIE['cookie_loged']);
            setcookie("cookie_loged",null,-1,'/');
            header("location:./");
            
        }
    
    ?>
    
    
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./">TextWrapper</a>
        <?php
        if ($_COOKIE['cookie_loged']) {
            echo "<h5 class='username my-2 my-sm-0'>".$_COOKIE['cookie_username']."</h5>";
            echo '
            <div class="my-2 my-sm-0">
            <form  action = "?logoutrq=tr" method="post">
            <input class=btn-secondary type="submit" value="Logout">
            </form></div>
            ';
        }
        else {
            echo "<a href='./login.php'>Login/Regester</a>";
        }
        

        ?>

    </nav>

    <div class="container">
    
    <div class="start-text">
        <h1>TextWrapper</h1>
        <p>Manupulet your text without signup or register if your text is less then
        100 words long </p>
    </div>
    <hr>
    <div>
        <form action="?formsubmited=tr" method="post">
            <textarea class="form-control" name="orignal-text" placeholder="Enter your text" cols="100" rows="10"></textarea>
            <br>
            <label>Select the oprations you want to apply</label>
            <br>
            <input class="check" type="checkbox" name="capitalize" id="capitalize">
            <label for="label">Capitalize</label><br>
            <input class="check" type="checkbox" name="newline" id="newline">
            <label for="newline">New sentance new line</label><br>
            <input class="check" type="checkbox" name="uppercase" id="uppercase">
            <label for="uppercase">Uppercase</label><br>
            <input class="check" type="checkbox" name="lowercase" id="lowercase">
            <label for="lowercase">Lowercase</label><br>
            <input class="btn btn-primary" type="submit" value="proceed">

        </form>
    </div>
    <hr>
    <div class="output">
        <h1> Your Output : </h1><br>
        <textarea class="form-control" name="output" cols="100" rows="10" disabled>
        <?php
            echo $result_text;
        ?>
        </textarea>
    </div>
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