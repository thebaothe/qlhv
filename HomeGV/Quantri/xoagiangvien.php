<?php
session_start();
include ("class/classdangnhap.php");
$p=new login();
include("ham_xemthogntincanhan.php");
$a=new login2();
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

$layid=0;
$idsv=$_SESSION['id'];
if(isset($_REQUEST['id']))
{
	$layid=$_REQUEST['id'];
	$idsv=$_SESSION['id'];
	
	
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
                        class="avatar shadow-0 img-fluid rounded-circle" src="img/avatar-1.jpg" alt="...">
                    <div class="ms-3 title">
                        <h1 class="h4 mb-2"><a href="xoataikhoan.php"><?php echo $_SESSION['tennguoidung'] ?></a></h1>
                        <p class="text-sm text-gray-500 fw-light mb-0 lh-1">Quản trị hệ thống</p>
                    </div>
                </div>
                <!-- Sidebar Navidation Menus-->
                <span
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
              <li><a class="sidebar-link" href="phanconggiangvien.php">Phân công viên</a></li>
            </ul>
          </li>
          <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdownmm" data-bs-toggle="collapse">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#survey-1"> </use>
            </svg>Quản lý môn học</a>
          <ul class="collapse list-unstyled " id="exampledropdownDropdownmm">
            <li><a class="sidebar-link" href="themmonhoc.php">Thêm môn học</a></li>
            <li><a class="sidebar-link" href="xoamonhoc.php">Xóa môn học </a></li>
            <li><a class="sidebar-link" href="xoamonhoc.php">Sửa môn học </a></li>
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
                <!-- Danh sách các lớp học phần ở đây-->
                <div class="bg-white">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 py-3">
                                <li class="breadcrumb-item"><a class="fw-light" href="homequantri.php">Trang chủ</a></li>
                                <li class="breadcrumb-item active fw-light" aria-current="page">Xóa sửa giảng viên</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <section class="tables">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="card-close">
                                            <div class="dropdown">
                                                <button class="dropdown-toggle text-sm" type="button" id="closeCard1"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu dropdown-menu-end shadow-sm"
                                                    aria-labelledby="closeCard1"><a
                                                        class="dropdown-item py-1 px-3 remove" href="#"> <i
                                                            class="fas fa-times"></i>Close</a><a
                                                        class="dropdown-item py-1 px-3 edit" href="#"> <i
                                                            class="fas fa-cog"></i>Edit</a></div>
                                            </div>
                                        </div>
                                        <h3 class="h4 mb-0">Thông tin giảng viên</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                     
                                            <?php 
											
											
											
												$p->load_ds_giangvien("select * from giangvien  ");
											
											
												
											?>
                                            <div class="border-bottom my-5 border-gray-200"></div>
										<h4 class="h4 mb-0">Chọn hoặc nhập vào tài khoản cần xóa </h4>
										<form action="" method="POST">
                                        <?php
				  
				  					
							// Định nghĩa biến 
							$hotengiangvienerr = $diachigverr = $sodienthoaierr = $emailgverr= "";
							$hotengiangvien = $diachigv = $sodienthoai =$emailgv= "";
							 
							//Input fields validation
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
							 
							//Validate tên 
								if (empty($_REQUEST["hotengiangvien"]))
								{
									$hotengiangvienerr = "Bạn chưa nhập họ tên";
								}
								
								
								else 
								{
									$hotengiangvien =$q-> input_data($_REQUEST["hotengiangvien"]);
									// Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
									if (!preg_match("/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+){4,16}$/",$hotengiangvien))
									{
										$hotengiangvienerr = "Họ tên giảng viên không hợp lệ";
									}
								}
								
								
								
								//Validate địa chỉ 
								if (empty($_REQUEST["diachigv"]))
								{
									$diachigverr = "Bạn chưa nhập địa chỉ";
								} 
								else
								{
									$diachigv = $q->input_data($_REQUEST["diachigv"]);
									// Kiểm tra xem số điện thoại đã đúng định dạng hay chưa 
									if (!preg_match ("/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+){4,16}$/", $diachigv) )
									{
										$diachigverr = "Địa chỉ không hợp lệ";
									}
									
								}
								//Validate email
								if (empty($_REQUEST["sodienthoai"])) 
								{
									$sodienthoaierr = "Bạn chưa nhập số điện thoại";
								}
								else
								{
									$sodienthoai=$q-> input_data($_REQUEST["sodienthoai"]);
									if(!preg_match("/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/",$sodienthoai))
									{
										
										$sodienthoaierr='Số điện thoại không hợp lệ';
									}
								}
								if (empty($_REQUEST["emailgv"])) 
								{
									$emailgverr = "Bạn chưa nhập Email";
								}
								else
								{
									$emailgv=$q-> input_data($_REQUEST["emailgv"]);
									if(!preg_match("/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/",$emailgv))
									{
										
										$loperr='Email không hợp lệ';
									}
								}
							}

						?> 
											<div class="card-body">
												<div class="table-responsive">
													<table class="table mb-0">
														<thead>
															<tr>
																<td>Mã giảng viên</td>
																<td>Họ tên giảng viên</td>
																<td>Địa chỉ</td>
                                                                <td>Số điện thoại</td>
																<td>Email</td>
                                                                
															</tr>
														</thead>
														<tbody>
															<tr>
																<th scope="row"><input name="id_giangvien" type="text" id="id_giangvien" readonly value="<?php echo $a->laycot("SELECT id_giangvien from giangvien WHERE id_giangvien='$layid' limit 1"); ?>" /></th>
																<td><input name="hotengiangvien" type="text" id="hotengiangvien" value="<?php echo $a->laycot("SELECT hoten  from giangvien WHERE id_giangvien='$layid' limit 1"); ?>" /><span class="error" style="color:red;">* <?php  echo $hotengiangvienerr; ?> </span>
</td>
																<td><input name="diachi" type="text" id="diachi" value="<?php echo $a->laycot("SELECT diachi  from giangvien WHERE id_giangvien='$layid' limit 1"); ?>" /><span class="error" style="color:red;">* <?php  echo $diachigverr; ?> </span></td>
																<td><input name="sdt" type="text" id="sdt" value="<?php echo $a->laycot("SELECT sdt  from giangvien WHERE id_giangvien='$layid' limit 1"); ?>" /><span class="error" style="color:red;">* <?php  echo $sodienthoaierr; ?> </span></td>
                                                                <td><input name="email" type="text" id="email" value="<?php echo $a->laycot("SELECT email  from giangvien WHERE id_giangvien='$layid' limit 1"); ?>" /><span class="error" style="color:red;">* <?php  echo $emailgverr; ?> </span></td>
                                                                <td><input name="id_taikhoan" type="text" hidden=""  id="id_taikhoan" value="<?php echo $a->laycot("SELECT id_taikhoan  from giangvien WHERE id_giangvien='$layid' limit  1"); ?>" /></td>
															</tr>

														</tbody>
													</table>

												</div>
											</div>
                                           
											<div class="row">
												<div class="col-sm-9 ms-auto">
                                                

													<input class="btn btn-secondary" style="padding-left:15px;" type="submit" name="nut" id="nut" value="Xóa" />
													<input class="btn btn-success" style="padding-left:15px;" type="submit" name="nut" id="nut" value="Sửa" />

												</div>
											</div>
                                            				<?php
											if (isset($_POST['nut']))
											switch ($_POST['nut']) {
												case 'Xóa'; {
														$idxoa = $_REQUEST['id_giangvien'];
														if ($idxoa > 0) {
															if ($p->themxoasua("delete from giangvien where id_giangvien=$idxoa limit 1") == 1) {
																echo ' xóa giảng viên thành công. ';
																echo' <script language="javascript"> window.alert("Xóa thành công");</script>';
																echo '<script language="javascript">
																		window.location="xoagiangvien.php";
																		</script>';

															} else {
																echo 'Thất bại.';
															}
														} else {
															echo ' Vui lòng chọn hoặc nhập thông tin trước khi xóa.';
														}
														break;
													}
													case'Sửa';
												{
													
													$hotengiangvien=$_REQUEST['hotengiangvien'];
													$diachi=$_REQUEST['diachi'];
													$sdt=$_REQUEST['sdt'];
													$email=$_REQUEST['email'];
													
													
													$idsua=$_REQUEST ['id_giangvien'];
													if($idsua >0)
													{
														
															if($hotengiangvienerr=='' && $diachigverr=='' && $sodienthoaierr=='' && $emailgverr  =='')
															{
																if($p->themxoasua("UPDATE giangvien SET hoten = '$hotengiangvien', diachi = '$diachi',sdt = '$sdt', email='$email'  WHERE id_giangvien = $idsua limit 1;")==1)
																{
																	
																	echo'<script language="javascript">
																	 		window.alert("Sửa thành công");
																	 	</script>';
																	
																	echo '<script language="javascript">
																			window.location="xoagiangvien.php";
																		</script>';
																		
																	
																}
																else
																{
																	echo'sửa không thành công';
																	 
																}
																
															}
															else
															{
																
																echo'Vui lòng nhập đầy đủ thông tin';
															}
													}
													else
													{
														echo' vui lòng chọn thông tin cần sửa';	
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
                    
                </section>
                
       
                <!-- Page Footer-->
                <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs"
                    id="footer">
                    <div class="container-fluid">
                        <div class="row gy-2">
                            <div class="col-sm-6 text-sm-start">
                                <p class="mb-0">Vũ Lê Tự Lương - 19476841</p>
                 				<p class="mb-0">Nguyễn Thế Bảo - 19471171</p>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <p class="mb-0">  <a href="https://bootstrapious.com/p/admin-template"
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