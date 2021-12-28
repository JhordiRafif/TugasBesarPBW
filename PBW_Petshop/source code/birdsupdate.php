<?php
session_start();
if (isset($_SESSION['user'])) {
} else {
  echo "<script>location.href='login.html'</script>";
}
?>
<!doctype html>
<html>

<head>
  <title>Birds </title>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #484848;
    }

    .topnav {
      overflow: hidden;
      background-color: rgba(44, 130, 201, 1);
      height: 70px;
      border: 3px solid #3333ff
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
      margin: auto;
      max-width: 450px;
      box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
      border-radius: 10px;
      border: 6px solid rgba(44, 130, 201, 1);


    }
  </style>
</head>

<body>
  <div class="topnav">
    <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
    <a href="birds.php">Update Data Burung </a>
    <div class="topnav-right">
      <a href="logout.php">logout</a>
      <a href="home.html">Home</a>
    </div>
  </div>

  <form>
    <button type="submit" formaction="birds.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid #3333ff;background-color:rgba(44, 130, 201, 1);color:#f2f2f2;font-size:17px;">Kembali</button>
  </form>
  <form method="post" action="birdsupdate.php">
    <fieldset>
      <input type="text" name="id" placeholder=" Masukkan ID Burung" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;" required>
      <br><br>
      <input type="text" name="category" placeholder=" Masukkan Katagori Burung" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;" required>
      <br><br>
      <input type="text" name="type" placeholder=" Masukkan Tipe Burung" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;" required>
      <br><br>
      <select name="noise" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;">
        <option value="low">kecil</option>
        <option value="moderate">Sedang</option>
        <option value="high">Keras</option>
      </select>
      <br><br>
      <input type="number" name="cost" placeholder=" Masukkan Harga" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;" min="0" required>
      <br><br>
      <input type="submit" name="submit" value="update" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px; cursor:pointer;background-color:rgba(44, 130, 201, 1)">&ensp;
    </fieldset>
  </form>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
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
  $category = $_POST["category"];
  $type = $_POST["type"];
  $noise = $_POST["noise"];
  $cost = $_POST["cost"];

  $Query2 = "select count(*) from pets where pet_id='$id'";
  $Execute = mysqli_query($conn, $Query2);
  $count = mysqli_fetch_row($Execute);

  if ($count[0] == 1) {
    $sql = "UPDATE pets SET pet_category='$category' ,cost='$cost' WHERE pet_id='$id';
    UPDATE birds SET type= '$type',noise='$noise' where pet_id='$id";
    if ($conn->multi_query($sql) == TRUE) {
      echo '<div>
      <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">'
        . $id . ' Update berhasil</h1>
         </div>';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo '<div>
    <h1 style="color:#f2f2f2;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">ID tidak tersedia</h1>
       </div>';
  }

  $conn->close();
}

?>