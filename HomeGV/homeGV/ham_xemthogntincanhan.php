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
	
	public function load_thaoluan($sql)
	{
		
		
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<table class="table mb-0">
						  <tr >
							<td>Tên người dùng</td>
							<td>Nội dung</td>
							<td>Trạng thái</td>
							<td>Xem lại</td>
							</tr>';
							while($row=mysqli_fetch_array($ketqua))
							{
								$id=$row['id_binhluan'];
								$tenbinhluan=$row['ten_binhluan'];
								$noidung=$row['binhluan'];
								$id_taikhoan=$row['id_taikhoan'];
								echo'
								<tr>
									<td>'.$tenbinhluan.'</td>
									<td><a href="?id='.$id.'">'.$noidung.'</a></td>';
									$phanquyen=$this->laycot("SELECT taikhoan.phanquyen FROM taikhoan JOIN thaoluan ON taikhoan.id_taikhoan = thaoluan.id_taikhoan WHERE taikhoan.id_taikhoan= $id_taikhoan");
								if($phanquyen=='sinh viên')
								{
							
									if($this->laycot("SELECT id_binhluan FROM traloi WHERE id_binhluan=$id")==0)
									{

										echo'<td>Chưa trả lời </td>';
										echo'<td> </td>';
										
										
										
										
									}
									else
									{
										$id_traloi=$this->laycot("SELECT id_traloi FROM traloi WHERE id_binhluan = '$id';");
										
										echo'<td>Đã trả lời </td>';
										echo'<td><a href="?id_traloi='.$id_traloi.'"><input name="nut" type="submit" class="btn btn-primary" id="nuttraloi1" value="Xem lại câu trả lời"></a></td>';
									}
								
									
									
								}
								else
								{
									echo'<td></td>';
									echo'<td></td>';
								}

								 echo'</tr>';
									
							}
							echo'</table>';
			
		
		}
		else
		{
			
			echo'không có dữ liệu';
		}
		
	}
	
	
	
	public function load($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($sql, $link);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua); ///chay  ra ket qua hang
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{  
				$id=$row['ID'];
				$tensv=$row['TenSV'];
				$email=$row['Email'];
				$tenlhp=$row['tenLHP'];
				echo '<table width="395" border="1">
						  <tr>
							<td width="203">Tên sinh viên</td>
							<td width="203"><a>'.$tensv.'</a></td>
							</tr>
							 <tr>
								<td>Mã số sinh viên</td>
								<td width="203"><a>'.$id.'</a></td>
							  </tr>
							  <tr>
								<td>Email</td>	
								<td width="203"><a>'.$email.'</a></td>						
							  </tr>
							  <tr>
								<td>Tên lớp học phần</td>
								<td width="203"><a>'.$tenlhp.'</a></td>
							  </tr>';
			}
			echo'</table>';
		}
		else
		{
			echo'Không có dữ liệu';
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
			echo'<table width="600" border="1">
						  <tr >
							<td>Mã số sinh viên</td>
							<td>Tên sinh viên</td>
							<td>Email</td>
							<td>Tên lớp học phần</td>
						  </tr>';
			;
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['ID'];
				$tensv=$row['TenSV'];
				$email=$row['Email'];
				$tenlhp=$row['tenLHP'];
				echo'  <tr>
							<td><a href="?id='.$id.'">'.$id.'</a></td>
							<td><a href="?id='.$id.'">'.$tensv.'</a></td>
							<td><a href="?id='.$id.'">'.$email.'</td>
							<td><a href="?id='.$id.'">'.$tenlhp.'</td>
						  </tr>';		
			}
			echo'</table>';
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
		public function load_ds_lhp_gv($sql)
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
				$key='123';
				$id= $row['id_monhoc'];
				$id_mh=$this->encrypt($id,'123');
				$tenlhp=$row['tenmh'];
				$time=$row['thoigianhoc'];
				$namhoc=$row['namhoc'];
				
				
				echo'<tbody>
                          <tr>
                            <th scope="row"><a href="uploadfile.php?id='.$id_mh.'">'.$tenlhp.'</a></th>
                            <td><a href="uploadfile.php?id='.$id_mh.'">'.$id.'</a></td>
                            <td><a href="uploadfile.php?id='.$id_mh.'">'.$time.'</a></td>
							<td><a href="uploadfile.php?id='.$id_mh.'">'.$namhoc.'</a></td>
							<td><a href="?id='.$id.'"><button name "nut" class="btn btn-warning" type="submit">Danh sách sinh
                                  viên</button></a></td>
                          
							
                           
                            
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
	public function load_ds_id($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				
				$id=$row['id_monhoc'];
				$tenlhp=$row['tenmh'];
				$time=$row['thoigianhoc'];
				$namhoc=$row['namhoc'];
				
			}
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
	public function mylogin($user,$pass)
	{
		$pass=md5($pass);
		$link=$this->connect();
		$sql="select id_tk,username,password from taikhoan where username='$user' and password='$pass' limit 1";
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i==1)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_tk'];
				$username=$row['username'];
				$password=$row['password'];
				session_start();
				$_SESSION['id']=$id;
				$_SESSION['user']=$username;
				$_SESSION['pass']=$password;
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}
	public function confirmlogin($id,$user,$pass)
	{
		$link=$this->connect();
		$sql="select id_tk from taikhoan where id_tk='$id' and username='$user' and password='$pass' limit 1";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1)
		{
			header("location:dangnhap.php");
		}
	}
	
		public function loaddssvlop($sql)
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
                            
                            <th>Mã sinh viên</th>
							<th>Tên sinh viên</th>
							<th>Email</th>
							<th>Lớp</th>
							
                          </tr>
                        </thead>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_sinhvien'];
				$ten=$row['hoten'];
				$email=$row['email'];
				$lop=$row['lop'];
				echo '<tbody>
                          <tr>
                            
                            <td>'.$id.'</td>
							<td>'.$ten.'</td>
							 <td>'.$email.'</td>
							  <td>'.$lop.'</td>
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
	public function load_tt_sv($sql)
	{
		$link=$this->connect(); //gọi lại kết nối
		$ketqua=mysqli_query($link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<table class="table mb-0" style="border:1px solid black;">
                        <thead>
                          <tr>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            <th>Email sinh viên</th>
							<th>Lớp Học Phần</th>
                          </tr>
                        </thead>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['ID'];
				$ten=$row['TenSV'];
				$email=$row['Email'];
				$tenlhp=$row['tenLHP'];
				
				echo '<tbody style="border:1px solid black;">
                          <tr>
                            <th scope="row"><a href="?id='.$id.'">'.$id.'</a></th>
                            <td><a href="?id='.$id.'">'.$ten.'</a></td>
							<td><a href="?id='.$id.'">'.$email.'</a></td>
							<td><a href="?id='.$id.'">'.$tenlhp.'</a></td>
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
	public function loaddanhsachfile($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			echo'<table class="table mb-0">';
			
		
			
			while($row=mysqli_fetch_array($ketqua))
			{
			
				
				$ten_file=$row['name_file'];
				
				
				echo'<tbody>
                          <tr>
                            <th scope="row">'.$ten_file.'</th>
                            <td><a download = "'.$ten_file.'" href="folder/'.$ten_file.'">Tải file</a></td>
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
    if (hash_equals($hmac, $calcmac)){
        return $original_plaintext;
    }
    return false;
}


public function thongbao1($thongdiep,$link)
{
										echo' <script language="javascript"> window.alert("'.$thongdiep.'"); </script>';
										echo '<script language="javascript">window.location="'.$link.'";</script>';																	

										
	
}
public function thongbao($thongdiep)
{
										echo' <script language="javascript"> window.alert("'.$thongdiep.'"); </script>';
																										

										
	
}


	
}
	
?>