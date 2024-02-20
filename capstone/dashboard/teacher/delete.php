<?php
    include "conn.php";

    $ref_id = $_GET['id'];
    
    
    $delete = mysqli_query($conn, "DELETE * FROM `userinfo` WHERE id='$ref_id'");

    if($delete == true){
        ?>
        <script>
                alert("1 Data is Deleted");
                window.location.href="index_dashboard.php";
        </script>
        <?php
    }else{
        ?>
        <script>
                alert("Error in Deleting");
                window.location.href="index_dashboard.php";
        </script>
        <?php
    }
    
?>