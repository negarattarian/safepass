<?php
$group_count = countUserGroups();
$password_count = countPasswords();

$log_count = count_logs();

?>

<div class="row">
    <div class="col-lg-3 col-xs-6">

        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $password_count; ?></h3>

                <p>پسورد ایجاد شده</p>
            </div>
            <div class="icon">
                <i class="fa fa-group"></i>
            </div>
            <a href="#" class="small-box-footer">
                اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $group_count; ?></h3>

                <p>دسته بندی ایجاد شده</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>3</h3>

                <p>بازدید های اخیر</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
                اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $log_count; ?></h3>
                <p>تعداد لاگ ها</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
                اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
</div>