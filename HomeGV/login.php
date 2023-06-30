<?php
include("ham_dangnhap.php");
$p=new login1();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center position-relative py-5">
        <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
          <div class="card-body p-0">
            <div class="row gx-0 align-items-stretch">
              <!-- Logo & Information Panel-->
              <div class="col-lg-6">
                <div class="info d-flex justify-content-center flex-column p-4 h-100">
                  <div class="py-5">
                    <h1 class="display-6 fw-bold">Hệ thống quản lý học tập LMS</h1>
                    <p class="fw-light mb-0"></p>
                  </div>
                </div>
              </div>
              <!-- Form Panel    -->
              
              <div class="col-lg-6 bg-white">
                <div class="d-flex align-items-center px-4 px-lg-5 h-100">

                  <form class="login-form py-5 w-100" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <?php
							$tentaikhoanErr = $matkhauErr ="";
							$tentaikhoan = $matkhau="";
							if($_SERVER["REQUEST_METHOD"] == "POST")
							{
								
								if(empty($_REQUEST['txtuser']))
								{
									$tentaikhoanErr='Bạn chưa nhập tên tài khoản';
									
								}
								else
								{
									$tentaikhoan=$p->input_data($_REQUEST['txtuser']);
									if(!preg_match("/^[a-z0-9_-]{3,16}$/",$tentaikhoan))
									{
										$tentaikhoanErr='Không được phép nhập kí tự đặc biệt';
										
									}
									
								}
								if(empty($_REQUEST['txtpass']))
								{
									$matkhauErr='Bạn chưa nhập mật khẩu';
									
								}
								else
								{
									
									$matkhau=$p->input_data($_REQUEST['txtpass']);
									if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$matkhau))
									{
										$matkhauErr='Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt:';
									}
										
									
								}
							}

					?>
                    <div class="input-material-group mb-3">
                    <label class="" for="login-username">User Name</label>
                      <input class="input-material" id="login-username" type="text" name="txtuser"  >
                      <span class="error" style="color:red;" >* <?php  echo $tentaikhoanErr; ?> </span>
                      
                    </div>
                    <div class="input-material-group mb-4">
                    <label class="" for="login-password">Password</label>
                      <input class="input-material" id="login-password" type="password" name="txtpass">
                      <span class="error" style="color:red;" >* <?php  echo $matkhauErr; ?> </span>	
                      
                    </div>
                    <input name="nut" type="submit" class="btn btn-primary mb-3"  id="login" value="Login">
                    <br><a class="text-sm text-paleBlue" href="#">Forgot Password?</a>

                                        
                    
                    
                          <?php

								if(isset($_POST['nut']))
								
									switch ($_POST['nut'])
									{
										case 'Login':
										
										{
											$user=$_REQUEST['txtuser'];
											$pass=$_REQUEST['txtpass'];
											
											if($tentaikhoanErr=='' && $matkhauErr=='')
											{
									
												if($p->loginsv($user,$pass)==2)
												{
													
													header("location:homeSV/homeSV.php");
												}
												elseif($p->loginsv($user,$pass)==3)
												{		
													
													header("location:Quantri/homequantri.php");
												}
												elseif($p->loginsv($user,$pass)==1)
												{		
													
													header("location:homeGV/homegiangvien.php");
												}
												else
												{
													echo'<p style="color:red;">Tên tài khoản hoặc mật khẩu không chính xác</p>';
												
												}
												
												
											}
											else
											{
												echo'<p style="color:red;">Bạn đang nhập sai hoặc chưa đầy đủ thông tin</p>';
												
											}
											break;
											
										}
										
										
									}
									
					?>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center position-absolute bottom-0 start-0 w-100 z-index-20">
        <p class="text-white"><a class="external" href="https://bootstrapious.com/p/admin-template"></a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Main File-->
   <!-- <script src="js/front.js"></script>-->
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>