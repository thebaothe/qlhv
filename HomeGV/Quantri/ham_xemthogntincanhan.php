<?php
class login2
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
	
	
	
    
public function load_ds_taikhoan($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			$dem=0;
			echo'
						  <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Số thứ tự</th>
                                                        <th>Tên tài khoản</th>
														
                                              
                                                        <th>Phân quyền</th>
                                                        <th>Tên người dùng</th>
                                                       
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id_taikhoan=$row['id_taikhoan'];
				$username=$row['username'];
				$password=$row['password'];
				$phanquyen=$row['phanquyen'];
				$tennguoidung=$row['tennguoidung'];
				$dem++;
				echo'
						  <tr>
                                                        <th scope="row"><a href="?id='.$id_taikhoan.'">'.$dem.'</a></th>
														
                                                        <td><a href="?id='.$id_taikhoan.'">'.$username.'</a</td>
														
                                                        <td><a href="?id='.$id_taikhoan.'">'.$phanquyen.'</a></td>
                                                        <td><a href="?id='.$id_taikhoan.'">'.$tennguoidung.'</a></td>
                                                        
                                                    	
                                                        
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
	
	public function load_dssinhvien($sql)
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
                                                        <th>Họ và tên sinh viên</th>
														<th>Địa chỉ</th>
                                              
                                                        <th>Email</th>
                                                        <th>Lớp</th>
														
                                                       
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id_sinhvien=$row['id_sinhvien'];
				$id_sinhvien=$row['id_sinhvien'];
				$hoten=$row['hoten'];
				$diachi=$row['diachi'];
				$email=$row['email'];
				$lop=$row['lop'];
				
				$id_taikhoan=$row['id_taikhoan'];
				echo'
						  <tr>
                                                        <th scope="row"><a href="?id='.$id_sinhvien.'">'.$id_sinhvien.'</a></th>
                                                        <td><a href="?id='.$id_sinhvien.'">'.$hoten.'</a</td>
														 <td><a href="?id='.$id_sinhvien.'">'.$diachi.'</a</td>
                                                        <td><a href="?id='.$id_sinhvien.'">'.$email.'</a></td>
														<td><a href="?id='.$id_sinhvien.'">'.$lop.'</a></td>
                                                        
                                                        
                                                    	
                                                        
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
	
	
	   
	
	public function load_ds_lhp($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			$dem=0;
			echo'        <table class="table mb-0">
                        <thead>
                          <tr>
                            <th>Tên môn học</th>
                            <th>Mã môn học</th>
                            <th>Thời gian học</th>
							 <th>Năm học</th>
                          </tr>
						  </thead>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$dem++;
				$id=$row['id_monhoc'];
				$tenlhp=$row['tenmh'];
				$time=$row['thoigianhoc'];
				$namhoc=$row['namhoc'];
				
				
				echo'<tbody>
                          <tr>
                            <th scope="row">'.$tenlhp.'</th>
                            <td>'.$id.'</td>
                            <td>'.$time.'</td>
							  <td>'.$namhoc.'</td>
							
                           
                            
                          </tr>

                        </tbody> ';
				
			}
			echo'</table>';
		}
		else
		{
			echo'Không có dữ liệu.';
		}
	}
	
	
	public function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysqli_query($link,$sql))
		{
			return 1;
		}
		else
		{
			return 0;
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
	
	public function uploadfile($name,$tmp_name,$folder)
	{
		if($name!=''&& $tmp_name!='' && $folder!='')
		{
			$newname=$folder."/".$name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
	
	
}
	
?>