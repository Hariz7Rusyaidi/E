<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?php include ("header.php");?>

<h2> Edit a record </h2>

<?php

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) 
{
    $id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) 
{
    $id = $_POST['id'];
} else {
    echo '<p class="error">This page has been accessed in error.</p>';

    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $error = array();
    
    if (empty($_POST['FirstName'])) 
    {
        $error[] = 'You forgot to enter your first name.';
    }
    else 
    {
        $n = mysql_real_escape_string($connect, trim($_POST['FirstName']));
    }

    if (empty($_POST['LastName'])) 
    {
        $error[] = 'You forgot to enter your last name.';
    }
    else 
    {
        $l = mysql_real_escape_string($connect, trim($_POST['LastName']));
    }

    if (empty($_POST['Specialization'])) 
    {
        $error[] = 'You forgot to enter the Specialization Number';
    } 
    else 
    {
        $s = mysql_real_escape_string($connect, trim($_POST['Specialization']));
    }

    if (empty($_POST['Password'])) 
    {
        $error[] = 'You forgot to enter the Password';
    } 
    else 
    {
        $p = mysql_real_escape_string($connect, trim($_POST['Password']));
    }
}

if (!empty($error)) 
{
    
$q = "SELECT ID FROM doktor WHERE FirstName='$n', LastName='$l', Specialization='$s', Password='$p', ID != $id";

$result = @mysqli_query($connect, $q);

if (mysql_num_rows($result) == 0) 
{
    $q ="UPDATE doktor SET FirstName='$n' , LastName='$l' , Specialization='$s' , Password='$d' WHERE ID='$id' LIMIT 1";
}

$result = @mysqli_query($connect, $q);

if (mysqli_affected_rows($connect) == 1);
{
    echo "<h3>The user has been edited</h3>";
}
else 
{
    echo "<p class='error'>The user has not been edited due to the system error. We apologize for any inconvenience.</p>";
    echo '<p>' .mysqli_error($connect). '<br/> query: ' .$q. '</p>';
}
else
{
    echo "<p class='error'>The no id has already been registered.</p>";
}
else
{
    echo "<p class='error'>The following error occurred:</p>";
    foreach ($error as $msg)
    {
        echo " -$msg<br/> \n ";
    }
    echo '</p><p>Please try again</p>';
}
}

$q ="SELECT FirstName, LastName, Specialization, Diagnose FROM doktor WHERE ID=$id";
$result = @mysqli_query ($connect, $q);

if (mysqli_num_rows($result) == 1) 
{
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    echo '<form action="edit_Pesakit.php" method="post">
    <p><label class="label" for="FirstName">First Name:</label>
    <input id="FirstName" name="FirstName" type="text" size="30" maxlength="30" value="'.$row[0].'"></p>

    <p><label class="label" for="LastName">Last Name:</label>
    <input id="LastName" name="LastName" type="text" size="30" maxlength="30" value="'.$row[1].'"></p>

    <p><label class="label" for="Specialization">Specialization:</label>
    <input id="Specialization" name="Specialization" type="text" size="30" maxlength="30" value="'.$row[2].'"></p>

    <p><label class="label" for="Password">Password:</label>
    <input id="Password" name="Password" type="text" size="30" maxlength="30" value="'.$row[3].'"></p>

    <br><p><input id="submit type="submit" value="Edit" name="Submit" ></p>
    <br><input type="hidden" name="id" value="'.$id.'"/>
    </form>';
}
else
{
    echo '<p class="error"> This page has been accessed in error </p>';
}

mysqli_close ($connect);

?>
</body>
</html>