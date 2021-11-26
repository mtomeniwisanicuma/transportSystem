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
    <span class="title"><h2>Available Seats</h2></span><br>
</a>


    <li>
    <a href="index.php">
    <span class="icon"></span>
    <span class="title"> Back </span>
</a>
<a href="booking.php">
    <span class="icon"></span>
    <span class="title">Book>></span>
</a>
   
    </ul>
    </div>
</ul>
</div>
<div class="main">
    <div class="topbar">


    <label>
  <h1><?php echo $name .$surname?></h1>

    </label>
<div class="user">
                <img src='images/1.jpg'>
            </div>
</div>
<h1>Transport day:<?php $dayofweek=date("w");
switch($dayofweek){
    case 1:
        echo "Monday!";
        break;
        case 2:
            echo "tuesday!";
            break;
            case 3:
                echo "wednesday!";
                break;
                case 4:
                    echo "thursday!";
                    break;
                    case 5:
                        echo "friday!";
                        break;

}?>
<div class="cardBox">

    <div class="card">
        <div class="numbers">
        <?php
      
    $res=mysqli_query($link,"select MAX(bookId) seet from booking  ");
    while($row=mysqli_fetch_array($res))
    {
    echo"<tr>";
    echo"<td>";echo 70-$row["seet"];  
    echo"</tr>";
    }
    ?>
        </div>
        <div class="cardName">Ga-Rankuwa</div>
    
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    <div class="card">
        <div class="numbers">
        <?php
   $res=mysqli_query($link,"select MAX(bookId) seet from booking  ");
    while($row=mysqli_fetch_array($res))
    {
     
            echo"<td>"; echo $row["seet"];
        }
?>
        </div>
        <div class="cardName">Soshanguve S</div>
   
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    
    <div class="card">
        <div class="numbers">
        <?php
      
  $res=mysqli_query($link,"select MAX(bookId) seet from booking  ");
    while($row=mysqli_fetch_array($res))
    {
    
    echo"<td>";echo 60-$row["seet"];  
    
    }
    ?>
        </div>
        <div class="cardName">Soshanguve N</div>
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    <div class="card">
        <div class="numbers">
        <?php
      
      $res=mysqli_query($link,"select MAX(bookId) seet from booking  ");
        while($row=mysqli_fetch_array($res))
        {
        
        echo"<td>";echo $row["seet"];  
        
        }
        ?>
        </div>
        <div class="cardName">Pretoria</div>
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    <div class="card">
        <div class="numbers">
        <?php
      
  $res=mysqli_query($link,"select MAX(bookId) seet from booking  ");
    while($row=mysqli_fetch_array($res))
    {
    
    echo"<td>";echo 20-$row["seet"];  
    
    }
    ?>
        </div>
        <div class="cardName">Arcedia</div>
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    <div class="card">
        <div class="numbers">
        <?php
      
  $res=mysqli_query($link,"select MAX(bookId) seet from booking  ");
    while($row=mysqli_fetch_array($res))
    {
    
    echo"<td>";echo 40- $row["seet"];  
    
    }
    ?>
        </div>
        <div class="cardName">Arts</div>
    <div class="iconBox"></div>
    <i class="fa fa-eye" aria-hidden="true"></i>
    </div>
    </div>

    </body>
    </html>
