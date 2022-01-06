<?php
include("/src/view/template/header.php");
?>
    <div style="color: red">
        <?php echo $error; ?>
    </div>
    <div class="container">
        <h5 class="text-center text-primary mt-5">THÊM MÔN HỌC</h5>
        <form action="" method="post">
            <div class="form-group">
                <label for=" ten_mh">tên môn học</label>
                <input type="text" class="form-control" id=" ten_mh" name=" ten_mh"  value="">
            </div>
            <div class="form-group">
                <label for=" sotinchi">Số tín chỉ</label>
                <input type="text" class="form-control" id=" sotinchi" name=" sotinchi" value="">
            </div>
            <div class="form-group">
                <label for="sotiet_lt">Số tiết lý thuyết </label>
                <input type="text" class="form-control" id="sotiet_lt" name="sotiet_lt" value="">
            </div>
            <div class="form-group">
                <label for="sotiet_bt">Số tiết bài tập</label>
                <input type="text" class="form-control" id="sotiet_bt" name="sotiet_bt" value="">  
            </div>
            <div class="form-group">
                <label for=" sotiet_thtn">Số tiết thực hành thí nhiệm</label>
                <input type="text" class="form-control" id=" sotiet_thtn" name="sotiet_thtn" value="">
            </div>
            <div class="form-group">
                <label for="sogio_tuhoc">Số giờ tự học</label>
                <input type="tel" class="form-control" id="sogio_tuhoc" name="sogio_tuhoc" value="">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit" value="Update">Sửa</button>
        </form>
    </div>
<?php
include("/src/view/template/footer.php");
?>