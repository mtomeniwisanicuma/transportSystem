<?php

include 'connect.php';

?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/style.css">

    </head>
    <?php
                                // define variables and set to empty values

                             
                            $emailErr = $err = $erpwd ="";
                              $email = $pwd ="";
                              $Temail = $Tpwd =false;
                                
                            if (isset($_POST['send'])) {

                              
                              //email
                              if (empty($_POST["email"])) {
                                $emailErr = "Email is required";
                                $Temail=false;
                              } else {
                                $email = test_input($_POST["email"]);
                                $Temail=true;
                                // check if e-mail address is well-formed
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                  $emailErr = "Invalid email format";
                                  $Temail=false; 
                                }else{
                                    $query="SELECT * FROM user WHERE email='$email'";
                                    $result=mysqli_query($link,$query);
                                     if(!$result){

                                      die("db access failed ".mysqli_error($link));
                                    }
                                      //get the number of rows of the executed query  
                                    $rows=mysqli_num_rows($result);
                                                
                              if($rows==0){
                                        $emailErr ="User not registered on our system";
                                        $Temail=false;
                                    }
                                }
                              }
                               
        
                               
                               //2nd password 
                             if (empty($_POST["pwd"])) {
                                $erpwd = "Password is required";
                                $Tpwd=false;
                              } else {

                                   $pwd = test_input($_POST["pwd"]);
                                   $Tpwd=true;
                                   
                                }
                                 if ($Tpwd && $Temail) {
                                     
                                   
                                    $query="SELECT * FROM user WHERE email='$email'";
                                    $result=mysqli_query($link,$query);

                                    if(!$result)
                                    {
                                      $err="unable to connect to database";
                                       mysqli_error($link);
                                    }else{
                                        $rows=mysqli_num_rows($result);
                                        if($rows<1)
                                        {
                                            $err="username or password doesnt exsist";
                                    
                                        }else{
                                                

                                                while ($rows=mysqli_fetch_assoc($result)) 
                                                    {
                                                        $cpwd=$rows['password'];
                                                        
                                                        //!password_verify('$passwd',$cpwd) !hash_equals('$passwd',$cpwd)
                                        

                                                        if (!password_verify($pwd,$cpwd)) {
                                                            $err="incorect password ";
                                                        }else{
                                                            $_SESSION['email']=$rows['email'];
                                                            $_SESSION['id']=$rows['stud_number'];
                                                            $_SESSION['name']=$rows['first_name'];
                                                            $_SESSION['surname']=$rows['last_name'];
                                                            $_SESSION['student_no']=$rows['stud_number'];
                                                            $_SESSION['idno']=$rows['id_nr'];
                                                            //$_SESSION['email']=$rows['email'];
                                                            echo '<script> window.location = "temp.php";</script>';
                                                            
                                                          }
                          
                                                            
                                                            
                                                            
                                                                            
                                                        }


                                                
                                                    }

                                            }
                                        }
                                      
                                    }

                            function test_input($data) {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                            }
                           
                            ?> 
    <body>
        <div class="container">
            <header>  Login form</header>
          

            <div class="form-outer">
                <form id="login.php" class="box" action="" method="post">
                    <div class="page slidepage">
                        <div class="title">Login Info</div>
                        <div class="field">
                        <input type="email" placeholder="Username" name="email" value="<?php echo $email;?>" />
                            <br>
                            <span class="error"><?php echo $emailErr;?></span>
                        
                        </div>
                        <div class="field">
                        <input type="password" placeholder="Password" name="pwd" value="<?php echo $pwd;?>" />
                            <br>
                            <span class="error"><?php echo $erpwd;?></span>
                        
                        </div>
                        <div class="field nextBtn">
                            <button  type="submit" class="btn btn-success" name="send">Login</button>
                        </div>
                        <a href="register.php">Create new account</a>
                        <a href="index.php">Back</a>
                    </div>

                   
                    </div>
                    
                </form>
            </div>
        </div>
 
    </body>
</html>