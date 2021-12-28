<?php
session_start();
if (isset($_SESSION['user'])) {
} else {
  echo "<script>location.href='login.html'</script>";
}
?>
<html>

<head>
  <title>Animals </title>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #484848;
    }

    .topnav {
      overflow: hidden;
      background-color: #4CAF50;
      height: 70px;
      border: 3px solid green;
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

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      outline: green solid 5px;
      background: #FAFAFA;
      margin: 5px;
      width: 100%;
    }

    td,
    th {
      border: 2px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #4CAF50;
    }


    .custombutton {
      margin: 25px;

    }

    input[type=text] {
      width: 15%;
      padding: 12px 20px;
      margin: 8px;
      background: transparent;
      border: 2px solid red;
      color: #f2f2f2;
    }
  </style>
</head>

<body>
  <div class="topnav">
    <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
    <a href="animals.php">Hewan Peliharaan</a>
    <div class="topnav-right">
      <a href="logout.php">logout</a>
      <a href="home.html">Home</a>
    </div>
  </div>
  <div class="custombutton">
    <form>
      <button style="  height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid green;background-color: #4CAF50;color:#f2f2f2;font-size:17px;" formaction="animalsadd.php">Tambah hewan peliharaan</button>

      <button style="margin-left:900px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid green;background-color: #4CAF50;color:#f2f2f2;font-size:17px;" formaction="animalsupdate.php">update hewan peliharaan</button>
    </form>
  </div>
  <table border size=10 id="main-table">
    <tr>
      <th>ID Hewan</th>
      <th>Kategori</th>
      <th>breed</th>
      <th>Berat(kg)</th>
      <th>Panjang(cm)</th>
      <th>Umur(bln)</th>
      <th>Warna bulu</th>
      <th>cost</th>
    </tr>
  </table>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script defer>
    $(document).ready(() => {
      const mainTable = $("#main-table");
      $.ajax({
        url: "./animals_api.php",
        method: "GET",
        success: (data, txt) => {
          const refinedData = JSON.parse(data);
          console.log(refinedData)
          refinedData.forEach((e) => {
            mainTable.append(`
            <tr>
              <td>${e.pet_id}</td>
              <td>${e.pet_category}</td>
              <td>${e.breed}</td>
              <td>${e.weight}</td>
              <td>${e.height}</td>
              <td>${e.age}</td>
              <td>${e.fur}</td>
              <td>${e.cost}</td>
            </tr>
            `)
          })
        }
      })
    })
  </script>

  <div class="lastblock" style="margin-top:25px;">
    <form action="deleteanimal.php" method="post">
      <input id="dbutton" type="text" name="t1" placeholder="Masukkan ID" required>
      <input style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid green;background-color: #4CAF50;color:#f2f2f2;font-size:17px;" type="submit" value="Delete">
    </form>
  </div>
</body>

</html>