<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    
<?php include("header.php");?>

<h2> Delete a record </h2>

<?php
{
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) 
{
    $id = $_GET['id'];
} 
elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) 
{
    $id = $_POST['id'];
} 
else 
{
    echo '<p class="error">This page has been accessed in error.</p>';
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if ($_POST['sure'] == 'Yes') 
    {
        $q = "DELETE FROM doktor WHERE ID = $id LIMIT 1";
        $result = mysqli_query($connect, $q);

        if (mysqli_affected_rows($connect, $q)); 
        {
            echo '<h3> The record has been deleted </h3>';
        } 
        else 
        {
            echo '<p class="error">The record could not be deleted.<br>Probably because it does not exist or due to a system error.</p>';
            echo '<p>' . mysqli_error($connect) . '<br>Query: ' .$q. '</p>';
        }
    } 
    else 
    {
        echo '<h3>The user has NOT been deleted.</h3>';
    }
} 
else 
{
    $q = "SELECT FirstName, LastName FROM doktor WHERE ID = $id";
    $result = mysqli_query($connect, $q);
}
if (mysql_num_rows($result) == 1) 
{
    
    $row = mysql_fetch_array($result);
    echo "<h3>Are you sure you want to permanently delete $row[0]? </h3>";
    echo '<form action="delete_pesakit.php" method="post">
    <input id="submit-no" type="submit" name="sure" value="Yes">
    <input id="submit-no" type="submit" name="sure" value="No">
    <input type="hidden" name="id" values="'.$id.'">
    </form>';
}
else
{
    echo '<p class="error"> This page has been accessed in error </p>';
    echo '<p>&nbsp;</p>';
}
}
mysqli_close($connect);

?>
</body>
</html>