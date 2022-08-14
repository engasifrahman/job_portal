<?php 
    //include 'header.php';
    require 'header.php';
?>
<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
			<div class=" ">
				
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginAvatarDemo">Small </button>
				  <!--Modal Form Login with Avatar Demo-->
				  <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
				      <!--Content-->
				      <div class="modal-content">

				        <!--Header-->
				        <div class="modal-header">
				          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" class="rounded-circle img-responsive" alt="Avatar photo">
				        </div>
				        <!--Body-->
				        <div class="modal-body text-center mb-1">

				          <h5 class="mt-1 mb-2">Maria Doe</h5>

				          <div class="md-form ml-0 mr-0">
				            <input type="password" type="text" id="form1" class="form-control ml-0">
				            <label for="form1" class="ml-0">Enter password</label>
				          </div>

				          <div class="text-center mt-4">
				            <button class="btn btn-cyan">Login
				              <i class="fa fa-sign-in ml-1"></i>
				            </button>
				          </div>
				        </div>

				      </div>
				      <!--/.Content-->
				    </div>
				  </div>
				  <!--Modal Form Login with Avatar Demo-->

			</div>
        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<?php 
    //include 'footer.php';
    require 'footer.php';
?>