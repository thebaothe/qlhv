<?php
		session_start();
		include('class/classdangnhap.php');
		$p=new login();
		
		
		if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass'])&&isset($_SESSION['tennguoidung'])&& isset($_SESSION['phanquyen']) && $_SESSION['phanquyen']='người quản trị' )
		{
			include('ham_dangnhap.php');
			$q=new login1();
			if($q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['tennguoidung'],$_SESSION['phanquyen'])==1 && $_SESSION['phanquyen']='người quản trị')
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
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
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
          class="avatar shadow-0 img-fluid rounded-circle" src="Quantri/img/Logo_IUH.png" alt="...">
          <div class="ms-3 title">
            <h1 class="h4 mb-2"><?php echo $_SESSION['tennguoidung']; ?></h1>
            <p class="text-sm text-gray-500 fw-light mb-0 lh-1">Quản trị hệ thống</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span
          class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
        <ul class="list-unstyled py-4">
          <li class="sidebar-item active"><a class="sidebar-link" href="homequantri.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#real-estate-1"> </use>
              </svg>Trang chủ</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdownm" data-bs-toggle="collapse">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#browser-window-1"> </use>
              </svg>Quản lý tài khoản</a>
            <ul class="collapse list-unstyled " id="exampledropdownDropdownm">
              <li><a class="sidebar-link" href="taotaikhoan.php">Thêm tài khoản</a></li>
              <li><a class="sidebar-link" href="xoataikhoan.php">Xóa tài khoản</a></li>
              <li><a class="sidebar-link" href="xoataikhoan.php">Sửa tài khoản</a></li>
            </ul>
          </li>

          <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdow" data-bs-toggle="collapse">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#sales-up-1"> </use>
            </svg>Quản lý sinh viên</a>
          <ul class="collapse list-unstyled " id="exampledropdownDropdow">
            <li><a class="sidebar-link" href="themsinhvien.php">Thêm sinh viên</a></li>
            <li><a class="sidebar-link" href="xoasinhvien.php">Xóa sinh viên</a></li>
            <li><a class="sidebar-link" href="xoasinhvien.php">Sửa thông tin sinh viên</a></li>
            <li><a class="sidebar-link" href="phancongsinhvien.php">Phân công sinh viên</a></li>
          </ul>
        </li>
          
          <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg>Quản lý giảng viên </a>
            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
              <li><a class="sidebar-link" href="themgiangvien.php">Thêm giảng viên</a></li>
              <li><a class="sidebar-link" href="xoagiangvien.php">Xóa giảng viên</a></li>
              <li><a class="sidebar-link" href="xoagiangvien.php">Sửa thông tin giảng viên</a></li>
               <li><a class="sidebar-link" href="phanconggiangvien.php">Phân công giảng viên</a></li>
            </ul>
          </li>
          <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdownmm" data-bs-toggle="collapse">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#survey-1"> </use>
            </svg>Quản lý môn học</a>
          <ul class="collapse list-unstyled " id="exampledropdownDropdownmm">
            <li><a class="sidebar-link" href="themmonhoc.php">Thêm môn học</a></li>
            <li><a class="sidebar-link" href="xoamonhoc.php">Xóa môn học </a></li>
            <li><a class="sidebar-link" href="xoamonhoc.php">Thêm môn học </a></li>
          </ul>
        </li>
          <li class="sidebar-item"><a class="sidebar-link" href="login.php">
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
                <li class="breadcrumb-item"><a class="fw-light" href="homequantri.php">Trang chủ</a></li>
                <li class="breadcrumb-item active fw-light" aria-current="page">Thêm tài khoản</li>
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
                    <h3 class="h4 mb-0">Tạo tài khoản cho người dùng</h3>
                  </div>
                  <div class="card-body">
                 
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="myfm">
                  
                  
                      
                      <div class="row">
                        <label class="col-sm-3 form-label">Chọn file tài khoản</label>
                        <div class="col-sm-9">
                          <input name="file" type="file" class="form-control" id="file">
                        </div>
                      </div>
               
                      <div class="border-bottom my-5 border-gray-200"></div>
                      <div class="row">
                        <div class="col-sm-9 ms-auto">
            
                          <input name="nut" type="submit" class="btn btn-primary" id="nut" value="Thêm">
                        </div>
                      </div>
                     <?php
					
                        if(isset($_POST['nut']))
                        switch($_POST['nut'])
                        {
                            case'Thêm':
                            {
                               
                                
                                								
                                $name=$_FILES['file']['name'];
                                $tmp_name=$_FILES['file']['tmp_name'];
                                $size=$_FILES['file']['size'];
                                $type=$_FILES['file']['type'];
								$allowed_ext = array('xlsx');
								$_uploaded_ext =substr( $name, strrpos( $name, '.' ) + 1); 
								$folder='folder';
								
                                if($name != '' &&($type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') &&  in_array($_uploaded_ext,$allowed_ext))

                                {
									          
                                           if($p->uploadfile($name,$tmp_name,$folder)==1)
                                            {
												
												
												if($q->importDataFromExcelToDatabase($folder.'/'.$name,'taikhoan',2)==1)
												{
													$thongdiep='Import dữ liệu thành công';
													
													$p->thongbao1($thongdiep);
													
												}
												
                                               

													
													


													
						
													
                                                
                                                
                                            }
                                            else
                                            {
                                                
												echo'<span class="error" style="color:red;"> Upload file  thất bại.</span>';
												
                                            }
											
                                }
								else
                                {
                                   
									echo '<span class="error" style="color:red;">Chỉ cho upload file Excel </span>';
									
									
                                }
						
						
						
								   
								   
                            }
							break;
                           
                        }
						
                     
						
                        ?>
					 
                      

                    </form>
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
                <p class="mb-0"> <a href="https://bootstrapious.com/p/admin-template"
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