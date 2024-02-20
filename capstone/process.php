<?php

//This code is for sign up as a Student
include "conn.php";
session_start();
date_default_timezone_set('Asia/Singapore');
$currentTime = date('m/d/Y h:i:s a', time());


if(isset($_POST['register_user1'])){

$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$idnumber = $_POST['text'];
$namegiven = $_POST['namegiven'];
$namemiddle = $_POST['namemiddle'];
$namefamily = $_POST['namefamily'];
$dateofbirth =strtotime($_POST['date']);	
$gender = $_POST['gender'];
$usertype= $_POST['usertype'];
$currentTime2= strtotime($currentTime);


/*$query_username = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`= '$username'");
$count_username = mysqli_num_rows($query_username);*/

$query_email = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`= '$email'");
$count_email = mysqli_num_rows($query_email);

$query_idnumber = mysqli_query($conn, "SELECT * FROM `users` WHERE `id_number`= '$idnumber'");
$count_idnumber = mysqli_num_rows($query_idnumber);

if($password==$confirmpassword){
    
        if($count_email==0){

            if($count_idnumber==0){

                mysqli_query($conn, "INSERT INTO `users`
                (`user_type`, `password`, `id_number`, `email`, `date_registration`, `accountStatus`)
                VALUES('$usertype', '$password', '$idnumber', '$email', $currentTime2, 'Active')");
                $last_id = mysqli_insert_id($conn);
                mysqli_query($conn, "INSERT INTO `userinfo`
                (`user_id`, `name_given`, `name_middle`, `name_family`, `date_of_birth`, `gender`)
                VALUES($last_id, '$namegiven', '$namemiddle', '$namefamily', '$dateofbirth', '$gender')");

                            ?>
                <script>
                    alert('Register Success');
                    window.location.href="index.php";
                </script>
            <?php

            }else{
                echo "This ID has already Taken";
            }

        }else{
            ?>
            <script>
                alert('This ID has already Taken');
                window.location.href="index.php";
            </script>
        <?php
        }
        
    }

}



//This is for sign up as Teacher

date_default_timezone_set('Asia/Singapore');
$currentTime = date('m/d/Y h:i:s a', time());


if(isset($_POST['register_user2'])){

$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$idnumber = $_POST['text'];
$namegiven = $_POST['namegiven'];
$namemiddle = $_POST['namemiddle'];
$namefamily = $_POST['namefamily'];
$dateofbirth =strtotime($_POST['date']);	
$gender = $_POST['gender'];
$usertype= $_POST['usertype'];
$currentTime2= strtotime($currentTime);


/*$query_username = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`= '$username'");
$count_username = mysqli_num_rows($query_username);*/

$query_email = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`= '$email'");
$count_email = mysqli_num_rows($query_email);

$query_idnumber = mysqli_query($conn, "SELECT * FROM `users` WHERE `id_number`= '$idnumber'");
$count_idnumber = mysqli_num_rows($query_idnumber);

if($password==$confirmpassword){
    

        if($count_email==0){

            if($count_idnumber==0){

                mysqli_query($conn, "INSERT INTO `users`
                (`user_type`, `password`, `id_number`, `email`, `date_registration`, `accountStatus`)
                VALUES('$usertype', '$password', '$idnumber', '$email', $currentTime2, 'Active')");
                $last_id = mysqli_insert_id($conn);
                mysqli_query($conn, "INSERT INTO `userinfo`
                (`user_id`, `name_given`, `name_middle`, `name_family`, `date_of_birth`, `gender`)
                VALUES($last_id, '$namegiven', '$namemiddle', '$namefamily', '$dateofbirth', '$gender')");

                            ?>
                <script>
                    alert('Login Success');
                    window.location.href="index.php";
                </script>
            <?php

            }else{
                ?>
                <script>
                    alert('This ID has already Taken');
                    window.location.href="index.php";
                </script>
            <?php
            }

        }else{
            ?>
            <script>
                alert('This email is already taken');
                window.location.href="index.php";
            </script>
        <?php
        }
        
    }

}


//teacher login
if(isset($_POST['teacher_login'])){
        $teacher_email = $_POST['email'];
        $teacher_pass  = $_POST['pass'];
        $teach_stat = "Teacher";

        $teacher_query = mysqli_query($conn, "SELECT * FROM users WHERE email='$teacher_email' AND password ='$teacher_pass' AND user_type='$teach_stat'");
        $teach_valid = mysqli_num_rows($teacher_query);
        if($teach_valid >=1){
            ?>
                <script>
                    alert("You Login as Teacher");
                    location.href='dashboard/teacher/index_dashboard.php';

                </script>
            <?php
        }else{
            ?>
     <script>
                    alert("Wrong Email or Password");
                    location.href='index.php';

                </script>
            <?php
        }

}
//student
if(isset($_POST['student_login'])){
    $student_email = $_POST['email'];
    $student_pass  = $_POST['pass'];
    $student_stat = "Student";

    $student_query = mysqli_query($conn, "SELECT * FROM users WHERE email='$student_email' AND password ='$student_pass' AND user_type='$student_stat'");
    $student_valid = mysqli_num_rows($student_query);
    if($student_valid >=1){
        $_SESSION['email'] = $student_email;
        ?>
     
            <script>
                alert("You Login as Student");
                location.href='dashboard/student/index_dashboard.php';

            </script>
        <?php
    }else{
        ?>
 <script>
                alert("Wrong Email or Password");
                location.href='index.php';

            </script>
        <?php
    }

}


//login process Admin

if(isset($_POST['login_user1'])){
    $process_email = $_POST['email'];
    $process_password = $_POST['pass'];
    
    $checkAccountStatement = "SELECT * FROM `users` WHERE `email`= '$process_email'";
    $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
    $countAccount = mysqli_num_rows($checkAccountQuery);

    if($countAccount == 1){
        $rowData = mysqli_fetch_assoc($checkAccountQuery);
        $databasePassword = $rowData['password'];
        if($databasePassword == $process_password){
            $_session['email']=$process_email;
            ?>
                <script>
                    alert('Login Success');
                </script>
            <?php
            header('Location:dashboard/admin/index_dashboard.php');
        $databaseUserID = $rowData['user_id'];
        echo $databaseUserID;


        $databaseUserType = $rowData['user_type'];
        echo $databaseUserType;
        $accountStatus = $rowData['accountStatus'];
        echo $accountStatus;


        ?>
        <script>
            alert('Proceed');
            window.location.href="index_dashboard.php";
        </script>
    <?php

        }else{
            ?>
            <script>
                alert("Wrong Emai or Password");
                window.location.href="index.php";
            </script>
            <?php


        }
    }else{
        ?>
        <script>
            alert("Please Create Account");
            window.location.href="index.php";
        </script>
        <?php

    }

    //Login Teacher

    /*if(isset($_POST['login_user2'])){
        $process_email = $_POST['email'];
        $process_password = $_POST['pass'];
        
        $checkAccountStatement = "SELECT * FROM `users` WHERE `email`= '$process_email'";
        $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
        $countAccount = mysqli_num_rows($checkAccountQuery);
    
        if($countAccount == 1){
            $rowData = mysqli_fetch_assoc($checkAccountQuery);
            $databasePassword = $rowData['password'];
            if($databasePassword == $process_password){
                $_session['email']=$process_email;
                ?>
                    <script>
                        alert('Login Success');
                    </script>
                <?php
                header('Location:dashboard/teacher/index_dashboard.php');
            $databaseUserID = $rowData['user_id'];
            echo $databaseUserID;
    
    
            $databaseUserType = $rowData['user_type'];
            echo $databaseUserType;
            $accountStatus = $rowData['accountStatus'];
            echo $accountStatus;
    
    
            ?>
            <script>
                alert('Proceed');
                window.location.href="index_dashboard.php";
            </script>
        <?php
    
            }else{
                ?>
                <script>
                    alert("Wrong Email or Password");
                    window.location.href="index.php";
                </script>
                <?php
    
    
            }
        }else{
            ?>
            <script>
                alert("Please Create Account");
                window.location.href="index.php";
            </script>
            <?php
    
        }

            //Login Student

    if(isset($_POST['login_user3'])){
        $process_email = $_POST['email'];
        $process_password = $_POST['pass'];
        
        $checkAccountStatement = "SELECT * FROM `users` WHERE `email`= '$process_email'";
        $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
        $countAccount = mysqli_num_rows($checkAccountQuery);
    
        if($countAccount == 1){
            $rowData = mysqli_fetch_assoc($checkAccountQuery);
            $databasePassword = $rowData['password'];
            if($databasePassword == $process_password){
                $_session['email']=$process_email;
                ?>
                    <script>
                        alert('Login Success');
                    </script>
                <?php
                header('Location:dashboard/student/index_dashboard.php');
            $databaseUserID = $rowData['user_id'];
            echo $databaseUserID;
    
    
            $databaseUserType = $rowData['user_type'];
            echo $databaseUserType;
            $accountStatus = $rowData['accountStatus'];
            echo $accountStatus;
    
    
            ?>
            <script>
                alert('Proceed');
                window.location.href="index_dashboard.php";
            </script>
        <?php
    
            }else{
                ?>
                <script>
                    alert("Wrong Email or Password");
                    window.location.href="index.php";
                </script>
                <?php
    
    
            }
        }else{
            ?>
            <script>
                alert("Please Create Account");
                window.location.href="index.php";
            </script>
            <?php
    
        }

    /*$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  
}
//this code is for add students

if(isset($_POST['add_students'])){

    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $sec = $_POST['sec'];
    
        $insert = mysqli_query($conn, "INSERT INTO tbl_list VALUES ('0','$fn','$ln','$sec')");
    
        if($insert == true){
                ?>
                <script>
                        alert("Data is successfully Inserted!");
                        window.location.href="index.php";
                        </script>
                        <?php
        }else{
                 ?>
                 <script>
                    alert("Data is successfully Inserted!");
                    window.location.href="index.php";
                        </script>
                         <?php    
            }
        
        }
    
    
            //this program is for update students
    
            if(isset($_POST['update_student'])){
                $ref_id = $GET_['id'];
    
                $a = $_POST['update_fn'];
                $b = $_POST['update_ln'];
                $c = $_POST['update_sec'];
    
                $update_student = mysqli_query($conn, "UPDATE tbl_list SET fn= '$a', ln='$b', section='$c' WHERE id='$ref_id'");
    
                if($update_student == true){
                    ?>
                    <script>
                       alert("Data is Updated!");
                       window.location.href="records.php";
                           </script>
                            <?php  
    
                }else{
                    ?>
                    <script>
                       alert("Error in Updating!");
                       window.location.href="records.php";
                           </script>
                            <?php  
    
                }
    
            }*/

       /* }
        }
    }*/
}






?>