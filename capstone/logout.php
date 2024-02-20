<?php
include 'conn.php';

session_start();
session_destroy();




?>
<script>
    alert("Logout");
    location.href='index.php'
</script>