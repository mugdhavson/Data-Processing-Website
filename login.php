<!-- Author: Mugdha Sonawane -->

<!DOCTYPE html>
<html>
<head>
<title>Quotation Service</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<h1> Login </h1>

<form method="post" action="./controller.php">
<div class="containerReg">

<input type="text" id="username" name="username" placeholder="Username" required>
<br> 
<br>
<input type="password" id="password" name="password" placeholder="Password" required>
<br>
<br>

<!-- I added this value because I thought it was a much
better indicator than "Submit" -->
<input type="submit" value="Login">
<br>

<br>

<?php

session_start();

if( isset($_SESSION ['loginError'])) {
    echo $_SESSION ['loginError'];
}

unset($_SESSION ['loginError']);

?>



</div>
</form>



</body>
</html>