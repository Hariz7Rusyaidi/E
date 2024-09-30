<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head> <title>Klinik Ajwa</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<body>
    
<?php include("header.php"); ?>

<h2>Search result</h2>

<?php 

$in = $_POST ['InsuranceNumber'];
$in = mysqli_real_escape_string($connect, $in);

$ = "SELECT ID_P, FirstName_P, LastName_P, InsuranceNumber, Diagnose FROM pesakit WHERE InsuranceNumber = '$in' ORDER BY ID_P";

$result = @mysqli_query ($connect, $q);

if ($result) 
{
    echo '<table border="2">
    <tr><td><b>ID</b></td>
    <td><b>FirstName_P</td></b>
    <td>LastName_P</td></b>
    <td><b>InsuranceNumber</td></b>
    <td><b>Diagnose</td></b>
    </tr>';

while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "<tr>";
    echo "<td>" . $row['ID_P'] . "</td>";
    echo "<td>" . $row['FirstName_P'] . "</td>";
    echo "<td>" . $row['LastName_P'] . "</td>";
    echo "<td>" . $row['InsuranceNumber'] . "</td>";
    echo "<td>" . $row['Diagnose'] . "</td>";
    echo "</tr>";
}    

echo "</table>";

mysql_free_result($result);
{      
    else 
    {
        echo '<p class="error"> No records found with the provided search entry <br> please try again </p>';
        echo '<p>' mysqli_error($connect). '<br><br/>Query:'.$q. '</p>';
    }
}     

}

mysqli_close ($connect);
?>
</body>
</html>