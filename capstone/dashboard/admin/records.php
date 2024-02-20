<?php
    include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Page</title>
</head>
<body>

<div class="nav">

    <a href="index.php"> Add Students </a> &nbsp; | &nbsp;
    <a href="records.php"> View Records </a>

</div>

<h1> List of Students </h1>

    <table border="5px solid">
        <tr>
            <th>Id </th>
            <th> Firstname </th>
            <th> Lastname </th>
            <th> Section </th>
            <th> Action 1 </th>
            <th> Action 2 </th>
        </tr>

        <tr>
            <?php
            $getdata = mysqli_query($conn, "SELECT * FROM tbl_list");
            while($row = mysqli_fetch_array($getdata)){
            ?>

        <tr>

            <td> <?php echo $row['id'];?></td>
            <td> <?php echo $row['fn'];?></td>
            <td> <?php echo $row['ln'];?></td>
            <td> <?php echo $row['section'];?></td>
            <td> <a href="update.php?id=<?php echo $row['id'];?>"> Update </a> </td>
            <td> <a href="delete.php?id=<?php echo $row['id'];?>"> Delete </a> </td>

        </tr>

            <?php
            }
            ?>


        </tr>




    </table>



    
</body>
</html>