<!DOCTYPE html>
<html>
<head>
<title>Contact Form</title>
</head>

<body>
<u> Kindly enter your name</u><br><br>
<form action="" method="get">
Full Name == <input type="text" name="full_name">
<input type="submit" name="submit">
</form>

 <p> Hiiiiii.......</p>



<?php 

$name = isset($_GET['full_name']) ? $_GET['full_name'] : "";

if ($name !="")echo "Your name is ".$name;
else echo "<u>please put in a valid name</u><br><br>";




?>



<p> To see the interactive resume, please follow <a href="contact"> This Link</a></p>

</body>
</html>