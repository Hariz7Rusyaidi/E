<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head> <title>Klinik Ajwa</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<body>
<?php
    
include("header.php");?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == 'POST') 
{
    $errors = array();
        
    if (empty($_POST['FirstName'])) 
    {
    $errors[] = 'You forgot to enter your first name';
    }
    else 
    {
    $n = mysqli_real_escape_string($connect, trim($_POST['FirstName']));
    }
    
    
    if (empty($_POST['LastName'])) 
    {
    $errors[] = 'You forgot to enter your last name.';
    }
    else 
    {
    $l = mysqli_real_escape_string($connect, trim($_POST['LastName']));
    }
    

    if (empty($_POST['Specialization'])) 
    {
    $errors[] = 'You forgot to enter your specialization.';
    }
    else 
    {
    $s = mysqli_real_escape_string($connect, trim($_POST['Specialization']));
    }
    

    if (empty($_POST['Password'])) 
    {
    $errors[] = 'You forgot to enter your Password.';
    }
    else 
    { 
    $p = mysqli_real_escape_string($connect, trim($_POST['Password']));
    }

    $q = "INSERT INTO pesakit (ID, FirstName, LastName, Specialization, Password)

    VALUES (' ', '$n', '$l', '$s', '$p')";

    $result = @mysqli_query ($connect, $q); 

    if ($result) 
    {
    echo '<h1>Thank you</h1>';
    exit();
    } 
    else 
    {
    echo '<h1>ERORR</h1>';
    exit();
    }

}
?>

<h2> Register Doktor </h2>
<h4>* required field </h4>
<form action="registerDoktor.php" method="post">


<p><label class="label" for="FirstName">First Name: </label>
<input id="FirstName" type="text" name="FirstName" size="30" maxlength="150"
value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" /></p>

<p><label class="label" for="LastName">Last Name: </label>
<input id="LastName" type="text" name="LastName" size="30" maxlength="150"
value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>" /></p>

<p><label class="label" for="Specialization">:Specialization: </label>
<input id="Specialization" type="text" name="Specialization" size="30" maxlength="150"
value="<?php if (isset($_POST['Specialization'])) echo $_POST['Specialization']; ?>" /></p>

<p><label class="label" for="Password">:Password: </label>
<input id="Password" type="text" name="Password" size="30" maxlength="150"
value="<?php if (isset($_POST['Password'])) echo $_POST['Password']; ?>" /></p>

<p><input id="submit" type="submit" name="submit" value="Register" />&nbsp;&nbsp;
<input id="reset" type="reset" name="reset" value="Clear All" /></p>

</form>
<p>
<br />
<br />
</body>
</html>
