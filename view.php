
<!-- 
This is the home page for Final Project, Quotation Service. 
It is a PHP file because later on you will add PHP code to this file.

File name quotes.php 
    
Authors: Rick Mercer and Mugdha Sonawane
-->

<!DOCTYPE html>
<html>
<head>
<title>Quotation Service</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body onload="showQuotes()">

<h1>Quotation Service</h1>
<?php 
 session_start ();
 
 echo '&nbsp; <a href="./register.php" ><button>Register</button></a>';
 echo '&nbsp; <a href="./login.php" ><button>Login</button></a>';
 echo '&nbsp; <a href="./addQuote.html" ><button>Add Quote</button></a>';
 
 if( isset($_SESSION ['username'])) {
    echo "<h2> Hello " . $_SESSION ['username'] . "</h2> <hr>";
 }
?>
<div id="quotes"></div>

<script>

function showQuotes() {
	var element = document.getElementById("quotes");
	var obj = new XMLHttpRequest();
	obj.open("GET", "controller.php?todo=getQuotes");
	obj.send();
	obj.onreadystatechange = function() {
		if (obj.readyState == 4 && obj.status == 200) {
			element.innerHTML = obj.responseText;
		}
	};
}
    // TODO 5: 
    // Complete this function using an AJAX call to controller.php
  	// You will need query parameter ?todo=getQuotes.
  	// Echo back one big string to here that has all styled quotations.
  	// Write all of the complex code to layout the array of quotes 
  	// inside function getQuotesAsHTML inside controller.php

 // End function showQuotes

</script>

</body>
</html>