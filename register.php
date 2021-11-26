<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
    <?php
		echo "<div class=\"class_name\">";
                                // define variables and set to empty values

                             
                            $name=$surname=$dob=$email=$cellno=$idno=$pwd=$cpwd=$hashp="";

                         
                              $err=$ername=$ersurname=$erdob=$eremail=$ereidno=$ercellno=$erpwd=$ercpwd="";
                              $Tname=$Tsurname=$Tdob=$Temail=$Tcellno=$Tidno=$Tpwd=$Tcpwd=false;
                                
                           
                              if (isset($_POST['send'])) {
                                 
                              if (empty($_POST["name"])) {
                                $ername = "First Name is required";
                                $Tname=false;
                              } else {
                                $name = test_input($_POST["name"]);
                                $Tname=true;
                                // check if name only contains letters and whitespace
                                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                                  $ername = "Only letters and white space allowed";
                                  $Tname=false; 
                                }else{
                                    if(strlen($name)<2){
                                        $ername = "fisrtname is short";
                                        $Tname=false;

                                    }
                                }
                              }

                               if (empty($_POST["surname"])) {
                                $ersurname = "surname is required";
                                $Tsurname=false;
                              } else {
                                $surname = test_input($_POST["surname"]);
                                $Tsurname=true;
                                // check if name only contains letters and whitespace
                                if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
                                  $ersurname = "Only letters and white space allowed";
                                  $Tsurname=false; 
                                }else{
                                    if(strlen($surname)<2){
                                        $ersurname = "surname is short";
                                        $Tsurname=false;

                                    }
                                }
                              }
                              
                              

                                   //cellno
                              if (empty($_POST["cellno"])) {
                                $ercellno = "Student number is required";
                                $Tcellno=false;
                              } else {
                                $cellno = test_input($_POST["cellno"]);
                                $Tcellno=true;
                                // check if name only contains letters and whitespace
                                if (!preg_match("/^[0-9]*$/",$cellno)) {
                                  $ercellno = "Only numbers allowed"; 
                                  $Tcellno=false;
                                }else{
                                    if(strlen($cellno)!=9){
                                        $ercellno = "Student number must be 9 digits";
                                        $Tcellno=false;

                                    }else{
                                      $firtn=substr($cellno, 0,1);
                                      $lasttwo=substr($cellno, 1,2);

                                      $studentNoYear=$firtn."0".$lasttwo;

                                      $currentYear=date("Y");

                                      $difference=$currentYear-$studentNoYear;

                                      if ($difference<0) {
                                        # code...
                                        //$ercellno = $currentYear." - ".$firtn."0".$lasttwo." = ".$difference;
                                        $ercellno = "Student number is not recognised";
                                        $Tcellno=false;
                                      }else{
                                        //$ercellno = $currentYear." - ".$firtn."0".$lasttwo." = ".$difference;
                                        
                                    $query="SELECT * FROM user WHERE stud_number='$cellno'";
                                    $result=mysqli_query($link,$query);
                                     if(!$result){

                                      die("db access failed ".mysqli_error($link));
                                    }
                                      //get the number of rows of the executed query  
                                    $rows=mysqli_num_rows($result);
                                                
                                  if($rows>0){
                                        $ercellno ="Student number already registered";
                                        $Tcellno=false;
                                    }

                                      }


                                      
                                    }
                                }
                              }

                              if (empty($_POST["idno"])) {
                                $ereidno = "ID number is required";
                                $Tidno=false;
                              } else {
                                $idno = test_input($_POST["idno"]);
                                $Tidno=true;
                                // check if name only contains letters and whitespace
                                if (!preg_match("/^[0-9]*$/",$idno)) {
                                  $ereidno = "Only digits allowed"; 
                                  $Tidno=false;
                                }else{
                                    if(strlen($idno)!=13){
                                        $ereidno = "ID number must be 13 digits";
                                        $Tidno=false;
                                      }else{


                                    $query="SELECT * FROM user WHERE id_nr='$idno'";
                                    $result=mysqli_query($link,$query);
                                     if(!$result){

                                      die("db access failed ".mysqli_error($link));
                                    }
                                      //get the number of rows of the executed query  
                                    $rows=mysqli_num_rows($result);
                                                
                                  if($rows>0){
                                        $ereidno ="ID number already registered";
                                        $Tidno=false;
                                    }else{

                                      if ($idno=="0000000000000") {
                          # code...
                          $ereidno = "Invalid ID Number";
                          $Tidno=false;
                        }else{
                          if (substr($idno, 6,1)>=5) {
                            # code...
                            //$error_idno = "gender= Male";
                          }else{
                           //$error_idno = "gender= Female";
                          }

                          if (substr($idno, 10,1)==0) {
                            # code...
                            //$error_idno .= "<br>Natioanality: SA Citizen";
                          }elseif (substr($idno, 10,1)==1) {
                            # code...
                            
                          }else{
                            $ereidno = "The 11th digit must either be 0 or 1";
                            $Tidno=false;
                          }

                          if (substr($idno, 0,2)>20) {
                            # code...
                            $date= date("Y");
                            $dob="19".substr($idno, 0,2);
                            if ($date-$dob>17) {
                              
                            }else{
                            $ereidno = "Household owner has to be 18 years old or older";
                            $Tidno=false;
                            }

                          }else{
                             $date= date("Y");
                              $dob="20".substr($idno, 0,2);
                           //$error_idno = $date." - 20".substr($idno, 0,2);
                           if ($date-$dob>17) {
                              
                            }else{
                            $ereidno = "Sorry user has to be 18 years old or older";
                            $Tidno=false;
                            }
                          }

                          if (substr($idno, 2,2)>12) {
                            # code...
                            $ereidno = "Sorry there are 12 months in a year";
                            $Tidno=false;
                          }else{
                            //echo substr($idno, 0,2)." ".substr($idno, 2,2)." ".substr($idno, 4,2);
                            if (substr($idno, 4,2)>31) {
                              # code...
                              $ereidno = "Sorry a month may consist of 29 to 31 days";
                              $Tidno=false;
                            }
                           
                          }
                          if (substr($idno, 2,2)==2||substr($idno, 2,2)==02||substr($idno, 2,2)=="02") {
                            # code...
                            if (substr($idno, 4,2)>29) {
                              # code...
                              $ereidno = "Sorry February may consist of 29 days max";
                              $Tidno=false;
                            }
                            
                          }else{
                            //echo substr($idno, 0,2)." ".substr($idno, 2,2)." ".substr($idno, 4,2);
                            if (substr($idno, 4,2)>31) {
                              # code...
                              $ereidno = "Sorry a months may consist of 29 to 31 days";
                              $Tidno=false;
                            }
                           
                          }
                        }
                                    }
                              

                                    }
                                }
                              }

                              

                             if (empty($_POST["email"])) {
                                $eremail= "Email is required";
                                $Temail=false;
                              } else {
                                $email = test_input($_POST["email"]);
                                $Temail=true;
                                // check if e-mail address is well-formed
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                  $eremail= "Invalid email format";
                                  $Temail=false; 
                                }else{
                                    $query="SELECT * FROM user WHERE email='$email'";
                                    $result=mysqli_query($link,$query);
                                     if(!$result){

                                      die("db access failed ".mysqli_error());
                                    }
                                      //get the number of rows of the executed query  
                                    $rows=mysqli_num_rows($result);
                                                
                              if($rows>0){
                                        $eremail ="email already registered";
                                        $Temail=false;
                                    }
                                }
                              
                               }
                               

                                
                                //1st password
                              if (empty($_POST["pwd"])) {
                                $erpwd = "Password is required";
                                $Tpwd=false;
                              } else {
                                $pwd = test_input($_POST["pwd"]);
                                $Tpwd=true;

                                    if(strlen($pwd)<8){
                                        $erpwd = "password must have at least 8 digits";
                                        $Tpwd=false;
                                        
                                    }
                                }
                                
                              
                                
                               //2nd password 
                             if (empty($_POST["cpwd"])) {
                                $ercpwd = "Password confirm is required";
                                $Tcpwd=false;
                              } else {
                                    $cpwd = test_input($_POST["cpwd"]);
                                    $hashp=password_hash($pwd,PASSWORD_DEFAULT);
                                    $Tcpwd=true;

                                    if ($pwd!=$cpwd){
                                            $ercpwd = "Password do match";
                                            $Tcpwd=false;
                                    }
                                    
                              }
                               if ($Tname&&$Tsurname&&$Temail&&$Tcellno&&$Tpwd&&$Tcpwd&&$hashp&&$Tidno) {
                                          
                                                    //echo $staffno." ".;
                                                  $sql="insert into user (stud_number,first_name,last_name,id_nr,email,password)
                                                   values ('$cellno','$name','$surname','$idno','$email','$hashp')";
                                                  if(mysqli_query($link,$sql))
                                                      {
                                                          echo '<script type="text/javascript">alert("You Succesfully Registered Please Login Your Account"); window.location = "login.php";</script>';
                                                          

                                                          
                                                      }else{die("<h3>unsuccessfully not registered </h3>".mysqli_error($link)); }
                                                    
                                      }
                            }
                            
                          



                            function test_input($data) {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                            }
                           echo "</div>";
                            ?> 

        <div class="container">
            <header>Register</header>
        
            <div class="form-outer">
                <form action="#">
                    <div class="page slidepage">
                        <div class="title">Personal Info</div>
                        <div class="field">
                        <input type="text" placeholder="Name" name="name" value="<?php echo $name;?>" />
                            <br>
                            <span class="error"><?php echo $ername;?></span>
                        
                        </div>
                        <div class="field">
                        <input type="text" placeholder="Surname" name="surname" value="<?php echo $surname;?>" />
                            <br>
                             <span class="error"><?php echo $ersurname;?></span>
                        </div>
                       
                        <div class="field">
                        <input type="text" placeholder="Student Number" name="cellno" value="<?php echo $cellno;?>" />
                            <br>
                             <span class="error"><?php echo $ercellno;?></span>
                        
                        </div>
                        <div class="field">
                        <input type="text" placeholder="Id Number" name="idno" value="<?php echo $idno;?>" />
                            <br>
                             <span class="error"><?php echo $ereidno;?></span>
                        
                        </div>
                        
                        <div class="field">
                        <input type="text" placeholder="Email"  name="email" value="<?php echo $email;?>" />
                            <br>
                             <span class="error"><?php echo $eremail;?></span>
                        
                        </div>
                   
                        <div class="field ">
                        <input type="password" placeholder="Password" name="pwd" value="<?php echo $pwd;?>"  />
                            <br>
                            <span class="error"><?php echo $erpwd;?></span>
                        
                        </div>
                        <div class="field btn">
                        
                            <button type="submit" class="btn btn-success" name="send">Submit</button>
                            
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>