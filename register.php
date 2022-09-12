<!-- Author: Mugdha Sonawane -->

<!DOCTYPE html>
<html>
<head>
<title>Quotation Service</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<h1> Register </h1>

<form method="post" action="./controller.php">
<div class="containerReg">

<input type="text" id="username" name="newUsername" placeholder="Username" required>
<br> 
<br>
<input type="password" id="password" name="newPassword" placeholder="Password" required>
<br>
<br>
<!-- I added this value because I thought it was a much
better indicator than "Submit" -->
<input type="submit" value="Register">

<br>

<br>

<?php

session_start();

if( isset($_SESSION ['accountNameTaken'])) {
      echo $_SESSION ['accountNameTaken'];
}

unset($_SESSION ['accountNameTaken']);

?>



</div>
</form>



</body>
</html>