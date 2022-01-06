<?php
     require_once 'model/monhocModel.php';
     class monhocController{
         function index(){
             $monhocModel = new monhocModel();
             $monhocs = $monhocModel->index();
             require_once 'view/monhoc/index.php';
    }
 
         function add(){
            $error = '';
            //xử lý submit form
            if (isset($_POST['submit'])) {
                $ten_mh= $_POST['ten_mh'];
                $sotinchi = $_POST['sotinchi'];
                $sotiet_lt = $_POST['sotiet_lt'];
                $sotiet_bt = $_POST['sotiet_bt'];
                $sotiet_thtn = $_POST['sotiet_thtn'];
                $sogio_tuhoc = $_POST['sogio_tuhoc'];}
                if (empty($ten_mh)) {
                    $error = "Name không được để trống";
                }
                else {
                    
                    $monhocModel = new MonhocModel();
                    $monhocArr = [
                        'ten_mh' => $ten_mh,
                        'sotinchi' => $sotinchi,
                        'sotiet_lt' => $sotiet_lt,
                        'sotiet_bt' => $sotiet_bt,
                        'sotiet_thtn' => $sotiet_thtn,
                        'sogio_tuhoc' => $sogio_tuhoc
                        
                    ];
                    $isInsert = $monhocModel->getMonhocById($monhocArr);
                    if ($isInsert) {
                        $_SESSION['success'] = "Thêm mới thành công";
                    }
                    else {
                        $_SESSION['error'] = "Thêm mới thất bại";
                    }
                    header("Location: index.php?controller=monhoc&action=index");
                    exit();
                
            }
            //gọi view
            require_once 'view/monhoc/add.php';
        }
         }
 
         function edit()
         {
            
            if (!isset($_GET['mamh'])) {
                $_SESSION['error'] = "Tham số không hợp lệ";
                header("Location: index.php?controller=monhoc&action=index");
                return;
            }
            if (!is_numeric($_GET['mamh'])) {
                $_SESSION['error'] = "Id phải là số";
                header("Location: index.php?controller=monhoc&action=index");
                return;
            }
            $bd_id = $_GET['mamh'];
            //gọi model để lấy ra đối tượng sách theo id
            $monhocModel = new MonhocModel();
            $monhoc = $monhocModel->getUserById($mamh);

            //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
            $error = '';
            if (isset($_POST['submit'])) {
                $ten_mh= $_POST['ten_mh'];
                $sotinchi = $_POST['sotinchi'];
                $sotiet_lt = $_POST['sotiet_lt'];
                $sotiet_bt = $_POST['sotiet_bt'];
                $sotiet_thtn = $_POST['sotiet_thtn'];
                $sogio_tuhoc = $_POST['sogio_tuhoc'];
                //check validate dữ liệu
                if (empty($bd_name)) {
                    $error = "Name không được để trống";
                }
                else {
                    //xử lý update dữ liệu vào hệ thống
                    $userModel = new UserModel();
                    $userArr = [
                        'mamh' => $mamh,
                        ' ten_mh' => $ten_mh,
                        'sotinchi' => $sotinchi,
                        'sotiet_lt' => $sotiet_lt,
                        'sotiet_bt' => $sotiet_bt,
                        'sotiet_thtn' => $sotiet_thtn,
                        'sogio_tuhoc' => $sogio_tuhoc
                    ];
                    $isUpdate = $umonhocModel->update($monhocArr);
                    if ($isUpdate) {
                        $_SESSION['success'] = "Update bản ghi #$mamh";
                    }
                    else {
                        $_SESSION['error'] = "Update bản ghi #$mamh thất bại";
                    }
                    header("Location: index.php?controller=monhoc&action=index");
                    exit();
                }
            }
            //truyền ra view
            require_once 'view/user/edit.php';
         }
         function delete(){
            //echo "tôi sẽ xóa người dùng";
            //url trên trình dueyjet sẽ có dạng
             // ?controller=book&action=delete&id=1
             //bắt id từ trình duyêtj
            $mamh= $_GET['mamh'];
            if (!is_numeric($mamh)) {
                header("Location: index.php?controller=mamh&action=index");
                exit();
            }
                // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
                $monhoc = new Monhoc();
                $isDelete = $mamh->delete($mamh);
                if ($isDelete) {
                    //chuyển hướng về trang liệt kê danh sách
                    //tạo session thông báo mesage
                    $_SESSION['success'] = "Xóa bản ghi #$mamh thành công";
                }
                else {
                    //báo lỗi
                    $_SESSION['error'] = "Xóa bản ghi #$mamh thất bại";
                }
                exit();
                // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/delete.php tương ứng
         }
     




?>