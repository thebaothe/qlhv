

<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $con=$this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		mysqli_set_charset($con,"utf8");
		
        if (!$this->connection) {
            die("Kết nối cơ sở dữ liệu thất bại: " );
        }
		else{
			return $con ;
		}
    }

    public function query($sql) {
		$link=$this->connect();
        $result = mysqli_query($link, $sql);
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($this->connection));
        }
        return $result;
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
}

?>
