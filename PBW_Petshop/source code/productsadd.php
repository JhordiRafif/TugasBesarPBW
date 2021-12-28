<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!doctype html>
<html>
<head>
        <title>Petproducts </title>
        <style>
  body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #484848;
}
.topnav {
  overflow: hidden;
  background-color: #f44336;
  height: 70px;
  border: 3px solid #ff0000;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 35px;
  font-weight: bold;
}

.topnav-right {
  float: right;
} 
fieldset { 
  background: #FAFAFA;
	padding: 10px;
   margin:auto;
   max-width:450px;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid  #f44336;


}

    </style>     
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="petproducts.php">pets products</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
              <a href="home.html">Home</a>
            </div>
          </div>
    <form>
        <button type="submit" formaction="petproducts.php" style="margin:15px;height: 30px;width: 100px;
        cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;">Kembali</button>
</form>
<form method="post" action="productsadd.php"> 
<fieldset> 
   <input type="text" name="id" placeholder="Masukkan ID produk ..." style="width:100%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" required>
  <br><br>
  <input type="text" name="name" placeholder="Masukkan nama produk ..." style="width:100%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" required>
  <br><br>
   <input type="text" name="type" placeholder="Masukkan tipe produk ..." style="width:100%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" required>
  <br><br>
  <input type="number" name="cost" placeholder="Masukkan harga" style="width:100%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" min="0" required>
  <br><br>
  <input type="text" name="belong" placeholder="Cocok ke kategori hewan" style="width:100%;height:30px;
   border: 2px solid  #f44336; border-radius:3px;  background:transparent;" required>
  <br><br>
  <input type="submit" name="submit" value="save"  placeholder=" Cocok ke kategori hewan" style="width:100%;height:30px;
   border: 2px solid  #f44336; border-radius:3px; cursor:pointer;background-color:#f44336">&ensp; 
</fieldset>
</form> 
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
// define variables and set to empty values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Petshop_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "  CONNECTION ESTABLISHED \r\n";
//echo "  INSERTION IN PROCESS";
$id = $_POST["id"];
  $name = $_POST["name"];
  $type= $_POST["type"];
  $belongs = $_POST["belong"];
  $cost = $_POST["cost"];




$sql = "INSERT INTO pet_products( pp_id,pp_name,pp_type,cost,belongs_to)
VALUES ('$id','$name','$type','$cost','$belongs')";
if ($conn->query($sql) == TRUE) {
  echo'<div>
  <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">Data dari id='
  .$id. ' telah dimasukkan</h1>
     </div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>