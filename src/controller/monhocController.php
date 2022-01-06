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
                $bd_name = $_POST['mamh'];
                if (empty($bd_name)) {
                    $error = "Name không được để trống";
                }
                else {
                  
                    $userModel = new UserModel();
                    //gọi phương thức để insert dữ liệu
                    //nên tạo 1 mảng tạm để lưu thông tin của
    //                đối tượng dựa theo cấu trúc bảng
                    $userArr = [
                        'bd_name' => $bd_name
                    ];
                    $isInsert = $userModel->getUserById($userArr);
                    if ($isInsert) {
                        $_SESSION['success'] = "Thêm mới thành công";
                    }
                    else {
                        $_SESSION['error'] = "Thêm mới thất bại";
                    }
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
            }
            //gọi view
            require_once 'view/user/add.php';
        }
         }
 
         function edit()
         {
            //echo "tôi sẽ sửa người dùng";
             // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            //lấy ra thông tin sách dựa theo id đã gắn trên url
            //xử lý validate cho trường hợp id truyền lên không hợp lệ
            if (!isset($_GET['bd_id'])) {
                $_SESSION['error'] = "Tham số không hợp lệ";
                header("Location: index.php?controller=user&action=index");
                return;
            }
            if (!is_numeric($_GET['bd_id'])) {
                $_SESSION['error'] = "Id phải là số";
                header("Location: index.php?controller=user&action=index");
                return;
            }
            $bd_id = $_GET['bd_id'];
            //gọi model để lấy ra đối tượng sách theo id
            $userModel = new UserModel();
            $users = $userModel->getUserById($bd_id);

            //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
            $error = '';
            if (isset($_POST['submit'])) {
                $bd_name = $_POST['bd_name'];
                $bd_sex = $_POST['bd_sex'];
                $bd_age = $_POST['bd_age'];
                $bd_bgroup = $_POST['bd_bgroup'];
                $bd_reg_date = $_POST['bd_reg_date'];
                $bd_phno = $_POST['bd_phno'];
                //check validate dữ liệu
                if (empty($bd_name)) {
                    $error = "Name không được để trống";
                }
                else {
                    //xử lý update dữ liệu vào hệ thống
                    $userModel = new UserModel();
                    $userArr = [
                        'bd_id' => $bd_id,
                        'bd_name' => $bd_name,
                        'bd_sex' => $bd_sex,
                        'bd_age' => $bd_age,
                        'bd_bgroup' => $bd_bgroup,
                        'bd_reg_date' => $bd_reg_date,
                        'bd_phno' => $bd_phno
                    ];
                    $isUpdate = $userModel->update($userArr);
                    if ($isUpdate) {
                        $_SESSION['success'] = "Update bản ghi #$bd_id thành công";
                    }
                    else {
                        $_SESSION['error'] = "Update bản ghi #$bd_id thất bại";
                    }
                    header("Location: index.php?controller=user&action=index");
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
            $bd_id = $_GET['bd_id'];
            if (!is_numeric($bd_id)) {
                header("Location: index.php?controller=user&action=index");
                exit();
            }
                // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
                $user = new User();
                $isDelete = $user->delete($bd_id);
                if ($isDelete) {
                    //chuyển hướng về trang liệt kê danh sách
                    //tạo session thông báo mesage
                    $_SESSION['success'] = "Xóa bản ghi #$bd_id thành công";
                }
                else {
                    //báo lỗi
                    $_SESSION['error'] = "Xóa bản ghi #$bd_id thất bại";
                }
                exit();
                // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/delete.php tương ứng
         }
     




?>