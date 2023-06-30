<?php
	class mylogin
	{
			private function connect()
	{
		$con=mysqli_connect("localhost","root","","diemdanh");
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
			public function login($password )
		{
			$link=$this->connect();
			$sql="select id, pass from pass where pass='$password'";
			$_kq=mysqli_query($link,$sql);
			$i=mysqli_num_rows($_kq);
			if($i==1)
			{
				while($row=mysqli_fetch_array($_kq))
				{
					$id=$row['id'];
					$pass=$row['pass'];
				
					$_SESSION['id']=$id;
					$_SESSION['pass']=$pass;
					return 1;	
				}
			}
			else
			{
				return 0;
			}
			
		}
public function confirmlogin($id,$pass)
	{
		$link=$this->connect();
		$sql="select id from pass where id='$id' and pass='$pass'";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
		
		
			
		
		
	}

?>