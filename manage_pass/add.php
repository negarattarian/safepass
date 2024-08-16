<?php
include_once 'app/backend.php';
if(isset($_POST['submit'])){
    $data = $_POST['frm'];
//    var_dump($data);
    add_category($data);
    header("location:index.php?m=category&p=list");

}

?>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">اضافه کردن دسته بندی به وب سایت</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-md-8">
            <form role="form" method="post" action="" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                    <label>نام دسته بندی:</label>
                    <input type="text" name="frm[category]" class="form-control" placeholder="نام دسته بندی را وارد کنید ">
                </div>



                <input type="submit" name="submit" value="تایید" id="" class="btn btn-info dropdown-toggle" >
                <br>

            </form>

        </div>
    </div>
</div>
