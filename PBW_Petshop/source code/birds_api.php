<?php
$con = mysqli_connect("localhost", "root", "", "Petshop_management"); // connect db
$var = mysqli_query($con, "select P.pet_id,P.pet_category,A.type,A.noise, P.cost from pets P,birds A where P.pet_id=A.pet_id ");
$rows = mysqli_fetch_all($var, MYSQLI_ASSOC); // cari data dari query
echo json_encode($rows); // ubah data ke JSON biar bisa ke frontend