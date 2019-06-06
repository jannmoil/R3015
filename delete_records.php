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
$con = new mysqli($host, $user, $passwd, $database) or die(mysqli_error());
?>

<!DOCTYPE html>
<html>
<head>
        <title>Delete Records</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body style="padding-top: 100px;">

<?php
    $fetchQuery = mysqli_query($con,"SELECT * FROM webshop") or die("Could not fetch.".mysqli_connect_error());
?>   
    <a href="Products.php">Back to the webshop</a><br/>
    
<div class="container">
    <?php
    if(isset($_POST['submitDeleteBtn'])){
    $key = $_POST['keyToDelete'];
        //check if the products are there
    $check = mysqli_query($con,"SELECT * FROM webshop WHERE id ='$key' ") or die ("Product not found.".mysqli_connect_error());
    if(mysqli_num_rows($check)>0){
    //product found and can be deleted.
        $queryDelete = mysqli_query($con, "DELETE FROM webshop WHERE id = '$key' ") or die ("Not deleted.".mysqli_connect_error());?>
   <div class="alert">
       <p>Product deleted</p>
    </div>
   
   <?php }
    else{
        //give warning, that the product is missing?>
    <div class= "alert">
        <p>Product missing</p>
    </div>
    
    <?php }
       }
    ?>
    <table class="table table-condensed table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Color</th>
            <th>Label</th>
            <th>Review</th>
            <th>Select</th>
            <th>Delete</th>
        </tr>
        <?php
        $id = 1;
        while ($row = mysqli_fetch_array($fetchQuery)) {?>
        <tr>
            <form action ="" method="post" role="form">
                <td><?php echo $id;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['color'];?></td>
                <td><?php echo $row['label'];?></td>
                <td><?php echo $row['review'];?></td>
                <td>
                    <input type="checkbox" name="keyToDelete" value="<?php echo $row['id'];?>" required>
                </td>
                <td>
                    <input type="submit" name="submitDeleteBtn" class="btn btn-info" value="Delete">
                </td>
            </form>
        </tr>    
       
        <?php $id++; }
        ?>

    </table>
</div>
</body>        
</html>
