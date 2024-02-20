<?php 
    include '../conn.php';

    if(isset($_POST['submit'])){
        $fileName = $_FILES['fileToUpload']['name'];
        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];


        $upload = mysqli_query($conn, "INSERT INTO files VALUE('0','$fileName')");
        if($upload == true){
            move_uploaded_file($fileTmpName,"uploads/". $fileName);
            ?>
                <script>
                    alert("Uploaded");
                    location.href='index_dashboard.php';
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("Error Upload");
                location.href='index_dashboard.php';
            </script>
            <?php
        }
    }


?>