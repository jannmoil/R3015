<?php

error_reporting(E_ALL);

require './Controller/SiteController.php';
$productController = new SiteController();

if(isset($_POST['types']))
{
    //Displays the selected product by type
    $productTables = $productController->CreateTables($_POST['types']);
}
else 
{
    //When the page loads, display all products at the same time
    $productTables = $productController->CreateTables('%');
}

//Output data for website
$title = 'Product overview';
$content = $productController->CreateDropdownList(). $productTables;

include 'Template.php';
?>
