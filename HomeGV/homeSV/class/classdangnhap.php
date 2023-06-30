<?php

class login
{
	private function connect()
	{
		$con=mysqli_connect("localhost","root","","qlhv");
		if(!$con)
		{
			echo'Khong ket noi du lieu';
			exit();
		}
		else
		{
			
			mysqli_set_charset($con,"utf8");
			return $con;
		}
	}
	function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysqli_query($link, $sql))
		{
			return 1;
		}
		else
		{
			return 0;
		}		
	}

	public function load_lophocphan($sql)
	{
		$link= $this->connect(); 
		$ketqua=mysqli_query($link, $sql);
		@mysqli_close($link);
		 $i=mysqli_num_rows ($ketqua);
		  if ($i>0)
		  {
			  echo'<table width="1200" border="1" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="321" align="center"><strong>MÃ LỚP HỌC PHẦN</strong></td>
							<td width="321" align="center"><strong>TÊN LỚP HỌC PHẦN</strong></td>
							<td width="100" align="center"><strong>THỜI GIAN HỌC</strong></td>
							<td width="359" align="center"><strong>TÊN PHÒNG HỌC</strong></td>
							<td width="359" align="center"><strong>NĂM HỌC</strong></td>
							<td width="359" align="center"><strong>THỜI GIAN</strong></td>
							<td width="52" align="center"><strong>MÃ GIÁO VIÊN</strong></td>
						  </tr>';
				$dem=1;
			while ($row = mysqli_fetch_array($ketqua))
			{	
				$dem=$dem++;
				
				$stt=$dem;
				$malhp=$row['maLHP'];
				$tenlhp=$row['tenLHP'];
				$thoigianhoc=$row['Thoigianhoc']; 
				$tenphonghoc=$row['Tenphonghoc'];
				$namhoc=$row['Namhoc'];
				$thoigian=$row['Thoigian'];
				$magv=$row['maGv'];
				echo' </tr>
						  <td align="center"align="miđle">'.$dem.'</td>
						  <td align="left" align="middle">'.$malhp.'</td>
						  <td align="left" align="middle">'.$tenlhp.'</td>
						  <td align="center" align="middle">'.$thoigianhoc.'</td>
						  <td align="center" align="middle">'.$tenphonghoc.'</td> 
						  <td align="center" align="middle">'.$namhoc.'</td>
						  <td align="center" align="middle">'.$thoigian.'</td>
						  <td align="center" align="middle">'.$magv.'</td>
						  </tr>';
						  
				$dem++;
				
			}
			
			echo'</table>';
		  }
			else
			{
				echo 'Đang cập nhật dữ liệu...';
			
			}
		 }
		 public function loadsanpham($sql)
		 {
			 $link=$this->connect();
			 $ketqua = mysqli_query($link,$sql);
			 @mysqli_close($link);
			 $i=mysqli_num_rows($ketqua);
			 if($i>0)
			 {
				 while($row=mysqli_fetch_array($ketqua))
				 {
					 $malhp=$row['maLHP'];
					 $tenlhp=$row['tenLHP'];
					 
					 
					 echo '
					 
		                        <div class="noiBat_item itemsp1 ">
                                <div class="img-container">
                                <img src="img/Logo_IUH.png" width="100%">
                                </div>
                                <div class="detailsp">
                                <p class="detailsp_tensp"><a id="sp1">'.$tenlhp.'</a> </p>
                                </div>
                            </div>
					 
						 ';	
				 }
			 }
			 else
			 {
				 echo 'Không có dữ liệu';	
			 }
			 
		 }
		
		 
		
	public function laycot($sql)
	{
		$link=$this->connect(); //gọi lại kết nối
		$ketqua=mysqli_query($link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua); 
		$giatri='';
		if($i>0)
		{
			
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['0'];
				$giatri=$id;
			}
		}
		return $giatri;
		
	}
	public function load_ds_hdnkdadk($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo' <table class="table mb-0">
                        <thead>
                          <tr>
                            <th>Mã số HĐNK</th>
                            <th>Tên HĐNK</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                          </tr>
                        </thead>
                        <tbody>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['maHDNK'];
				$ten=$row['tenHDNK'];
				$idsv=$row['idSV'];
				$tensv=$row['tenSV'];
				
				echo' 
						  <tr>
                            <th scope="row"><a href="?id='.$id.'">'.$id.'</a></th>
                            <td><a href="?id='.$id.'">'.$ten.'</a></td>
                            <td><a href="?id='.$id.'">'.$idsv.'</a></td>
                            <td><a href="?id='.$id.'">'.$tensv.'</a></td>
                          </tr>';
				
			}
			echo'
			</tbody>
			</table>';
		}
		else
		{
			echo'<br />
				chưa đăng kí hoạt động';
		}
	}
	public function load_ds_sinhvien($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'
						  <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Mã sinh viên</th>
                                                        <th>Tên sinh viên</th>
														<th>Địa chỉ</th>
                                              
                                                        <th>Email</th>
                                                        <th>Lớp</th>
                                                       
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_sinhvien'];
				$tensv=$row['hoten'];
				$diachi=$row['diachi'];
				$email=$row['email'];
				$tenlhp=$row['lop'];
				echo'
						  <tr>
                                                        <th scope="row">'.$id.'	</th>
                                                        <td>'.$tensv.'</td>
														 <td>'.$diachi.'</td>
                                                        <td>'.$email.'</td>
                                                        <td>'.$tenlhp.'</td>
                                                        
                                                    	
                                                        
                                                    </tr>';		
			}
			echo'
			</tbody>
			</table>';
		}
		else
		{
			echo'Không có dữ liệu.';
		}
	}
	
	public function load_ds_giangvien($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'
						  <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Mã giảng viên</th>
                                                        <th>Tên giảng viên viên</th>
														<th>Địa chỉ</th>
                                              
                                                        <th>Email</th>
                                                      
                                                       
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_giangvien'];
				$tengv=$row['hoten'];
				$diachi=$row['diachi'];
				$email=$row['email'];
				echo'
						  <tr>
                                                        <th scope="row"><a href="?id='.$id.'">'.$id.'</a></th>
                                                        <td><a href="?id='.$id.'">'.$tengv.'</a</td>
														 <td><a href="?id='.$id.'">'.$diachi.'</a</td>
                                                        <td><a href="?id='.$id.'">'.$email.'</a></td>
                                                  
                                                    	
                                                        
                                                    </tr>';		
			}
			echo'
			</tbody>
			</table>';
		}
		else
		{
			echo'Không có dữ liệu.';
		}
	}
	
	
	
	public function load_hdnkdanop($sql)
		 {
			 $link=$this->connect();
			 $ketqua = mysqli_query($link,$sql);
			 mysqli_close($link);
			 $i=mysqli_num_rows($ketqua);
			 if($i>0)
			 {
				 while($row=mysqli_fetch_array($ketqua))
				 {
					 $mahdnk=$row['maHDNK'];
					 $tenhdnk=$row['tenFileBC'];
					 $tenhinh=$row['noiDung'];
					 
			 
					echo'<div class="card mb-3">
              <div class="card-body p-3">
                <div class="row align-items-center gx-lg-5 gy-3">
                  <div class="col-lg-6 border-lg-end">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center"><img class="img-fluid shadow-sm" src="folder/'.$tenhinh.'" alt="..." width="50">
                        <div class="ms-3">
                          <h3 class="h4 text-gray-700 mb-0">Hoạt động '.$mahdnk.'</h3><small class="text-gray-500">'.$tenhdnk.'
                            </small>
                        </div>
                      </div><span class="text-sm text-gray-600 d-none d-sm-block">Today at 4:24 AM</span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex align-items-center">
                      <p class="d-flex mb-0 text-gray-600 text-sm d-flex align-items-center flex-shrink-0"><i
                          class="far fa-clock me-1"></i>12:00 PM</p>
                      <p class="d-flex mb-0 mx-3 text-gray-600 text-sm d-flex align-items-center flex-shrink-0"><i
                          class="far fa-comment me-1"></i>20</p>
                      <div class="progress w-100" style="height: 5px; max-width: 15rem">
                        <div class="progress-bar bg-red" role="progressbar" style="width: 45%; height: 6px;"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>';		
				 }
			 }
			 else
			 {
				echo'khong co dư lieu'; 
			}
		}
	
		 
}
?>