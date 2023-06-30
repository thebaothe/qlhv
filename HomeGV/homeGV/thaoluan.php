<?php
session_start();
include("ham_xemthogntincanhan.php");
$p=new login2();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass'])&&isset($_SESSION['tennguoidung'])&& isset($_SESSION['phanquyen']) && $_SESSION['phanquyen']='giảng viên' )
{
	include('../ham_dangnhap.php');
	$q=new login1();
	if($q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['tennguoidung'],$_SESSION['phanquyen'])==1)
	{
		
		header('location:../login.php');
		
	}
	else
	{
		
	}
	

}
else
{
	header('location:../login.php');
}


?>
<?php

								$id_binhluan='';
								if( isset($_GET['id']))
								{
									$id_binhluan=$_GET['id'];
								}
								$id_traloi='';
								if(isset($_GET['id_traloi']))
								{
									
									$id_traloi=$_GET['id_traloi']	;
								}
?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Teacher</title>
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
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <div class="page">
    <!-- Main Navbar-->
    <header class="header z-index-50">
      
    </header>
    <div class="page-content d-flex align-items-stretch">
      <!-- Side Navbar -->
      <nav class="side-navbar z-index-40">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center py-4 px-3"><img
          class="avatar shadow-0 img-fluid rounded-circle" src="img/Logo_IUH.png" alt="...">
          <div class="ms-3 title">
            <h1 class="h4 mb-2"><?php echo $_SESSION['tennguoidung'] ?></h1>
            <p class="text-sm text-gray-500 fw-light mb-0 lh-1">Giảng viên trường DHCN Tp.HCM</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->               <span
          class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
        <ul class="list-unstyled py-4">
          <li class="sidebar-item active"><a class="sidebar-link" href="homegiangvien.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#real-estate-1"> </use>
              </svg>Trang chủ</a></li>  
          <li class="sidebar-item"><a class="sidebar-link" href="thongtingiangvien.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#sales-up-1"> </use>
            </svg>Hồ sơ</a>
        </li>
             <li class="sidebar-item"><a class="sidebar-link" href="ThongTinLHPGV.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg>Môn học </a>
        </li>
          <li class="sidebar-item"><a class="sidebar-link" href="thaoluan.php" >
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#survey-1"> </use>
            </svg>Thảo luận</a>
          
        </li>
          <li class="sidebar-item"><a class="sidebar-link" href="../login.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#disable-1"> </use>
              </svg>Login page </a></li>
      </nav>
      <div class="content-inner w-100">
        <!-- Page Header-->
        <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Hệ thống quản lý học tập LMS</h2>
          </div>
        </header>
        <!-- Breadcrumb-->
        <div class="bg-white">
          <div class="container-fluid">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 py-3">
                <li class="breadcrumb-item"><a class="fw-light" href="homegiangvien.php">Trang chủ</a></li>
                <li class="breadcrumb-item active fw-light" aria-current="page">Thảo luận </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- Forms Section-->
        <section class="forms">
          <div class="container-fluid">
            <div class="row">
              
              <!-- Tạo lớp học phần ở đây -->
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-close">
                      <div class="dropdown">
                        <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown"
                          aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a
                            class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a
                            class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                      </div>
                    </div>
                    <h3 class="h4 mb-0">Thảo luận</h3>
                  </div>
                  <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="myfm">
                      <div class="row">
                        <label class="col-sm-3 form-label">Tên người dùng</label>
                        <div class="col-sm-9">
                          <input name="tennguoidung" readonly value="<?php echo $_SESSION['phanquyen'] .'-'.$_SESSION['tennguoidung']; ?>" class="form-control" type="text">
                        </div>
                      </div>
                  
                      <div class="border-bottom my-5 border-gray-200"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Nội dung</label>
                        <div class="col-sm-9">
                          <textarea id="noidung"class="form-control" name="noidung" rows="5" maxlength ="450"><?php
						  	if($id_binhluan!=0)
							{
								echo $p->laycot("SELECT binhluan FROM thaoluan WHERE id_binhluan='$id_binhluan'");
							}
							 
						  ?>
                          <?php
						  	if($id_traloi!=0)
							{
						 		 echo trim($p->laycot("SELECT noidung FROM traloi WHERE id_traloi=$id_traloi;"));
							}
					
						  ?></textarea>
                          
                          

                        </div>
                      </div>
                      
                      
               
                      <div class="border-bottom my-5 border-gray-200"></div>
                      <div class="row">
                        <div class="col-sm-9 ms-auto">
            
                          <input name="nut" type="submit" class="btn btn-primary" id="nut" value="Thêm">
                           <input name="nut" type="submit" class="btn btn-primary" id="nuttraloi" value="Trả lời">
                           <input name="nut" type="submit" class="btn btn-red" id="nutxoa" value="Xóa bình luận">
                        </div>	
                      </div>

                      
					 <?php
                        if(isset($_POST['nut'])){
                        switch($_POST['nut'])
                        {
							
                            case'Thêm':
                            {
								$tennguoidung=$_REQUEST['tennguoidung'];
								$id_nguoidung=$_SESSION['id'];
								$noidung=$_REQUEST['noidung'];
								$noidung = strip_tags( addslashes( $noidung ));
    							$noidung = htmlspecialchars( $noidung );
								$tennguoidung = preg_replace( '/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i', '', $tennguoidung );
							
								
								

								if($tennguoidung &&  $noidung !='' )
								{
									if($p->themxoasua("INSERT INTO thaoluan ( ten_binhluan, binhluan,id_taikhoan) VALUES ( '$tennguoidung', '$noidung','$id_nguoidung');")==1)
									{
										
										
										echo 'bình luận thành công' ;
										echo' <script language="javascript"> window.alert("Thêm bình luận thành công"); </script>';
										echo '<script language="javascript">
																		window.location="thaoluan.php";
																		
																		</script>';
										
										
									}
									else
									{
										
										echo'<span class="error" style="color:red;"> Bình luận không thành công.</span>';
									}
									
								}
								else
								{
									echo'<span class="error" style="color:red;"> Vui lòng nhập nội dung.</span>';
								}
								
								
								
								   
								   
                            }break;
							case'Trả lời':
							{
								
								$tennguoidung=$_REQUEST['tennguoidung'];
								$id_nguoidung=$_SESSION['id'];
								$noidung=$_REQUEST['noidung'];
								$noidung = strip_tags( addslashes( $noidung ));
    							$noidung = htmlspecialchars( $noidung );
								$noidung=trim($noidung);
								$tennguoidung = preg_replace( '/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i', '', $tennguoidung );
								
																		
									if($id_binhluan &&  $noidung !='' )
									{
										if($p->themxoasua("INSERT INTO traloi ( noidung, id_giangvien, id_binhluan) VALUES ( '$noidung', '$id_nguoidung', '$id_binhluan');")==1)
										{
											
										echo 'bình luận thành công' ;
										echo' <script language="javascript"> window.alert("Trả lời thành công"); </script>';
										echo '<script language="javascript">
																		window.location="thaoluan.php";
																		
																		</script>';
										}
										else
										{
											
											echo'<span class="error" style="color:red;"> Trả lời không thành công.</span>';
										}
									
									}
									else
										{
											echo'<span class="error" style="color:red;"> Vui lòng nhập nội dung.</span>';
										}
									
									
							
								
																
								break;
							}
							case'Xóa bình luận':
							{
								$noidung=$_REQUEST['noidung'];
								if($id_binhluan &&  $noidung !='' )
								{
									if($p->themxoasua("DELETE FROM thaoluan WHERE id_binhluan = '$id_binhluan'")==1)
									{
										echo' <script language="javascript"> window.alert("Xóa bình luận thành công"); </script>';
										echo '<script language="javascript">window.location="thaoluan.php";	</script>';
										
									}
									else
									{
										echo' <script language="javascript"> window.alert("Xóa bình luận không thành công"); </script>';
									}
									
								}
								else
								{
									echo'<span class="error" style="color:red;"> Vui lòng chọn bình luận cần xóa</span>';
									
								}
								break;
								
								
							}

							
							

                           
                        }
						}
                     
						
                        ?>
                    </form>
                   <div>
                   
                   <?php
				   
				   	$p->load_thaoluan('select * from thaoluan ');
				   ?>
                   
                   </div>
                    
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
          
        </section>
        
        
        
        
        
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs" id="footer">
          <div class="container-fluid">
            <div class="row gy-2">
              <div class="col-sm-6 text-sm-start">
                <p class="mb-0">Vũ Lê Tự Lương - 19476841</p>
                <p class="mb-0">Nguyễn Thế Bảo - 19471171</p>
              </div>
              <div class="col-sm-6 text-sm-end">
                <p class="mb-0"><a href="https://bootstrapious.com/p/admin-template"
                    class="text-white text-decoration-none"></a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/just-validate/js/just-validate.min.js"></script>
  <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>

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
      ajax.onload = function (e) {
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
</body>

</html>