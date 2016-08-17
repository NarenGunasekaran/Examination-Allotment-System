<?php
include('DB/db.php');
$type='';
if(isset($_POST['submit'])){
$type = $_POST['user_type'];
}
if(isset($_REQUEST['error1']))
{
  echo "<script>alert('This user already exists !!!');</script>";
  echo "<script>window.location='index.php'</script>";
}
if(isset($_REQUEST['error2']))
{
  echo "<script>alert('Not signed in !!!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/custom_css.css" rel="stylesheet" />
</head>
<body>
  <?php 
    if($type == 1){?> 
    <div class="container">
      	<form class="login-form" style="margin-top:70px;" action="includes/submit.php" method='POST'>        
          <div class="login-wrap">
              <p class="login-img"><i class="icon_lock_alt"></i></p>
      		<div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" class="form-control" placeholder="Name" name="uname" autofocus required>
      		</div>
      		
      		<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
      		</div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" placeholder="Contact" name="contact" required>
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                    <select class="form-control m-bot15" name="department" required>
                      <option value="">--Choose Department--</option>
                      <?php
                        $query=mysqli_query($link,"SELECT * FROM department");
                        while($row=mysqli_fetch_assoc($query)){
                          echo "<option value=".$row['id'].">".strtoupper($row['dep_type'])."</option>";
                        }
                      ?>
                    </select>  
          </div>
           <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="pass" required>
          </div>
           <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Retype Password" name="re-password" id="repass" required>
          </div>  
          <input type="hidden" name="user_type_value" value="1"/>
  		    <button class="btn btn-primary btn-lg btn-block" type="submit" name="signin" onClick="return validate()">Sign me up!!</button>
  		</form>
    </div>
  <?php } if($type == 2){?>
      <div class="container">
        <form class="login-form" style="margin-top:70px;" action="includes/submit.php" method='POST'>        
          <div class="login-wrap">
              <p class="login-img"><i class="icon_lock_alt"></i></p>
          <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" class="form-control" placeholder="Name" name="uname" autofocus required>
          </div>
         <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                    <select class="form-control m-bot15" name="department" required>
                      <option value="">--Choose Department--</option>
                      <?php
                        $query=mysqli_query($link,"SELECT * FROM department");
                        while($row=mysqli_fetch_assoc($query)){
                          echo "<option value=".$row['id'].">".strtoupper($row['dep_type'])."</option>";
                        }
                      ?>
                    </select>  
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" placeholder="Contact" name="contact" required>
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="pass" required>
          </div>
           <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Retype Password" name="re-password" id="repass" required>
          </div>  
          <input type="hidden" name="user_type_value" value="2"/>
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="signin" onClick="return validate()">Sign me up!!</button>
      </form>
    </div>
  <?php } if($type == 3){?>
    <div class="container">
        <form class="login-form" style="margin-top:70px;" action="includes/submit.php" method='POST'>        
          <div class="login-wrap">
              <p class="login-img"><i class="icon_lock_alt"></i></p>
          <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" class="form-control" placeholder="Name" name="uname" autofocus >
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-link"></i></span>
                    <input type="text" class="form-control" placeholder="Roll no" name="roll_no" required>
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                    <select class="form-control m-bot15" name="course" >
                      <option value="">--Choose Course--</option>
                      <?php
                        $query=mysqli_query($link,"SELECT * FROM course");
                        while($row=mysqli_fetch_assoc($query)){
                          echo "<option value=".$row['id'].">".strtoupper($row['course'])."</option>";
                        }
                      ?>
                    </select>
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-database"></i></span>
                    <select class="form-control m-bot15" name="semester" >
                      <option value="">--Choose Semester--</option>
                      <?php
                        $query=mysqli_query($link,"SELECT * FROM semester");
                        while($row=mysqli_fetch_assoc($query)){
                          echo "<option value=".$row['id'].">".strtoupper($row['semester'])."</option>";
                        }
                      ?>
                    </select>
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" placeholder="Contact" name="contact" >
          </div>
          <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="pass" required>
          </div>
           <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Retype Password" name="re-password" id="repass" required>
          </div>  
          <input type="hidden" name="user_type_value" value="3"/>
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="signin" onClick="return validate()">Sign me up!!</button>
      </form>
    </div>
  <?php }?> 
 
<script>
function validate()
{
   var a = document.getElementById('pass').value;
   var b = document.getElementById('repass').value;
   if(a != b){return false;}else{return true;}
}
</script>   
</body>
</html>
