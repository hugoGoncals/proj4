<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>" ng-app="providerRecords">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Negatives in Positives</title>

    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/bootstrap-theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/elegant-icons-style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/font-awesome.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/style-responsive.css')); ?>">
    <!-- JS -->
    <script src="<?php echo e(asset('user/js/jquery.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>   
    <script type="text/javascript" src="<?php echo e(asset('user/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('user/js/jquery.scrollTo.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('user/js/jquery.nicescroll.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('user/assets/jquery-knob/js/jquery.knob.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('user/js/scripts.js')); ?>"></script>
         

    <!-- JS Controllers Angular -->
    <script src="<?php echo e(asset('/angular/app.js')); ?>"></script>
    <script src="<?php echo e(asset('/angular/controllers/listDonationUser.js')); ?>"></script>
    <script src="<?php echo e(asset('/angular/controllers/InboxController.js')); ?>"></script>
    <script src="<?php echo e(asset('/angular/controllers/userController.js')); ?>"></script>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
      
  </head>
    <body>
      <!--header start-->
      <header class="header dark-bg">
        <div class="toggle-nav">
          <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo">Negatives<a href="#" class="logo" style="color: white; margin-left: 0 !important;">4<span class="lite">Positives</span></a>
        <!--logo end-->
        <div class="top-nav notification-row" ng-controller="InboxController">                
          <!-- notificatoin dropdown start-->
          <ul class="nav pull-right top-menu">
              <!-- inbox notificatoin start-->
            <li id="mail_notificatoin_bar" class="">
              <a data-toggle="" class="dropdown-toggle" href="/inbox">
                <i class="icon-envelope-l"></i>
                <span class="badge bg-important" ng-repeat="msgcount in msgcount">{{ msgcount }}</span>
              </a>
            </li>
              <!-- inbox notificatoin end -->
              <!-- alert notification start
            <li id="alert_notificatoin_bar" class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-bell-l"></i>
                <span class="badge bg-important">7</span>
              </a>
            </li>-->
              <!-- alert notification end-->
              <!-- user login dropdown start-->
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                  <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                </span>
                <span class="username"><?php echo e(Auth::user()->name); ?></span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a href="#"><i class="icon_profile"></i> My Profile</a>
                </li>
                <li>
                  <a href="/inbox"><i class="icon_mail_alt"></i> My Inbox</a>
                </li>
                <li>
                  <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"><i class="icon_key_alt"></i> Logout
                  </a>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                  </form>
                </li>
              </ul>
            </li>
              <!-- user login dropdown end -->
          </ul>
            <!-- notificatoin dropdown end-->
        </div>
      </header> 
      <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
          <ul class="sidebar-menu">                
            <li class="sub-menu">
              <a class="" href="/home">
                <i class="icon_house_alt"></i>
                <span>My donations</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="/userprofile" class="">
                <i class="icon_document_alt"></i>
                <span>My profile</span>
              </a>
            </li>       
            <li>
              <a class="" href="/badgets">
                <i class="icon_genius"></i>
                <span>Badgets</span>
              </a>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
      <section id="main-content">
        <section class="wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
      </section>
</body>