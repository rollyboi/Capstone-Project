<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
</head>
<body>



<form action="upload.php" method="post" enctype="multipart/form-data">

FirstName:<input type="text" name="name" name="fn" required></br>
LastName:<input type="text" name="name" name="ln" required></br>
Middle Name:<input type="text" name="namemiddle" required></br>
Address:<input type="text" name="address" required></br>
Email:<input type="email"  name="email" required></br>


  Upload Image:
  <input type="file" name="fileToUpload" id="fileToUpload"></br>
  <input type="submit" name="index_dashboard.php" value="Update">
</form>

    
</body>
</html>