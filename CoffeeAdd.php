<?php
require ("Controller/SiteController.php");
$SiteController = new SiteController();

$title = "Add a new Coffee";

$content ="<form action='' method='post'>
    <fieldset>
        <legend>Add a new Coffee</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$SiteController->CreateOptionValues($SiteController->GetProductTypes()).
        "</select><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>

        <label for='roast'>Roast: </label>
        <input type='text' class='inputField' name='txtRoast' /><br/>

        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/>

        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
        .$SiteController->GetImages().
        "</select></br>

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";


if(isset($_POST["txtName"]))
{
    $SiteController->InsertCoffee();
}
include 'Template.php';
?>


