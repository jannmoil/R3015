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
</head>
<body style="padding-top: 100px;">

<?php
    $fetchQuery = mysqli_query($con,"SELECT * FROM webshop") or die("could not fetch".mysqli_error());
?>    

<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Color</th>
            <th>Label</th>
            <th>Review></th>
            <th>Select></th>
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
                    <input type="checkbox" name="keyToDelete" value="<?php echo $row['id'];?>">
                </td>
                <td>
                    <input type="submit" name="submitDeleteBtn" class="btn">
                </td>
            </form>
        </tr>    
       
        <?php $id++; }
        ?>

    </table>
</div>
</body>        
</html>
