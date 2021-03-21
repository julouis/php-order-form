<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//your products with their price.
$pizzas = [
    ['name' => 'Margherita', 'price' => 8],
    ['name' => 'Hawaï', 'price' => 8.5],
    ['name' => 'Salami pepper', 'price' => 10],
    ['name' => 'Prosciutto', 'price' => 9],
    ['name' => 'Parmiggiana', 'price' => 9],
    ['name' => 'Vegetarian', 'price' => 8.5],
    ['name' => 'Four cheeses', 'price' => 10],
    ['name' => 'Four seasons', 'price' => 10.5],
    ['name' => 'Scampi', 'price' => 11.5]
];

$drinks = [
    ['name' => 'Water', 'price' => 1.8],
    ['name' => 'Sparkling water', 'price' => 1.8],
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 2.2],
];

$totalValue = 0;



/* $email = $_GET['email'];
$street = $_GET['street'];
$streetnumber = $_GET['streetnumber'];
$city = $_GET['city'];
$zipcode = $_GET['zipcode']; */

// CHECK EMPTY FORM


// FUNCTION TO CHECK IF A GET IS NOT EMPTY, 
// IF NOT EMPTY IT WILL STILL DISPLAY AFTER SUBMIT
function checkEmptyGet($dataGet)
{
    if (!empty($_GET[$dataGet])) {
        return $_GET[$dataGet];
    }
}


// WHEN SUBMIT BUTTON IS HIT, LOOK FOR EMPTY _GET TO DISPLAY ALERT
$error = "";
$formComplete = "";

if (isset($_GET['submit'])) {
    if (empty($_GET['email'])) {
        $error = "<li>Please enter a mail</li>";
    } elseif (empty($_GET['street'])) {
        $error .= "<li>Please enter a street</li>";
    } elseif (empty($_GET['streetnumber'])) {
        $error .= "<li>Please enter a street number</li>";
    } elseif (empty($_GET['city'])) {
        $error .= "<li>Please enter a city</li>";
    } elseif (empty($_GET['zipcode'])) {
        $error .= "<li>Please enter a zipcode</li>";
    } else {
        $formComplete = "Form is complete, thank you";
    };
}

print_r($_GET);



/* if (count($_GET)>0){
    $key=array_keys($_GET);
    $val=array_values($_GET);
    for ($i;$i<count($_GET);$i++){
        ${$key[$i]};
    }
}
 */

require 'form-view.php';
