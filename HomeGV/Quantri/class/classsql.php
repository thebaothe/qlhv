<?php
 class mysql
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
	public function loaddslop($sql)
	{
		$link=$this->connect();
		$ketqua= mysqli_query($link,$sql);
		@mysqli_close($link);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			echo'<select class="form-select mb-3" name="lop" id"lop">
			<option value="0">chọn lớp học phần</option>'
			;
				
			while($row=@mysqli_fetch_array($ketqua))
			{
				$id=$row['maLHP'];
				$ten=$row['tenLHP'];
				echo'<option value="'.$id.'">'.$ten.'</option>';
			}
			echo' </select>';
		}
		else
		{
			echo'không có dữ liệu';
			
		}
		
		
	}
	public function loaddiemdanh($sql)
	{
		$link=$this->connect();
		$ketqua= mysqli_query($link,$sql);
		@mysqli_close($link);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
			echo'
					  <table class="table mb-0">
                            <thead>
                              <tr>
                                <th>Ngày điểm danh</th>
                                <th>Họ và tên sinh viên</th>
                                <th>Thời gian điểm danh</th>
                              </tr>
                            </thead>
                            <tbody>';
			while($row=@mysqli_fetch_array($ketqua))
			{
				$ngaydiemdanh=$row['ngay'];
				$giodiemdanh=$row['gio'];
				$id=$row['id'];
				$tensv=$row['tesv'];
				$masv=$row['masv'];
				$trangthai=$row['trangthai'];
				
				$_SESSION['ngay']=$ngaydiemdanh;
				echo'
					  <tr>
                                <th scope="row">'.$ngaydiemdanh.'</th>
                                <td>'.$tensv.'</td>
                                <td>'.$giodiemdanh.'</td>
                             
                              </tr>'	;
			}
			echo' </tbody>
			
			</table>';
			
			
		}
		else
		{
			echo'không có dữ liệu';
		}
		
		
	}
	public function loaddiemdanhki($sql)
	{
		$link=$this->connect();
		$ketqua= mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		
		if($i>0)
		{
			$sodem=0;
		
					   echo'
					  <table class="table mb-0">
                            <thead>
                              <tr>
                                <th>Số thứ tự</th>
                                <th>Mã số sinh viên</th>
                                <th>Họ và tên</th>
								 <th>Số buổi tham gia điểm danh</th>
                              </tr>
                            </thead>
                            <tbody>';
							
							
			while($row=@mysqli_fetch_array($ketqua))
			{
		
				$masv=$row['masv'];
				$tensv=$row['tesv'];
				
				
				
				$sodem++;
				$sobuoi=$row['sobuoi'];
				
			
					 echo'
					  <tr>
                                <th scope="row">'.$sodem.'</th>
                                <td>'.$masv.'</td>
                                <td>'.$tensv.'</td>
								 <td>'.$sobuoi.'</td>
                             
                              </tr>'	;
			}
			echo' </tbody>
			
			</table>';
			
			
		}
		else
		{
			echo'không có dữ liệu';
		}
		
		
	}
	
}
?>