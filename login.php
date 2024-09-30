<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Klinik_Ajwa </title>
<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
</head>

<body>

<?php

include ("header.php");?>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    if (!empty($_POST['ID']))
    {
        $un = mysqli_real_escape_string ($connect, $_POST ['ID']);
    }
    else 
    {
        $un = FALSE; 
        echo '<p class = "error"> You Forgor To Enter Your ID.</p>';
    }
     if (!empty($_POST['Password'])) 
    {
        $p = mysqli_real_escape_string ($connect, $_POST ['Password']);
    }
    else 
    {
        $p = FALSE; 
        echo '<p class = "error"> You Forgor To Enter Your PASSWORD.</p>';
    }


    if ($un && $p)
    {
    $q = "SELECT ID, FirstName, LastName, Specialization, Password FROM Doktor WHERE (ID = '$un' AND Password = '$p')";

    $result = mysql_query ($connect, $q);
    }
        if (@mysqli_num_rows ($result) == 1)
        {
        session_start();

        $_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);

        echo '<p> haiiiiaaiaiiaiaia </p>';

        exit();

        mysqli_free_result ($result);
        mysqli_close ($connect);
        }
        else 
        {
        echo '<p class = "error"> The Username and Password Entered Do Not Match our Records <br> Perhaps You Need to Register, Just Click The Register Button </p>';
        }
    
    mysqli_close ($connect);
}

?> 

<h2 align ="center" >LOGIN</h2>

</form action = "login.php" method = "post">

<p> <label class = "label" for = "ID" > ID: </label> 
<input id="ID" type="text" name="ID" size="4" maxlenght="6" 
value="<?php if (isset($_POST['ID'])) echo $_POST ['ID'];?>" ></p> 

<p> <label class = "label" for = "Password"> Password: </label>
<input id="Password" type="password" name="Password" size="15" maxlenght="60"
value = "<?php if (isset($_POST['Password'])) echo $_POST ['Password'];?>" ></p> 

<p>&nbsp;</p> 
<p align="left"><input id="submit" type="submit" name="submit" value="login" />&nbsp;
<p align="left"><input id="reset" type="reset" name="reset" value="login" /></p>
<form>

<p align = "center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Don't have an account?
<a href = "register.php"> Sign Up</a>

</p>
</div>
</div>
<body>
<html>
