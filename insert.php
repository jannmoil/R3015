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

$conn = new mysqli($host, $user, $passwd, $database);

if($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$txtName = mysqli_real_escape_string($conn, $_POST['txtName']);
$ddlType = mysqli_real_escape_string($conn, $_POST['ddlType']);
$txtPrice = mysqli_real_escape_string($conn, $_POST['txtPrice']);
$txtColor = mysqli_real_escape_string($conn, $_POST['txtColor']);
$txtLabel = mysqli_real_escape_string($conn, $_POST['txtLabel']);
$ddlImage = mysqli_real_escape_string($conn, $_POST['ddlImage']);
$txtReview = mysqli_real_escape_string($conn, $_POST['txtReview']);

$sql = "INSERT INTO product (name, type, price, color, label, image, review)
         VALUES ('$txtName', '$ddlType', '$txtPrice', '$txtColor', '$txtLabel', '$ddlImage', '$txtReview')";

if($conn->query($sql) === TRUE) {
    echo "Product addded.";
}
else
{
    echo "Error" . $sql . "<br/>" . $conn->error;
}
$conn->close();

?>
