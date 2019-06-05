<?php

foreach  ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }

    $host = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $user = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $passwd = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    $database = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value); 
}

$con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
$sql = mysqli_select_db($con,$database);

$txtName = mysqli_real_escape_string($sql, $_POST['txtName']);
$ddlType = mysqli_real_escape_string($sql, $_POST['ddlType']);
$txtPrice = mysqli_real_escape_string($sql, $_POST['txtPrice']);
$txtColor = mysqli_real_escape_string($sql, $_POST['txtColor']);
$txtLabel = mysqli_real_escape_string($sql, $_POST['txtLabel']);
$ddlImage = mysqli_real_escape_string($sql, $_POST['ddlImage']);
$txtReview = mysqli_real_escape_string($sql, $_POST['txtReview']);

$sqli = "INSERT INTO product (txtName, ddlType, txtPrice, txtColor, txtLabel, ddlImage, txtReview)
         VALUES ('$txtName', '$ddlType', '$txtPrice', '$txtColor', '$txtLabel', '$ddlImage', '$txtReview')";

if($sql->query($sqli) === TRUE) {
    echo "Product addded.";
}
else
{
    echo "Error" . $sqli . "<br/>" . $sql->error;
}
$con->close();

?>