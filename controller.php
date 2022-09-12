<?php
// This file contains a bridge between the view and the model and redirects back to the proper page
// with after processing whatever form this code absorbs. This is the C in MVC, the Controller.
//
// Authors: Rick Mercer and Mugdha Sonawane
//  
session_start (); // Not needed until a future iteration


/* TO-DO LIST */
// add three another if statement that send messages to your DatabaseAdapter

require_once './DatabaseAdaptor.php';

$theDBA = new DatabaseAdaptor();

if (isset ( $_GET['todo'] ) && $_GET['todo'] === 'getQuotes') {
    $arr = $theDBA->getAllQuotations();
    unset($_GET ['todo']);

    // we're sending this back to the view.php file 
    echo getQuotesAsHTML ( $arr );
}

// echo ($arr)[4]['quote'];

if (isset ( $_POST ['update'] ) ) {
    $clickedName = $_POST['update'];
    
    // what is happening here??
    
    $ID = $_POST['id'];
    
    if ($clickedName === "increase") {
        $theDBA->raiseRating ( $ID );
    } 
    
    if ($clickedName === "decrease") {
        $theDBA->decreaseRating ( $ID );
    }
    
    if ($clickedName === 'delete') {
        $theDBA->deleteQuote ( $ID );
    }    
    header ( "Location: view.php" );
}

// login
if (isset ( $_POST['username'] ) && isset ( $_POST['password'] )) {
    if ($theDBA->verifyCredentials($_POST['username'], $_POST['password'])) {
    
            // Store Session Data
    
        $_SESSION['username'] = $_POST['username'];
    
            header("Location: view.php");
    
    } else {
    
            $_SESSION['loginError'] = 'Invalid Username or Password';
    
            header("Location: login.php");
    }
}

// register
if (isset ( $_POST['newUsername'] ) && isset ( $_POST['newPassword'] )) {
    if ($theDBA->register($_POST['newUsername'], $_POST['newPassword'])) {
        
        // Store Session Data
        
        $_SESSION['username'] = $_POST['newUsername'];
        
        header("Location: view.php");
        
    } else {
        
        $_SESSION['accountNameTaken'] = 'Account name taken';
        
        header("Location: register.php");
    }
}

if (isset ( $_POST ['author']) && isset ( $_POST ['quote']))  {
    $theDBA->addQuote($_POST['quote'], $_POST['author']);
    header ( "Location: view.php" );
}

function getQuotesAsHTML($arr) {
    // TODO 6: Many things. You should have at least two quotes in 
    // table quotes. layout each quote using a combo of PHP and HTML 
    // strings that includes HTML for buttons along with the actual 
    // quote and the author, ~15 PHP statements. This function will 
    // be the most time consuming in Quotes 1. You will
    // need to add css rules to styles.css. 
    
    
    // change the ID literals here
    $result = '';
    foreach ($arr as $quote) {
        $result .= '<div class="container">';
        $result .= '"' . $quote ['quote'] . '" <br>';
        $result .= '<p class="author"> &nbsp;&nbsp;--' . $quote['author'] . '<br> </p>';
        $result .= '<form method="post" action="controller.php">
                    <input type="hidden" name="id" value=' . $quote ['id'] .'>&nbsp;&nbsp;&nbsp;
                    <button name="update" value="increase">+</button>
                    &nbsp;<span id="rating"> ' . $quote ['rating'] . ' </span>&nbsp;&nbsp;
                    <button name="update" value="decrease">-</button>&nbsp;&nbsp;
                    <button name="update" value="delete">Delete</button>
                    </form>
                    </div>';
        
        
        
    }
    
    return $result;
}
?>