<?php
ob_start();
function connection()
{
    $con = new mysqli("localhost","root","","textwrapper");
    return $con; 
}

function insert_user($con,$username,$password)
{
    $sql = "INSERT INTO users VALUES ('$username','$password')";
    if ($con->query($sql)) {
        echo "inserted";
        setcookie('cookie_username',$username,time()+(86400*30),"/");
        setcookie('cookie_pass',$password,time()+(86400*30),"/");
        setcookie('cookie_loged',True,time()+(86400*30),"/");
        return True;
    }
    
    
}

function validate_user($con,$username,$password)
{
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $out = $con->query($sql);
    if($out->num_rows == 1)
    {
        $row = $out->fetch_assoc();
        if ($row["password"] == $password)
        {
            
            return True;
        }
        else 
        {
            return False;
        }
    }
    else
    {
        return False;
    }
}
?>