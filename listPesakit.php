<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="include.css" />
</head>

<body>

<?php include("header.php"); ?>

<?php

$q = "SELECT ID_P, FirstName_P, LastName_P, InsuranceNumber, Diagnose FROM pesakit ORDER BY ID_P;";

$result = @mysqli_query ($connect, $q);

if($result)
{
    echo '<table border="2">    
    <tr><td><b>Edit</b></td>
    <td><b>Delete</b></td>
    <td><b>ID patient</b></td>
    <td><b>First Name</b></td>
    <td><b>Last Name</b></td>
    <td><b>Insurance Number</b></td>
    <td><b>Diagnose</b></td>
    </tr>';


    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
    {
    echo '<tr>
    <td><a href="edit_patient.php?id=' . $row['ID_P'] . '">Edit</a></td>
    <td><a href="delete_patient.php?id=' . $row['ID_P'] . '">Delete</a></td>
    <td>' . $row['ID_P'] . '</td>
    <td>' . $row['FirstName_P'] . '</td>
    <td>' . $row['LastName_P'] . '</td>
    <td>' . $row['InsuranceNumber'] . '</td>
    <td>' . $row['Diagnose'] . '</td>
    </tr>';
    }

    echo '</table>';

    mysqli_free_result($result);
}         
    
mysqli_close($connect);
?>

</div>
</div>
</body>
</html>