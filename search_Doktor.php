<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head> <title>Klinik Ajwa</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<body>
    
<?php include("header.php"); ?>

<form action="recordfound_Doktor.php" method="post">
    
<h1>Search record doktor</h1>
<p><label class="label" for="ID"> No id: </label>
<input id ="ID" type="text" name="ID" size="30" maxlength="30" value="<?php if (isset($_POST['ID'])) echo $_POST ['ID']; ?>" 
/></p>
    
<p><input id="submit" type="submit" name="submit" value="search"/></P>
    
</form>
</body>
</html>