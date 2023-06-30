
<?php
include("class/classsql.php");
$p = new mysql();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up</title>
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
    <!-- Favicon-->
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
                    <h1 class="display-6 fw-bold">Hệ thống quản lý sự tích cực</h1>
                    <p class="fw-light mb-0">By Seven Team</p>
                  </div>
                </div>
              </div>
              <!-- Form Panel    -->
              <div class="col-lg-6 bg-white">
                <div class="d-flex align-items-center px-4 px-lg-5 h-100">
                  <form class="register-form py-5 w-100" method="post" action="">
                    <div class="input-material-group mb-3">
                   	
                      <label  for="register-username">Username</label>
                      <input class="input-material" type="text" name="txtuser" id="txtuser" >
            
                    </div>
                    <div class="input-material-group mb-3">
                   	
                      <label  for="register-username">password</label>
                      <input class="input-material" type="password" name="txtpass" id="txtpass" >
            
                    </div>
                    <div class="input-material-group mb-3">
                   	
                      <label  for="register-username">nhập lại password</label>
                      <input class="input-material" type="password" name="txtnhaplaipass" id="txtnhaplaipass" >
            
                    </div>
                    
                    <div class="input-material-group mb-3">
                   	
                      <label  for="register-username">Họ và tên</label>
                      <input class="input-material" type="text" name="txthovaten" id="txthovaten" >
            
                    </div>
                    <div class="input-material-group mb-3">
                   	
                      <label  for="register-username">Mã số sinh viên</label>
                      <input class="input-material" type="text" name="txtmasv" id="txtmasv" >
            
                    </div>
                    
                	<div class="input-material-group mb-3">
                   	
                     <?php 
										
										$p->loaddslop("select maLHP,tenLHP from lophocphan order by maLHP ");
					?>
            
                    </div>
                    
                    
                    <input name="nut" type="submit" class="btn btn-primary mb-3" id="login" value="Đăng kí"><br><small class="text-gray-500">Already have an account?  </small><a class="text-sm text-paleBlue" href="login.php">Login</a>
                    
                    
                    
                    
                    <?php
						if(isset($_POST['nut']))
						switch($_POST['nut'])
						{
							case 'Đăng kí':
							{
								$username=$_REQUEST['txtuser'];
								$pass=md5($_REQUEST['txtpass']);
								$nhaplaipass=md5($_REQUEST['txtnhaplaipass']);
								$hovaten=$_REQUEST['txthovaten'];
								$masv=$_REQUEST['txtmasv'];
								$lop=$_REQUEST['lop'];
								
								$sql="INSERT INTO `taikhoan` (username, password, tensv, idsv, malhp, phanquyen) VALUES ('$username','$pass', '$hovaten', '$masv', '$lop', '2');";
								if($username=!''&&$pass!=''&&$nhaplaipass!=''&&$hovaten!=''&&$masv!=''&&$lop!='')
								{
									if($nhaplaipass==$pass)
									{
										
										if($p->themxoasua($sql)==1)
										{
											echo'đăng kí thành công';
										}
										else
										{
											echo'đăng kí thất bại vui lòng kiểm tra lại thông tin đã nhập';
											
										}
										
										
										
									}
									else
									{
										
										echo'2 password không giống nhau';
									}
								}
								else
								{
									echo'vui lòng nhập đẩy đủ thông tin';
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
        <p class="text-white">Design by <a class="external" href="https://bootstrapious.com/p/admin-template">Lynn</a>
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
   <!-- /*<script src="js/front.js"></script>*/-->
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