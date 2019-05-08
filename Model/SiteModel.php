<?php

require ("Entities/SiteEntity.php");

//Code for connecting database
class SiteModel {

    //Get all products by type from the database and return them to array.
    function GetProductTypes() {
        require 'Credentials.php';

        //Open connection to database
        foreach  ($_SERVER as $key => $value) {
            if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
                continue;
            }

            $host = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
            $user = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
            $passwd = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
            $database = "shopdb";
        } $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);
        $result = mysqli_query($con,"SELECT DISTINCT type FROM webshop") or die(mysqli_error($con));
        $types = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysqli_close($con);
        return $types;
    }

    //Function for creating products
    function GetProductByType($type) {
        require 'Credentials.php';

        //Open connection to database
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error);
        $sql = mysqli_select_db($con,$database);

        $query = "SELECT * FROM webshop WHERE type LIKE '$type'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $productArray = array();

        //Gets data from database.
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $color = $row[4];
            $label = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Generates products from the database objects and store them in an array.
            $product = new SiteEntity(-1, $name, $type, $price, $color, $label, $image, $review);
            array_push($productArray, $product);
        }
        //Close connection and return result
        mysqli_close($con);
        return $productArray;
    }

}

?>
