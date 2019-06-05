<?php
error_reporting(E_ALL);

require './Controller/SiteController.php';


$siteController = new SiteController();

$title = "Add a new Product";

$content ="<form action='insert.php' method='post'>
    <fieldset>
        <legend>Add a new product</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$siteController->CreateOptionValues($siteController->GetProductTypes()).
        "</select><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>

        <label for='color'>Color: </label>
        <input type='text' class='inputField' name='txtColor' /><br/>

        <label for='label'>Label: </label>
        <input type='text' class='inputField' name='txtLabel' /><br/>

        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
        .$siteController->GetImages().
        "</select></br>

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";

include 'Template.php';
?>


