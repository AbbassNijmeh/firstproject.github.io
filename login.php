<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <script type = "text/javascript" >
              function preventBack(){window.history.forward();}
                setTimeout("preventBack()", 0);
            window.onunload=function(){null};
        </script>

    <title>Login #3</title>
  </head>
  <body>
    <?php 
    include 'connection.php';
    include 'validate.php';
    ?>
  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/login-background.png') ;"></div>
    <div class="contents order-2 order-md-1">
      

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h1>Login to your<strong> Dashboard !</strong></h1>
              <h2 id="restriction"> <strong>Only Admins Allowed</strong></h2>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="validate.php" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="your-email@gmail.com" id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Your Password" id="password">
                  <?php if (isset($_GET['error'])) { ?>
                    <p><?php echo $_GET['error']; ?></p>
                  <?php } ?>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" name="submit"value="Log In" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>