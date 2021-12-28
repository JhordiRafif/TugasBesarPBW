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
        <title>Customer </title>
        <style>
            body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #484848;
}
.topnav {
  overflow: hidden;
  background-color:#8d2663;
  height: 70px;
  border: 3px solid #b40a70;
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
    outline:#b40a70 solid 5px;
    width: 100%;
    margin:5px ;
    background: #FAFAFA;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
  background-color:#8d2663;
}



.custombutton{
  margin:25px;
  
}input[type=text] {
    width: 15%;
    padding: 12px 20px;
    margin:8px ;
    border: 2px solid red;
    background:transparent;
    color:#000000;        
}


</style>    
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="customer.php">Pelanggan</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
              <a href="home.html">Home</a>
            </div>
          </div>
          <div class="custombutton">         
<form>
<button   style=" height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid  #b40a70;background-color: #8d2663;color:#f2f2f2;font-size:15px;" formaction="customeradd.php">Tambah pelanggan</button>
<button   style=" height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid  #b40a70;background-color: #8d2663;color:#f2f2f2;font-size:15px;" formaction="customerupdate.php">Update pelanggan</button>
<button  style="margin-left:500px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid  #b40a70;background-color: #8d2663;color:#f2f2f2;font-size:15px;" formaction="phone.php">Nomor Pelanggan</button>
</form>
</div>
<table border size=10 id="main-table">
    <tr>
    <th>ID pelanggan</th>
    <th>Nama awal</th>
    <th>Panggilan</th>
    <th>Nama akhir</th>
    <th>Alamat</th>
    </tr>
  </table>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script defer>
    $(document).ready(() => {
      const mainTable = $("#main-table");
      $.ajax({
        url: "./customer_api.php",
        method: "GET",
        success: (data, txt) => {
          const refinedData = JSON.parse(data);
          console.log(refinedData)
          refinedData.forEach((e) => {
            mainTable.append(`
            <tr>
              <td>${e.cs_id}</td>
              <td>${e.cs_fname}</td>
              <td>${e.cs_minit}</td>
              <td>${e.cs_lname}</td>
              <td>${e.cs_address}</td>
            </tr>
            `)
          })
        }
      })
    })
  </script>
<form action="deletecustomer.php" method="post">
<input  id="dbutton" type="text" name="t1" placeholder="Masukkan ID" required>
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid  #b40a70;background-color: #8d2663;color:#f2f2f2;font-size:15px;"type="submit" value="Delete">
</form> 

</body>
</html>