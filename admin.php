<?php
include 'header_sess.php';

?>

    <html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style4.css">
    </head>
    <body>
    <div class="container">
    <div class="navigation">
    <ul>
    <li>
        <a href="#">
    <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></i></span>
    <span class="title"><h2>Admin Page</h2></span>
</a>


    <li>
    <a href="index.php">
    <span class="icon"></span>
    <span class="title">Back</span>
</a>

   
    </ul>
    </div>
</ul>
</div>
<div class="main">
    <div class="topbar">
 <lable font-color='white'>
              Menu
            </lable>
        <div class="toggle" onclick="toggleMenu();"></div>
        <div class="search">
           
          
</div>

    <label>
  <h1><?php echo $name .$surname?></h1>

    </label>
<div class="user">
                <img src='images/1.jpg'>
            </div>
</div>
<div class="cardBox">
    <div class="card">
        <div class="numbers">
        <?php
     
    $res=mysqli_query($link,"select MAX(bookId) b from booking  ");
    while($row=mysqli_fetch_array($res))
    {
    echo"<tr>";
    echo"<td>";echo $row["b"];  
    echo"</tr>";
    }
    ?>
        </div>
        <div class="cardName">Total bookings </div>
    
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    <div class="card">
        <div class="numbers">
        <?php
   $res=mysqli_query($link,"select MAX(bookId) b from booking ");
    while($row=mysqli_fetch_array($res))
    {
     
            echo"<td>"; echo $row["b"];
        }
?>
        </div>
        <div class="cardName">Counceled</div>
   
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    
    <div class="card">
        <div class="numbers">
   
        </div>
        <div class="cardName">Next Bus</div>
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    <div class="card">
        <div class="numbers"></div>
        <div class="cardName">Total Buses</div>
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    </div>

<div class="details">
<div class="recentOrders">
<div class="cardHeader">
    <h2>All Booked Students on the Next Bus</h2>
   
</div>
<table> 
<thead>
        <tr>
            <td>name</td>
            <td>surname</td>
            <td>Student No:</td>
            <td>destination:</td>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
    $res=mysqli_query($link,"select * from booking");
    while($row=mysqli_fetch_array($res))
    {
    echo"<tr>";
    echo"<td>";echo $row["first_name"];
    echo"<td>";echo $row["last_name"];
    echo"<td>";echo $row["stud_number"];
    echo"<td>";echo $row["desti"];
    
    echo"</tr>";
    }
 ?>
        </tr>
      
</tbody>
</table>
</div>

<div class="recentOrders">
<div class="cardHeader">
    <h2>waiting list</h2>
   
</div>
<table> 
    <thead>
        <tr>
            <td>name</td>
            <td>surname</td>
            <td>Student No</td>
            <td>Destination</td>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
    $res=mysqli_query($link,"select * from booking");
    while($row=mysqli_fetch_array($res))
    {
    echo"<tr>";
    echo"<td>";echo $row["first_name"];
    echo"<td>";echo $row["last_name"];
    echo"<td>";echo $row["stud_number"];
    echo"<td>";echo $row["desti"];

    
    echo"</tr>";
    }
 ?>
        </tr>
      
</tbody>
</table>
</div>
</div>
 
<script>
    function toggleMenu(){
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        toggle.classList.toggle('active')
        navigation.classList.toggle('active')
        main.classList.toggle('active')
    }
</script>
    </body>
    </html>
