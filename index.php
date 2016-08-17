<?php
session_start();
if(isset($_REQUEST['success']))
{
  echo "<script>alert('Registered !!!');</script>";
  header('location:index.php');
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
    <script src="js/jquery-1.9.1.min.js"></script>
</head>
<body class="login-img3-body">
    <div class="container">
         <form class="login-form" action="includes/submit.php" method='POST'>        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <label class="error">
                <?php
                    if(isset($_REQUEST['fail']))
                    {
                        echo " User Login Failed !!!";
                    }
                ?>
            </label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="email" class="form-control" placeholder="Email" name="email" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="pass" required>
            </div>
            <label class="checkbox">
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
            <a href="#myModal" class="btn btn-info btn-lg btn-block" data-toggle="modal">Signup</a>
        </div>
      </form>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Choose User</h4>
              </div>
              <form class="" action="signup.php" method="post">   
              <div class="modal-body" style="margin-left:100px;">
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="user_type" value="1" checked> Department Admin</label>
                            </div>    
                        </div>   
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="user_type" value="2"> Teacher</label>
                            </div>    
                        </div>    
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="user_type" value="3"> Student</label>
                            </div>    
                        </div>     
              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-success" value="Proceed..." name="submit"/>
              </div>
               </form>
          </div>
      </div>
  </div>

     <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
   
    <!-- custom gritter script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>                          
</body>
</html>