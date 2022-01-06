<?php
  require_once 'config/database.php';
  class monhocModel{
      private $mamh;
      private $ten_mh;
      private $sotinchi;
      private $sotiet_lt;
      private $sotiet_bt;
      private $sotiet_thtn;
      private $sogio_tuhoc;
      //định nghĩa phương thức để sau này nhận các thao tác tương ứng với action
      public function index() {
          //khởi tạo kết nối
        $conn = $this->connectDb();
        //truy vấn
        $sql = "SELECT * FROM MONHOC";
        $results = mysqli_query($conn,$sql);
        //khai báo biến trả về mảng
        $arr_monhocs = [];
        //Xử lý(ko show hết quả) trả về kết quả
        if (mysqli_num_rows($results) > 0) {
            $arr_monhocs = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeDb($conn);

        return $arr_monhocn;
    }
    public function insert($user = []) {
        $conn = $this->connectDb();
        //tạo và thực thi truy vấn
        $sql = "INSERT INTO MONHOC(`ten_mh`) 
        VALUES ('{$monhoc['ten_mh']}')";
        $isInsert = mysqli_query($conn, $sql);
        $this->closeDb($conn);

        return $isInsert;
    }
    public function getUserById($mamh = null) {
        $conn = $this->connectDb();
        $sql = "SELECT * FROM MONHOC WHERE mamh=$mamh";
        $results = mysqli_query($conn, $sql);
        $user = [];
        if (mysqli_num_rows($results) > 0) {
            $monhocn = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $monhoc = $monhocn[0];
        }
        $this->closeDb($conn);

        return $monhoc;
    }
    public function update($user = []) {
        $conn = $this->connectDb();
        $sql = "UPDATE MONHOC
    SET ten_mh = '{$monhoc['ten_mh']}', sotinchi = '{$user['sotinchi']}' WHERE mamh= {$monhoc['mamh']}";
        $isUpdate = mysqli_query($conn, $sql);
        $this->closeDb($conn);

        return $isUpdate;
    }
    public function delete($bd_id= null) {
        $conn = $this->connectDb();

        $sql = "DELETE FROM MONHOC  WHERE mamh = $mamh";
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