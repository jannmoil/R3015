<?php
$title = "Manage products";
$productController = new SiteController();

$content = $productController->CreateOverviewTable();

include './Template.php';

?>