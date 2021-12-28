<?php
$con = mysqli_connect("localhost", "root", "", "Petshop_management"); // connect db
$var = mysqli_query($con,"select * from customer "); // query nya
$rows = mysqli_fetch_all($var, MYSQLI_ASSOC); // cari data dari query
echo json_encode($rows); // ubah data ke JSON biar bisa ke frontend
