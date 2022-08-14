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

				    	<!--################################ BEGIN Cover Letter Information ################################-->
			            <div class="row">
			                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

			                    <div id="cover_letter_info_notification_content" class="center" style="display:none;"></div>
			                    
			                    <br>

			                    <div class="col-md-12 col-sm-12 col-xs-12">
			                        <div class="card">
			                            <div class="card-header update_resume_card_header">
			                                <h4 class="card-title" id="cover_letter_info">Cover Letter Information</h4>
			                                <h4 class="card-title" id="cover_letter_info_with_edit_icon" style="display:none;">
			                                    <i class="fa fa-pencil-square-o fa-lg"></i> Cover Letter Information
			                                </h4>
			                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
			                                <div class="heading-elements">
			                                    <ul class="list-inline mb-0">
			                                        <li>
			                                            <a data-action="collapse" title="Minimize">
			                                                <i class="icon-minus4"></i>
			                                            </a>
			                                        </li>
			                                        <li>
			                                            <a id="<?php echo $js_id; ?>" class="cover_letter_info_edit" title="Edit"> 
			                                                <i class="fa fa-pencil-square-o fa-lg"></i>
			                                            </a>
			                                            <a id="cover_letter_info_edit_cancel" onclick="$('#cover_letter_info_edit_content').slideUp(400);$('#cover_letter_info_view_content').slideDown(400);$('.cover_letter_info_edit').show();$('#cover_letter_info').show();$('#cover_letter_info_with_edit_icon').hide();$('#cover_letter_info_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
			                                                <i class="icon-cross2"></i>
			                                            </a>
			                                        </li>
			                                    </ul>
			                                </div>
			                            </div>
			                            <div class="card-body collapse in">
			                                <div class="card-block custom-card-block">
			                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="cover_letter_info_edit_content" style="display:none;"></div>
			                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="cover_letter_info_view_content"></div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			            <!--################################ END Cover Letter Information ################################-->

						<div class="card">
							<div class="card-header">
								<h4 class="card-title">

									<div class="dropdown show pull-right pr-3">
									  	<a class="btn btn-info dropdown-toggle" href="" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="template_basic">Basic Template</span>
									    <span class="template_elegant" style="display: none;">Elegant Template</span>
									    <span class="template_modern" style="display: none;">Modern Template</span>
									  	</a>

									  	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									    	<span class="dropdown-item" id="basic_template" style="cursor: pointer;">Basic Template</span>
									    	<span class="dropdown-item" id="elegant_template" style="cursor: pointer;">Elegant Template</span>
									    	<span class="dropdown-item" id="modern_template" style="cursor: pointer;">Modern Template</span>
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

			    			<div class="mt-1 basic_template">
								<embed src="cover_letter_basic" style="width: 100%; height: 530px"> 
							</div>
							<div class="mt-1 elegant_template" style="display: none;">
								<embed src="cover_letter_elegant" style="width: 100%; height: 530px"> 
							</div>
							<div class="mt-1 modern_template" style="display: none;">
								<embed src="cover_letter_modern" style="width: 100%; height: 530px"> 
							</div>
						</div>
					</div>

	    		</div>
	        </div>
	    </div>
    </div>
	<!--/############################# END Content Area ###########################-->
	<script type="text/javascript">

		//##################### BEGIN Cover Letter Information #####################//
	    $.post("vcli", function(data) {
	        $("#cover_letter_info_view_content").html(data);
	    });

	    $('#cover_letter_info_with_edit_icon').hide();
	    $('#cover_letter_info_edit_cancel').hide();
	    $('#cover_letter_info_edit_content').hide();
	    $('#cover_letter_info_notification_content').hide();
	    //###################### END Cover Letter Information ######################//

		$('#basic_template').click(function(e){

			$('.elegant_template').hide(1200);
			$('.modern_template').hide(1200);
			$('.template_elegant').hide();
			$('.template_modern').hide();
			$('.template_basic').show();
			$('.basic_template').show(1200);

			e.preventDefault();
		});

		$('#elegant_template').click(function(ev){

			$('.modern_template').hide(1200);
			$('.basic_template').hide(1200);
			$('.template_modern').hide();
			$('.template_basic').hide();
			$('.template_elegant').show();
			$('.elegant_template').show(1200);

			ev.preventDefault();
		});

		$('#modern_template').click(function(evn){

			$('.elegant_template').hide(800);
			$('.basic_template').hide(800);
			$('.template_basic').hide();
			$('.template_elegant').hide();
			$('.template_modern').show();
			$('.modern_template').show(800);

			evn.preventDefault();
		});

	</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>