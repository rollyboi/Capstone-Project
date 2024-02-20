<?php
echo $_FILES["fileToUpload"]["name"];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["prdcts"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    ?>
    <script>
        alert('Upload Success');
        window.location.href="index_dashboard.php";
    </script>
<?php
    $uploadOk = 1;
  } else {
    ?>
    <script>
        alert('Error');
        window.location.href="index_dashboard.php";
    </script>
<?php
    $uploadOk = 0;
  }
}
?>