<?php
include("view/template/header.php");
?>
<?php
//file hiển thị thông báo lỗi
//require_once 'view/commons/message.php';
?>
   <div class="container">
        <h1>Hiển thị danh sách môn hoc</h1>
        <a class="btn btn-primary mb-3" href="index.php?controller=monhoc&action=add">
            Thêm mới
        </a>
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">Mã môn học</th>
                    <th scope="col">Tên môn học</th>
                    <th scope="col">số tín chỉ</th>
                    <th scope="col">số tiết lý thuyết </th>
                    <th scope="col">Số tiết bài tập </th>
                    <th scope="col">số tiết số tiết thực hành thí nghiệm </th>
                    <th scope="col">số số giờ tự học </th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($monhocs)): ?>
                <?php foreach ($monhocs AS $monhoc) : ?>
                    <tr>
                           <?php
                                $urlEdit =
                                    "index.php?controller=monhoc&action=edit&mamonhoc=" . $monhoc['mamonhoc'];
                                $urlDelete =
                                    "index.php?controller=monhoc&action=delete&mamonhoc=" . $monhoc['mamonhoc'];
                            ?>
                        <td><?php echo  $monhoc['mamonhoc'] ?></td>
                        <td><?php echo  $monhoc['ten_mh'] ?></td>
                        <td><?php echo  $monhoc['sotinchi'] ?></td>
                        <td><?php echo  $monhoc['sotiet_lt'] ?></td>
                        <td><?php echo  $monhoc['sotiet_bt'] ?></td>
                        <td><?php echo  $monhoc['sotiet_thtn'] ?></td>
                        <td><?php echo  $monhoc['sogio_tuhoc'] ?></td>
                        <td><a href="<?php echo $urlEdit?>">Edit</a> &nbsp;</td>
                        <td>
                            <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                            href="<?php echo $urlDelete?>">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">KHông có dữ liệu</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            </div>
        </table>
<?php
include("view/template/footer.php");
?>