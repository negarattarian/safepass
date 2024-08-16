<?php
include_once 'app/backend.php';

@$categories = show_categories();

if(isset($_GET['deleteid'])){
    $stu_id = $_GET['deleteid'];
    $date_id = $_GET['date'];
    delete_student_status($stu_id,$date_id);
    header("location:index.php?m=atten&p=list");
}

//var_dump($data);
?>

<div class="box box-info">


    <div class="box-header with-border">

        <h3 class="box-title">لیست دسته بندی های وب سایت</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">


        <div class="table-responsive">
            <form action="">

                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>نام دسته بندی</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($categories):
                            ?>
                            <?php
                            foreach ($categories as $item):
                            ?>
                            <tr>
                                <td><a href=""></a><?php echo $item['name']; ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        <?php
                        endif;
                        ?>
                        </tbody>
                    </table>
<!--                <br>-->
<!--                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">بروزرسانی-->

            </form>
        </div>
        <!-- /.table-responsive -->
    </div>


    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <!--        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">سفارش جدید</a>-->
        <!--        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">نمایش همه</a>-->
    </div>
    <!-- /.box-footer -->
</div>





