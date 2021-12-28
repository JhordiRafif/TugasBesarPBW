<?php
session_start();
if (isset($_SESSION['user'])) {
} else {
  echo "<script>location.href='login.html'</script>";
}
?>
<html>

<head>
  <title>Saledetails </title>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #484848;
    }

    .topnav {
      overflow: hidden;
      background-color: rgba(249, 105, 14, 1);
      height: 70px;
      border: 3px solid #e69500;
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
      outline: #e69500 solid 5px;
      background: #FAFAFA;
      width: 100%;
      margin: 5px;

    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: rgba(249, 105, 14, 1);
    }


    .custombutton {
      margin: 25px;

    }

    input[type=text] {
      width: 20%;
      padding: 12px 20px;
      margin: 8px;
      border: 2px solid red;
      background: transparent;
      color: #000000;
    }
  </style>
</head>

<body>
  <div class="topnav">
    <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
    <a href="sales.php">Detail Penjualan</a>
    <div class="topnav-right">
      <a href="logout.php">logout</a>
      <a href="home.html">Home</a>
    </div>
  </div>
  <div class="custombutton">
    <form>
      <button style=" height: 50px;width: 120px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px; " formaction="salesadd.php">Tambah Data Baru</button>
      <button style="height: 50px;width: 110px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px;" formaction="salesupdate.php">Update Detalis Penjualan</button>
      <button style="margin-left:800px; height: 50px;width: 110px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px;" formaction="soldproducts.php">Produk yang Terjual</button>
      <button style="height: 50px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px;" formaction="soldpets.php">peliharaan yang Terjual</button>
    </form>
  </div>
  <table border size=10 id="main-table">
    <tr>
    <th>ID Penjual</th>
    <th>ID Pelanggan</th>
    <th>Tanggal</th>
    <th>total</th>
    </tr>
  </table>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script defer>
    $(document).ready(() => {
      const mainTable = $("#main-table");
      $.ajax({
        url: "./sales_api.php",
        method: "GET",
        success: (data, txt) => {
          const refinedData = JSON.parse(data);
          console.log(refinedData)
          refinedData.forEach((e) => {
            mainTable.append(`
            <tr>
              <td>${e.sd_id}</td>
              <td>${e.cs_id}</td>
              <td>${e.date}</td>
              <td>${e.total}</td>
            </tr>
            `)
          })
        }
      })
    })
  </script>
  <form action="deletesales.php" method="post">
    <input id="dbutton" type="text" name="t1" placeholder="Masukkan ID yang ingin di delete" required>
    <input style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:15px;" type="submit" value="Delete">
  </form>

</body>

</html>