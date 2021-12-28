<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
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
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    outline: #ff0000 solid 5px;
    background: #FAFAFA;
    width: 100%;
    margin:5px ;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
    background-color:#f44336;
}


.custombutton{
  margin:25px;
  
}input[type=text] {
    width: 15%;
    padding: 12px 20px;
    margin: 8px ;
    border: 2px solid red;
    background:transparent;
}        
            
    </style>     
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="petproducts.php">Produk hewan</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
              <a href="home.html">Home</a>
            </div>
          </div>
          <div class="custombutton">          
<form>
<button  style="height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" formaction="productsadd.php">Tambahkan produk baru</button>
<button  style="margin-left:900px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" formaction="productupdate.php">Update produk</button>
</form>
</div>
<table border size=10 id="main-table">
    <tr>
    <th>Produk ID</th>
    <th>Nama produk</th>
    <th>Tipe produk</th>
    <th>Harga</th>
    <th>Pemakaian hewan</th>
    </tr>
  </table>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script defer>
    $(document).ready(() => {
      const mainTable = $("#main-table");
      $.ajax({
        url: "./product_api.php",
        method: "GET",
        success: (data, txt) => {
          const refinedData = JSON.parse(data);
          console.log(refinedData)
          refinedData.forEach((e) => {
            mainTable.append(`
            <tr>
              <td>${e.pp_id}</td>
              <td>${e.pp_name}</td>
              <td>${e.pp_type}</td>
              <td>${e.cost}</td>
              <td>${e.belongs_to}</td>
            </tr>
            `)
          })
        }
      })
    })
  </script>
<form action="deleteproducts.php" method="post">
    <input type="text" name="t1" placeholder="Masukkan id" required >
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" type="submit" value="delete">
</form> 

</body>
</html>