<?php
			require_once '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

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
								function input_data($data) {
								$data = trim($data);
								$data = stripslashes($data);
								$data = htmlspecialchars($data);
								return $data;
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



function importDataFromExcelToDatabase($filePath, $tableName, $startRow = 1)
{
	
	
	
	$link = $this->connect();
    // Load the spreadsheet file
    $spreadsheet = IOFactory::load($filePath);
    // Get the first sheet
    $worksheet = $spreadsheet->getActiveSheet();
    // Get the highest row number and column letter
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    // Convert the column letter to a number
    $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

    
  

    // Loop through each row of the sheet and insert into the database
for ($row = $startRow; $row <= $highestRow; $row++) {
    $rowData = array();
    // Loop through each column of the row and add the cell value to the $rowData array
    for ($col = 1; $col <= $highestColumnIndex; $col++) {
        $cellValue = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
        // If the column is 'password', hash the password with md5
        if ($worksheet->getCellByColumnAndRow($col, 1)->getValue() == 'password') {
            $cellValue = md5($cellValue);
        }
        $rowData[] = $cellValue;
    }
        // Build the SQL query to insert the row into the database
		// Loại bỏ cột "id" và "trangthai" khỏi danh sách các cột
		$columnNames = array('username', 'password', 'phanquyen', 'tennguoidung');
		
		// Tạo chuỗi giá trị cần thêm vào câu lệnh INSERT INTO
		// Bỏ đi giá trị của cột "id" và "trangthai"
		$columnValues = array_slice($rowData, 0, 4);
		$columnValueString = implode("', '", $columnValues);
		
		// Tạo câu lệnh SQL sử dụng danh sách các cột và giá trị tương ứng
		$sql = "INSERT INTO $tableName (". implode(",", $columnNames) . ") VALUES ('$columnValueString')";

        
        // Execute the SQL query
        if (!mysqli_query($link, $sql)) {
           /* echo "Error: " . $sql . "<br>" . mysqli_error($link);*/
		   
        }

    }
	if (mysqli_affected_rows($link) > 0) {
			// Return 1 if data is successfully inserted
			return 1;
		} else {
			// Return 0 if no data is inserted
			return 0;
		}

    // Close the database connection
    mysqli_close($link);
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




function insertGiangVienFromExcel($filePath) {
  $link=$this->connect();

    // Load file excel giảng viên
    $spreadsheet = IOFactory::load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

    // Lấy danh sách các tài khoản từ bảng taikhoan và lưu vào một mảng
    $sql = "SELECT id_taikhoan, username FROM taikhoan";
    $result = mysqli_query($link, $sql);
    $taikhoans = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $taikhoans[$row['username']] = $row['id_taikhoan'];
    }

    // Duyệt qua từng dòng dữ liệu trong file excel và insert vào bảng giangvien
    for ($row = 2; $row <= $highestRow; $row++) {
        $hoten = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $diachi = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $sdt = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $email = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
        $username = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

        // Tìm id_taikhoan tương ứng với username trong mảng taikhoans
        if (isset($taikhoans[$username])) {
            $id_taikhoan = $taikhoans[$username];

            // Insert thông tin giảng viên vào bảng giangvien
            $sql = "INSERT INTO giangvien (hoten, diachi, sdt, email, id_taikhoan) VALUES ('$hoten', '$diachi', '$sdt', '$email', '$id_taikhoan')";
            if (!mysqli_query($link, $sql)) {
                /*echo "Lỗi khi insert dòng thứ $row: " . mysqli_error($link) . "<br>";*/
				
            }
        } else {
            /*echo "Không tìm thấy tài khoản $username ở bảng taikhoan tại dòng thứ $row.<br>";*/
			
        }
    }

   	
	echo'<script language="javascript">window.alert("Hoàn thành insert dữ liệu từ file ");</script>';
	if (mysqli_affected_rows($link) > 0) {
    // Return 1 if data is successfully inserted
    return 1;
} else {
    // Return 0 if no data is inserted
    return 0;
}

	  mysqli_close($link);
}
function insertSinhVienFromExcel($filePath) {
  $link=$this->connect();

    // Load file excel giảng viên
    $spreadsheet = IOFactory::load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

    // Lấy danh sách các tài khoản từ bảng taikhoan và lưu vào một mảng
    $sql = "SELECT id_taikhoan, username FROM taikhoan";
    $result = mysqli_query($link, $sql);
    $taikhoans = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $taikhoans[$row['username']] = $row['id_taikhoan'];
    }

    // Duyệt qua từng dòng dữ liệu trong file excel và insert vào bảng giangvien
    for ($row = 2; $row <= $highestRow; $row++) {
        $hoten = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $diachi = $worksheet->getCellByColumnAndRow(2, $row)->getValue();       
        $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
		$lop = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
        $username = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

        // Tìm id_taikhoan tương ứng với username trong mảng taikhoans
        if (isset($taikhoans[$username])) {
            $id_taikhoan = $taikhoans[$username];

            // Insert thông tin giảng viên vào bảng sinhvien
            $sql = "INSERT INTO sinhvien (hoten, diachi,email,lop,id_taikhoan) VALUES ('$hoten','$diachi','$email','$lop','$id_taikhoan')";
            if (!mysqli_query($link, $sql)) {
               
            }
        } else {
            
        }
    }
	if (mysqli_affected_rows($link) > 0) {
    // Return 1 if data is successfully inserted
   		 return 1;
	} 	
	else {
    // Return 0 if no data is inserted
    	return 0;
	}

	  mysqli_close($link);

    
}
	
	
	
	
		
}

?>