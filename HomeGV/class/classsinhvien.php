<?php
	include('classdatabase.php');
	
	class Sinhvien
	{
		
		
		private $id_sinhvien;
		private $hoten;
		private $diachi;
		private $email;
		private $lop;
		private $id_taikhoan;
		
		private $classdatatbase	;
		public function __constructdb()
		{
			$this->classdatatbase = new Database('localhost','root','','qlhv');
			
		}
		
		public function __construct($id_sinhvien, $hoten, $diachi, $email, $lop, $id_taikhoan  ) {
			$this->id_sinhvien = $id_sinhvien;
			$this->hoten = $hoten;
			$this->diachi = $diachi;
			$this->email = $email;
			$this->lop = $lop;
			$this->id_taikhoan = $id_taikhoan;
		}
		public function load_thaoluan($sql)
		{
			
			$link =$this->classdatatbase->connect();
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
										$id_taikhoan=$this->classdatatbase->laycot("select id_taikhoan from thaoluan where id_binhluan='$id'");
										$id_traloi=$this->classdatatbase->laycot("select id_traloi from traloi where id_binhluan=$id");
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
		
		
	}
	
	$q= new Sinhvien('3','Lương','abv','aaaa','DHTH15C','7');
	 $q->load_thaoluan("select * from thaoluan where id_taikhoan='$id_taikhoan' || id_taikhoan IN (SELECT id_taikhoan FROM taikhoan WHERE phanquyen ='giảng viên");
	
	

?>