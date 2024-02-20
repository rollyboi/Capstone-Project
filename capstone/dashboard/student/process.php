<?php 
    include 'conn.php';

    if(isset($_POST['file_upload'])){
        $fileName = $_FILES['fileToUpload']['name'];
        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
        
        $id_number = $_POST['id_number'];

        $upload = mysqli_query($conn, "INSERT INTO files VALUE('0','$fileName','$id_number')");
        if($upload == true){
            move_uploaded_file($fileTmpName,"uploads/". $fileName);
            ?>
                <script>
                    alert("Uploaded");
                    location.href='arduino.php';
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("Error Upload");
                location.href='arduino.php';
            </script>
            <?php
        }
    }


?>