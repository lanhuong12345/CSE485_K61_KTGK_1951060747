<?php
include("src/view/template/header.php");
?>
    <div style="color: red">
        <?php echo $error; ?>
    </div>
    <div class="container">
        <h5 class="text-center text-primary mt-5">Cập nhật thông tin Môn học</h5>
       
        <form action="" method="post">
            <div class="form-group">
                <label for="ten_mh">Tên môn học</label>
                <input type="text" class="form-control" id="ten_mh" name="ten_mh" placeholder="Tên môn học"  value="">
            </div>
            <div class="form-group">
                <label for="sotinchi">Số tín chỉ</label>
                <input type="text" class="form-control" id="sotinchi" name="sotinchi" placeholder="Số tín chỉ" value="">
                
            </div>

            <div class="form-group">
                <label for="sotiet_lt">Số tín chỉ lt</label>
                <input type="text" class="form-control" id="sotiet_lt" name="sotiet_lt" placeholder="Số tín chỉ lt" value="">
                
            </div>
            <div class="form-group">
                <label for="sotiet_bt">Số tiết bt</label>
                <input type="text" class="form-control" id="sotiet_bt" name="sotiet_bt" placeholder="Số tiết bt"value="">
                
            </div>
            <div class="form-group">
                <label for="sotiet_thtn">Số tiết thtn</label>
                <input type="text" class="form-control" id="sotiet_thtn" name="sotiet_thtn" placeholder="Số tiết thtn" value="">
               
            </div>
            <div class="form-group">
                <label for="sogio_tuhoc">Số giờ tự học</label>
                <input type="text" class="form-control" id="sogio_tuhoc" name="sogio_tuhoc" placeholder="Số giờ tự học" value="">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit" value="add"  >Thêm</button>
        </form>
    </div>
<?php
include("src/view/template/footer.php");
?>