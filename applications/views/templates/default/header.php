<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>รายงานการตรวจโรค</title>

        <!-- Bootstrap core CSS -->
        <link href="<?=getUrl();?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=getUrl();?>assets/css/default.min.css" rel="stylesheet">

        <script type="text/javascript" src="<?=getUrl();?>assets/js/jquery-1.12.1.min.js"></script>
        <script type="text/javascript" src="<?=getUrl();?>assets/js/bootstrap.min.js"></script>
        <!--
        Develop by: Kritsanasak Kuntaros
        Email: roboconk@gmail.com
        Facebook: https://www.facebook.com/kritsanasak
        Linkedin: https://www.linkedin.com/in/kritsanasak
        Line: kritphp
        อยากร่วมพัฒนาต่อ? มานี่เล๊ยยย https://github.com/robocon/simple-soldier เรายินดีเพิ่มคุณเข้ามาสนุกในโปรเจค
        -->
    </head>
<body>
<style type="text/css">
    @media print{
        body{
            font-family: 'TH SarabunPSK';
            font-size: 16px;
        }
        #no-print{
            display: none;
        }
    }

</style>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=getUrl();?>">รายงานการตรวจโรค(Demo)</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if( $this->user === false ): ?>
                    <li><a href="<?=getUrl();?>login/form">เข้าสู่ระบบ</a></li>
                <?php else: ?>
                    <?php if( $this->user ): ?>
                    <li><a href="<?=getUrl();?>search">ค้นหา</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ฐานข้อมูล <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if( $this->user->level === 'super admin' OR $this->user->level === 'admin' ): ?>
                                <li><a href="<?=getUrl();?>hospital">รายชื่อรพ.</a></li>
                                <li><a href="<?=getUrl();?>patient">รายชื่อผู้ยกเว้น</a></li>
                            <?php endif; ?>
                            <li><a href="<?=getUrl();?>province">รายชื่อจังหวัด</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ผู้ใช้งาน(<?=$this->user->fullname;?>) <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            if( $this->user->level === 'super admin' OR $this->user->level === 'admin' ):
                                ?>
                                <li><a href="<?=getUrl();?>user">ผู้ใช้งาน</a></li>
                                <?php
                            endif;
                            ?>
                            <li><a href="<?=getUrl();?>user/edit_user">แก้ไขข้อมูล</a></li>
                            <li><a href="<?=getUrl();?>user/edit_password">แก้ไขรหัสผ่าน</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=getUrl();?>user/logout">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <?php  ?>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
<?php
$msg = get_session('x_msg');
if( isset($msg) && $msg !== false ){
    ?>
    <div class="alert alert-warning text-center"><?=$msg;?></div>
    <?php
    set_session('x_msg', NULL);
}
?>
