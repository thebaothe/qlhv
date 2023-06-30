<?php
error_reporting(0);
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
							<td>Nội dung</td>
							
							</tr>';
							while($row=mysqli_fetch_array($ketqua))
							{
								$id=$row['id_binhluan'];
								$tenbinhluan=$row['ten_binhluan'];
								$noidung=$row['binhluan']
								;
								echo'
								<tr>
									<td>'.$tenbinhluan.'</td>
									<td>'.$noidung.'</td>';
									$id_traloi=0;
									$id_taikhoan=0;
									$id_taikhoan=$this->laycot("select id_taikhoan from thaoluan where id_binhluan='$id'");
									$id_traloi=$this->laycot("select id_traloi from traloi where id_binhluan=$id");
									if($id_traloi!=0)
									{
									
										echo '<td><a href="?id='.$id_traloi.'"><input name="nut" type="submit" class="btn btn-primary" id="nuttraloi1" value="Xem câu trả lời"></a></td>';
									}
									else
									{
										echo '<td><td/>';
									}
								echo' </tr>';
								
								
								
								
							}
							echo'</table>';
			
		
		}
		else
		{
			
			echo'không có dữ liệu';
		}
		
	}
	
	
	
   
	    

	public function load_ds_lhp1($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			
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
			
				$id=$row['id_monhoc'];
				$tenlhp=$row['tenmh'];
				$time=$row['thoigianhoc'];
				$namhoc=$row['namhoc'];
				
				
				echo'<tbody>
                          <tr>
                            <th scope="row"><a href="uploadfile.php"> '.$tenlhp.'</a></th>
                            <td><a href="uploadfile.php"> '.$id.'</a></td>
                            <td><a href="uploadfile.php"> '.$time.'</a></td>
							  <td><a href="uploadfile.php"> '.$namhoc.'</a></td>
							
                           
                            
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
	public function load_ds_lhp($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query( $link,$sql);
		@mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		if($i>0)
		{
			
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
			
				$id=$row['id_monhoc'];
				$id = $this->encrypt($id,'key123');
				$idmh=$row['id_monhoc'];
				$tenlhp=$row['tenmh'];
				$time=$row['thoigianhoc'];
				$namhoc=$row['namhoc'];
				
				
				echo'<tbody>
                          <tr>
                            <th scope="row"><a href="uploadfile.php?id='.$id.'"> '.$tenlhp.'</a></th>
                            <td><a href="uploadfile.php?id='.$id.'"> '.$idmh.'</a></td>
                            <td><a href="uploadfile.php?id='.$id.'"> '.$time.'</a></td>
							  <td><a href="uploadfile.php?id='.$id.'"> '.$namhoc.'</a></td>
							
                           
                            
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
			return 0;

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
    $iv = openssl_random_pseudo_bytes(16); // Khởi tạo vector khởi động ngẫu nhiên
    $ciphertext = openssl_encrypt($plaintext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    $encrypted = base64_encode($iv . $ciphertext);
    return $encrypted;
}

function decrypt($encrypted, $key) {
    $decoded = base64_decode($encrypted);
    $iv_dec = substr($decoded, 0, 16);
    $ciphertext_dec = substr($decoded, 16);
    $plaintext_dec = openssl_decrypt($ciphertext_dec, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv_dec);
    return $plaintext_dec;
}

/*// Sử dụng các hàm đã viết để mã hóa và giải mã dữ liệu
$key = "mysecretkey"; // Thay thế bằng key của bạn
$plaintext = "Hello, world!";
$encrypted = encrypt($plaintext, $key);
$decrypted = decrypt($encrypted, $key);

echo "Plaintext: " . $plaintext . "<br>";
echo "Encrypted text: " . $encrypted . "<br>";
echo "Decrypted text: " . $decrypted;*/

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