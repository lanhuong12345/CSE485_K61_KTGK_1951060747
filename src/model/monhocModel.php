<?php
  require_once 'src/config/database.php';
  class UserModel{
      private $mamh;
      private $ten_mh;
      private $sotinchi;
      private $sotiet_lt;
      private $sotiet_bt;
      private $sotiet_thtn;
      private $sogio_tuhoc;

      public function index() {
          
        $conn = $this->connectDb();
     
        $sql = "SELECT * FROM MONHOC";
        $results = mysqli_query($conn,$sql);
    
        $arr_monhocn = [];
    
        if (mysqli_num_rows($results) > 0) {
            $arr_umonhocn = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeDb($conn);

        return $arr_monhocn;
    }
    public function insert($monhoc = []) {
        $conn = $this->connectDb();
       
        $sql = "INSERT INTO MONHOC(`mamh`) 
        VALUES ('{$monhoc['mamh']}')";
        $isInsert = mysqli_query($conn, $sql);
        $this->closeDb($conn);

        return $isInsert;
    }
    public function getUserById($mamh = null) {
        $conn = $this->connectDb();
        $sql = "SELECT * FROM MONHOC WHERE mamh=$mamh";
        $results = mysqli_query($conn, $sql);
        $monhoc = [];
        if (mysqli_num_rows($results) > 0) {
            $monhocn = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $monhocn = $monhocn[0];
        }
        $this->closeDb($conn);

        return $monhoc;
    }
    public function update($monhoc = []) {
        $conn = $this->connectDb();
        $sql = "UPDATE MONHOC
    SET ten_mh = '{$monhoc['ten_mh']}', sotinchi = '{$monhoc['sotinchi']}',sotiet_lt = '{$monhoc['sotiet_lt']}', sotiet_bt = '{$monhoc['sotiet_bt']}', sotiet_thtn ='{$monhoc['sotiet_thtn']}',sogio_tuhoc='{$monhoc['sogio_tuhoc']}' WHERE mamh = {$monhoc['mamh']}";
        $isUpdate = mysqli_query($conn, $sql);
        $this->closeDb($conn);

        return $isUpdate;
    }
    public function delete($bd_id= null) {
        $conn = $this->connectDb();

        $sql = "DELETE FROM blood_donor  WHERE bd_id = $bd_id";
        $isDelete = mysqli_query($conn, $sql);

        $this->closeDb($conn);

        return $isDelete;
    }

      public function connectDb() {
        $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }

    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
  }


?>