<?php

include 'connect.php';
include 'header_sess.php';

?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/style.css">

    </head>
    <body>

<?php

if(isset($_POST['send'])){

  $lname=$name;
  $lsurname=$surname;
  $studNo=$student_no;
  $depart=$_POST['depart'];
  $departTime=$_POST['departTime'];
  $desti=$_POST['desti'];

 
  $_SESSION['depart']=$depart;
  $q =" INSERT INTO booking(stud_number,first_name,last_name,depart,departTime,desti) VALUES ('$studNo','$lname','$lsurname','$depart','$departTime','$desti')";
  if(mysqli_query($link,$q)){

    echo '<script type="text/javascript">alert("You Succesfully Booked a Bus"); window.location = "booking.php";</script>';
  }else{
      $failed =" something went wrong";
  }
}else{
$msz ="please select another time to upload";
}





?>

<div class="container">
<header>  Welcome <br> <?php echo $name." ".$surname;?></header>
    <header>BOOK A BUS</header>

  <div class="form-outer">
      <form id="booking.php" action="" method="post">

          <div class="page slidepage">
              <div class="title">Personal Info</div>
    
              <div class="field">
              <select  placeholder="Departure Campus"  name="depart" value="">
                                <option value="SoshanguveNorth">Soshanguve North</option>
                                <option value="SoshanguveSouth">Soshanguve South</option>
                                <option value="Polokwane">Polokwane</option>
                                <option value="Arcedia">Arcedia</option>
                                <option value="Arts">Arts </option>
                                <option value="Ga-Rankuwa">Ga-Rankuwa</option>
                                <option value="Mbobela">Mbobela</option>
                            </select>
                  <br>
                
              
              </div>
              
              <div class="field">
              <input type="datetime-local" placeholder="departTime"  name="departTime" value="" />
                  <br>
              
              
              </div>
         
              <div class="field ">
              <select  placeholder="Departure Campus"  name="desti" value="">
                                <option value="SoshanguveNorth">Soshanguve North</option>
                                <option value="SoshanguveSouth">Soshanguve South</option>
                                <option value="Polokwane">Polokwane</option>
                                <option value="Arcedia">Arcedia</option>
                                <option value="Arts">Arts </option>
                                <option value="Ga-Rankuwa">Ga-Rankuwa</option>
                                <option value="Mbobela">Mbobela</option>
                            </select>
                  <br>
                
              
              </div>
              <div class="title">Health Check</div>
                        <div class="field">
                        <div class="label">Been recently expriencing high feaver </div>
                        <p>
                           <input type="checkbox" name='check' value="Yes">Yes 
                           <input type="checkbox" name='check' value="No"> No 
                        
                          </p>
                       
                          </div>
                        
                        <div class="field">
                      
                        </div>
                        <div class="label">Been recently in contact with anyone inffect with covid-19 </div>
                        <p>
                           <input type="checkbox" name='check2' value="Yes">Yes 
                           <input type="checkbox" name='check2' value="No"> No 
                        
                          </p>
              <div class="field btn">
              
                  <button type="submit" class="btn btn-success" name="send">Book Seat</button>
                  <a href="index.php">Logout</a>
                  
              </div>
          </div>
          
      </form>