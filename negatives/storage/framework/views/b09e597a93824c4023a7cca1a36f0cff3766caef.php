<?php $__env->startSection('content'); ?>
<div class="container" ng-controller="userController">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-history" "></i> About me</h3>
        </div>
        <div class="panel-body">
          <div class="col-md-8 text-left">
            <br>
            <b>Name:</b> <?php echo e(Auth::user()->name); ?><br>
            <b>Email:</b> <?php echo e(Auth::user()->email); ?><br>
            <br>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-8">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-history" "></i> Social Media</h3>
        </div>
        <div class="panel-body">
          <div class="col-md-12 text-left">

            <p>Share us with your friends and let them know that you are helping the other! <b>Share it on Facebook</b></p>
            <br>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.9&appId=676154209260847";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-share-button" data-href="http://negativesintopositives.ipvc.pt" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnegativesintopositives.ipvc.pt%2F&amp;src=sdkpreparse">Share</a></div>


          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-history" "></i> My Achievement</h3>
      </div>
      <div class="panel-body">
      <div ng-repeat="donation in don">
        <h3 style="text-align: center;">Total Donated: {{donation.sdon}}€</h3>
      </div>
        <div class="col-md-4 col-md-offset-1" style="text-align: center;" ng-repeat="badge in badgets" ng-if="badge.min_value < donations">

      <img style="margin-top: 30px;" src="{{ badge.urlfoto }}">
      <h3 style="text-align: center; margin: 20px;">{{badge.description}}</h3>

  </div>

      </div>
    </div>
  </div>


</div>
<!-- </div></div></div> -->
<!-- Mensage modal (readed and unreaded) -->
<div class="modal fade" id="ModalEditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Message details</h4>
      </div>
      <div class="modal-body">
        <div class="row" ng-repeat="abc in showmsg">
          <div class="col-sm-12" >                 
            <p><b>From:</b> {{ abc.from }}</p>
          </div>
          <div class="col-sm-12">                 
            <p><b>Subject:</b> {{ abc.subject }}</p>
            <hr>
          </div>  
          <div class="col-sm-12">                 
            <p>{{ abc.description }}</p> 
            <hr>
          </div>

          <div class="col-sm-4"></div>
          <div class="col-sm-4"></div> 
          <div class="col-sm-4" > <!-- change msg status -->
            <button id="btn-add" class="btn btn-success btn-sm" ng-click="toggleStatus(abc.id)"> OK! </button>
          </div> 
        </div>      
      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>