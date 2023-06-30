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
                                                        <th>Lớp học phần</th>
                                                       
                                                        
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
                                                        <th scope="row"><a href="?id='.$id.'">'.$id.'</a></th>
                                                        <td><a href="?id='.$id.'">'.$tensv.'</a</td>
														 <td><a href="?id='.$id.'">'.$diachi.'</a</td>
                                                        <td><a href="?id='.$id.'">'.$email.'</a></td>
                                                        <td><a href="?id='.$id.'">'.$tenlhp.'</a></td>
                                                        
                                                    	
                                                        
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
                                                        <th>Họ tên giảng viên </th>
														<th>Địa chỉ</th>
														<th>Số điện thoại</th>
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
				$sdt=$row['sdt'];
				$email=$row['email'];
				$id_taikhoan=$row['id_taikhoan'];
				
				echo'
						  <tr>
                                                        <th scope="row"><a href="?id='.$id.'">'.$id.'</a></th>
                                                        <td><a href="?id='.$id.'">'.$tengv.'</a</td>
														 <td><a href="?id='.$id.'">'.$diachi.'</a</td>
														 <td><a href="?id='.$id.'">'.$sdt.'</a</td>
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
	public function uploadfile($name,$tmp_name,$folder)
	{
		if($name!=''&& $tmp_name!='' && $folder!='')
		{
			$newname=$folder."/".$name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}
			return 0;

		}

	}
		public function load_ds_monhoc($sql)
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
                                                        <th >Mã môn học</th>
                                                        <th>Tên môn học</th>
														<th>thời gian học</th>
														<th> Năm học </th>
                                                     
                                                    </tr>
                                                </thead>
                                                <tbody>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_monhoc'];
				$tenmh=$row['tenmh'];
				$thoigian=$row['thoigianhoc'];
				$namhoc=$row['namhoc'];
				
				
				echo'
						  <tr>
                                              			<th  scope="row"><a href="?id='.$id.'">'.$id.'</a></th>
                                                        <td><a href="?id='.$id.'">'.$tenmh.'</a</td>
														<td><a href="?id='.$id.'">'.$thoigian.'</a</td>
														<td><a href="?id='.$id.'">'.$namhoc.'</a</td>
                                                        
                                                  
                                                    	
                                                        
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
	
	public function load_ds_giangvien_selectd($sql)
	{
		
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<select name="id_giangvien" id="id_giangvien" class="form-select">
                     <option value="0">Danh sách giảng viên</option>';
			
					 
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_giangvien'];
				$id=$this->encrypt($id,'key123');
				$tennguoidung=$row['hoten'];
				echo'<option value=" '.$id.' " >'.$tennguoidung.'</option>
                         ';
						 
				
			}	
			echo'</select>';
		}
		
		
	}
		public function load_ds_sinhvien_selectd($sql)
	{
		
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<select name="id_sinhvien" id="id_sinhvien" class="form-select">
                     <option value="0">Danh sách sinh viên</option>';
			
					 
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_sinhvien'];
				$id=$this->encrypt($id,'key123');
				$tennguoidung=$row['hoten'];
				echo'<option value=" '.$id.' " >'.$tennguoidung.'</option>
                         ';
						 
				
			}	
			echo'</select>';
		}
		
		
	}
	public function load_ds_monhoc_selectd($sql)
	{
		
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<select name="id_monhoc" id="id_monhoc" class="form-select">
                     <option value="0">Danh sách môn học</option>';
			
					 
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_monhoc'];
				$id=$this->encrypt($id,'key123');
				$tenmonhoc=$row['tenmh'];
				echo'<option value=" '.$id.' " >'.$tenmonhoc.'</option>
                         ';
						 
				
			}	
			echo'</select>';
		}
	
	
	
	

	
		 
	}
	public function load_ds_lhp_selectd($sql)
	{
		
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<select name="id_lophocphan" id="id_lophocphan" class="form-select">
                     <option value="0">Danh sách lớp học phần</option>';
			
					 
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id'];
				$id1=$this->encrypt($id,'key123');
				$tenmonhoc=$row['tenmh'];
				echo'<option value=" '.$id1.' " >'.$id.'-'.$tenmonhoc.'</option>
                         ';
						 
				
			}	
			echo'</select>';
		}
	
	
	
	

	
		 
	}

	public function load_ds_phancong($sql)
	{
		$link=$this->connect(); //gọi lại kết nối
		$ketqua=mysqli_query($link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<table class="table mb-0">
                        <thead>
                          <tr>
                            <th>Mã lớp học phần</th>
                            <th>Tên giảng viên</th>
							<th>Tên môn học</th>
                         
                          </tr>
                        </thead>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id'];
				$tengv=$row['hoten'];
				$tenmonhoc=$row['tenmh'];
				
				echo '<tbody>
                          <tr>
                            <td >'.$id.'</td>
                            <td>'.$tengv.'</td>

                            <td>'.$tenmonhoc.'</td>
                          </tr>

                        </tbody>';
			}
			echo' </table>';
		}
		else
		{
			echo'Khong co du lieu';
		}
	}
	public function load_ds_phancongsv($sql)
	{
		$link=$this->connect(); //gọi lại kết nối
		$ketqua=mysqli_query($link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<table class="table mb-0">
                        <thead>
                          <tr>
						  	<th>Mã lớp học phần </th>
							<th>Tên môn học</th>
							<th>Danh sách sinh viên</th>
                          </tr>
                        </thead>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$tensv=$row['hoten'];
				$tenmonhoc=$row['tenmh'];
				$id=$row['id'];
				
				echo '<tbody>
                          <tr>
						   <td>'.$id.'</td>
                           <td>'.$tenmonhoc.'</td>
						   <td><a href="phancongsinhvien.php?id='.$id.'"><input name="nut" type="submit"  class="btn btn-primary" id="nut" value="Xem"> </a></td>
                          </tr>

                        </tbody>';
			}
			echo' </table>';
		}
		else
		{
			echo'Khong co du lieu';
		}
	}
	
	
		public function load_ds_sinhvien1($sql)
	{
		$link=$this->connect(); //gọi lại kết nối
		$ketqua=mysqli_query($link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<table class="table mb-0">
                        <thead>
                          <tr>
						  	<th>Mã lớp học phần </th>
							<th>Tên sinh viên</th>
							
                          </tr>
                        </thead>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$tensv=$row['hoten'];
				
				$id=$row['id'];
				
				echo '<tbody>
                          <tr>
						   <td>'.$id.'</td>
                           <td>'.$tensv.'</td>
						   
                          </tr>

                        </tbody>';
			}
			echo' </table>';
		}
		else
		{
			echo'Khong co du lieu';
		}
	}
	
	function encrypt($plaintext, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    $ciphertext = base64_encode($iv.$hmac.$ciphertext_raw);
    return $ciphertext;
}

function decrypt($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $c = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
    }
    return false;
}

function thongbao($thongdiep,$link)
{
	echo'<script language="javascript">window.alert("'.$thongdiep.'");</script>';
																	
	echo '<script language="javascript">window.location="'.$link.'";</script>';
	

}
function thongbao1($thongdiep)
{
	echo'<script language="javascript">window.alert("'.$thongdiep.'");</script>';
																	

	

}

	}
?>