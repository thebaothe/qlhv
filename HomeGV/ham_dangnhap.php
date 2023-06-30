			<?php

class login1
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
		
		function input_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
							}
	public function loginsv($user,$pass)
	{
		$pass=md5($pass);
		$sql1="select id_taikhoan,username,password, phanquyen,tennguoidung from taikhoan where username='$user' and password='$pass' limit 1";
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql1);
		$i=mysqli_num_rows($ketqua);
		if($i==1)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['id_taikhoan'];
				$user=$row['username'];
				$pass=$row['password'];
				$phanquyen=$row['phanquyen'];
				$tensv=$row['tennguoidung'];
				if($phanquyen=="sinh viên")
				{
					if(isset($_SESSION))
					session_destroy();
					session_start();
				
					$_SESSION['id']=$id;
					$_SESSION['user']=$user;
					$_SESSION['pass']=$pass;
					$_SESSION['phanquyen']=$phanquyen;
					$_SESSION['tennguoidung']=$tensv;
			
	
				return 2;
				}
				elseif($phanquyen=="giảng viên")
				{
					if(isset($_SESSION))
					session_destroy();
					session_start();
					
				
					$_SESSION['id']=$id;
					$_SESSION['user']=$user;
					$_SESSION['pass']=$pass;
					$_SESSION['phanquyen']=$phanquyen;
					$_SESSION['tennguoidung']=$tensv;
				return 1;
					
				}
				elseif($phanquyen=="người quản trị")
				{
					if(isset($_SESSION))
					session_destroy();
					session_start();
					
				
					$_SESSION['id']=$id;
					$_SESSION['user']=$user;
					$_SESSION['pass']=$pass;
					$_SESSION['phanquyen']=$phanquyen;
					$_SESSION['tennguoidung']=$tensv;
				return 3;
					
				}
				
				else
			{
				
				
				
				
				
				
			}

			}
		}
		else
		{
			return 0;
		}
	}
		
	public function confirmlogin($id,$user,$pass,$tensv,$phanquyen)
	{
		$link=$this->connect();
		$sql="select id_taikhoan from taikhoan where id_taikhoan='$id' and username='$user' and password='$pass' and phanquyen='$phanquyen'and tennguoidung='$tensv' ";
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i!=1)
		{
			
			return 1;
			
		}
		else
		{
			return 0;
			
		}

	}

	
		public function confirmloginGV($id,$user,$pass,$tensv,$phanquyen)
	{
		$link=$this->connect();
		$sql="select id from taikhoan where id='$id' and username='$user' and password='$pass' and tensv='$tensv' and phanquyen='$phanquyen'";
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i!=1)
		{
			
			return 1;
			
		}
		else
		{
			return 0;
			
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
                            <th>Tên sinh viên</th>
                            <th>Mã sinh viên</th>
                            <th></th>
                          </tr>
                        </thead>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['ID'];
				$ten=$row['TenSV'];
				
				echo '<tbody>
                          <tr>
                            <th scope="row">'.$ten.'</th>
                            <td>'.$id.'</td>

                            <td>
                            <form action="" method="post">
                            
                              </form>
                            </td>
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
	public function loaddssvlop_chonlt($sql)
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
                                      <th>Tên sinh viên</th>
                                      <th>Mã sinh viên</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['ID'];
				$ten=$row['TenSV'];
				
				echo '<tbody>
                          <tr>
                            <th scope="row"><a href="?id='.$id.'">'.$ten.'</a></th>
                            <td><a href="?id='.$id.'">'.$id.'</a></td>

                            <td>
                            <form action="" method="post">
                            <input name="nut" class="btn btn-primary" type="submit" value="Chọn làm lớp trưởng" >
                            
                              </form>
                            </td>
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
	public function loaddssvlop_chonlttk($sql)
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
                                      <th>Tên sinh viên</th>
                                      <th>Mã sinh viên</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['idsv'];
				$ten=$row['tensv'];
				
				echo '<tbody>
                          <tr>
                            <th scope="row"><a href="?id='.$id.'">'.$ten.'</a></th>
                            <td><a href="?id='.$id.'">'.$id.'</a></td>

                            <td>
                            <form action="" method="post">
                            <input name="nut" class="btn btn-primary" type="submit" value="Chọn làm lớp trưởng" >
                            
                              </form>
                            </td>
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
	
		
}
?>