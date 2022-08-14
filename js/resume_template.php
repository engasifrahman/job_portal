<?php

	//include 'header.php';
	require 'header.php';

	require_once('../vendor/autoload.php');

	$js_id=$_SESSION['js_info']['id'];
	$name=$_SESSION['js_info']['name'];

	?>

	<!--############################# BEGIN Content Area ###########################-->
    <div class="app-content content container-fluid">
    	<div class="content-wrapper">
	        <div class="content-body">
	    		<div class="row">

	    			<div class="col-md-12 col-xs-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">

									<div class="dropdown show pull-right pr-3">
									  	<a class="btn btn-info dropdown-toggle" href="" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="template_basic_1">Basic-I Template</span>
									    <span class="template_basic_2" style="display: none;">Basic-II Template</span>
									    <span class="template_academic" style="display: none;">Academic Template</span>
									    <span class="template_it" style="display: none;">IT Template</span>
									  	</a>

									  	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									    	<span class="dropdown-item" id="basic_1_template" style="cursor: pointer;">Basic-I Template</span>
									    	<span class="dropdown-item" id="basic_2_template" style="cursor: pointer;">Basic-II Template</span>
									    	<span class="dropdown-item" id="academic_template" style="cursor: pointer;">Academic Template</span>
									    	<span class="dropdown-item" id="it_template" style="cursor: pointer;">IT Template</span>
									  	</div>
									</div>
									<div class="heading-elements pull-right" title="Full Page View">
										<ul class="list-inline mb-0">
											<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
										</ul>
									</div>
								</h4>

							</div>

							<h5 class="warning text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<b>Here you can edit this template & this edit is temporary that means this edit will not be saved, this edit only for the urgent use</b>
							</h5>
							<p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<b>To download this template click on <i class="fa fa-print" aria-hidden="true"></i> print icon (better) or <i class="fa fa-file-pdf-o" aria-hidden="true"></i> pdf icon </b>
							</p>

			    			<div class="mt-1 basic_1_template">
								<embed src="resume_basic_1" style="width: 100%; height: 500px"> 
							</div>
							<div class="mt-1 basic_2_template" style="display: none;">
								<embed src="resume_basic_2" style="width: 100%; height: 500px"> 
							</div>
							<div class="mt-1 academic_template" style="display: none;">
								<embed src="resume_academic" style="width: 100%; height: 500px"> 
							</div>
							<div class="mt-1 it_template" style="display: none;">
								<embed src="resume_it" style="width: 100%; height: 500px"> 
							</div>
						</div>
					</div>

	    		</div>
	        </div>
	    </div>
    </div>
	<!--/############################# END Content Area ###########################-->
	<script type="text/javascript">

		$('#basic_1_template').click(function(e){
			$('.basic_2_template').hide(1200);
			$('.academic_template').hide(1200);
			$('.it_template').hide(1200);
			$('.template_basic_2').hide();
			$('.template_academic').hide();
			$('.template_it').hide();
			$('.template_basic_1').show();
			$('.basic_1_template').show(1200);

			e.preventDefault();
		});

		$('#basic_2_template').click(function(e){

			$('.basic_1_template').hide(1200);
			$('.academic_template').hide(1200);
			$('.it_template').hide(1200);
			$('.template_basic_1').hide();
			$('.template_academic').hide();
			$('.template_it').hide();
			$('.template_basic_2').show();
			$('.basic_2_template').show(1200);

			e.preventDefault();
		});

		$('#academic_template').click(function(ev){

			$('.basic_2_template').hide(1200);
			$('.it_template').hide(1200);
			$('.basic_1_template').hide(1200);
			$('.template_basic_2').hide();
			$('.template_it').hide();
			$('.template_basic_1').hide();
			$('.template_academic').show();
			$('.academic_template').show(1200);

			ev.preventDefault();
		});

		$('#it_template').click(function(evn){

			$('.basic_2_template').hide(1200);
			$('.academic_template').hide(1200);
			$('.basic_1_template').hide(1200);
			$('.template_basic_2').hide();
			$('.template_basic_1').hide();
			$('.template_academic').hide();
			$('.template_it').show();
			$('.it_template').show(1200);

			evn.preventDefault();
		});

	</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>