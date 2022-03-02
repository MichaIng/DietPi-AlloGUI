@extends('layouts.frontend_layout')

@section('title', 'NAA DAEMON SETTINGS')

@section('content')
<div class="">
	<div class="container">
		@if(Session::has('custom_message'))
			<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<span>{{ Session::get('custom_message') }}</span>
			</div>
        @endif
		<div class="cont">
			<div class="col-md-12 col-sm-12 col-xs-12 page-main-heading">
				<div class="col-md-6 col-sm-6 col-xs-12 heading">
					<h1>NAA DAEMON SETTINGS<h1>
				</div>
			</div>
			<form id = "roon_settings" method="post" action="{{ url('user/changeDaemonSettings') }}">
				{{ csrf_field() }}
				<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
					<a href="{{url('/')}}" class="back_link">
						<span class="fa fa-long-arrow-left" aria-hidden="true"></span>Back
					</a>
					<div class=" ">



						<div class="panel-group" id="accordionMenu1" role="tablist" aria-multiselectable="true">
							<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">

								<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Service status/control
											</a>
										</h4>
									</div>

									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Status :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="hidden" name="daemonStatus" value="no">
															<input type="checkbox" id="chk" name="daemonStatus" value="yes">
																<span>
																	<span>Active</span>
																	<span>Inactive</span>
																</span>
															<a class="btn btn-primary"></a>
														</label>
														<!-- <input type="checkbox" name="my-checkbox" checked> -->
													</div>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span>
															<i class="fa fa-question-circle" style="font-size:24px;color:white">
															</i>
														</span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>
																Displays the current operational status of the target application.
															</p>
															<p>
																You can use the 'Enable/Disable' options below, to control this state.
															</p>
															<hr>
															<ul>
																<li>
																	Active :
																</li>
															</ul>
															<p>
																The application is currently running, and, fully functional.
															</p>
															<hr>

															<ul>
																<li>
																	Inactive :
																</li>
															</ul>
															<p>
																The application is not currently running. If the service is enabled and you see this state, the application may have encountered an issue and is failing to run.
															</p>

														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Daemon Enable / Disable :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
															<input type="hidden" name="daemon" value="no">
															<input type="checkbox" id="daemon" name="daemon" value="yes">
															<span>
																<span value="Active">Enable</span>
																<span value="Inactive">Disable</span>
															</span>
															<a class="btn btn-primary"></a>
														</label>
													</div>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span>
															<i class="fa fa-question-circle" style="font-size:24px;color:white">
															</i>
														</span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>
																Allows you to enable or disable the target application.
															</p>
															<p>
																It is recommended to disable unwanted applications, as this will reduce CPU & memory usage of the device.
															</p>
															<hr>
															<ul>
																<li>
																	Enable :
																</li>
															</ul>
															<p>
																The application is allowed to run.
															</p>
															<hr>

															<ul>
																<li>
																	Disable :
																</li>
															</ul>
															<p>
																The application is prevented from running.
															</p>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 bottom_btn">
					<button class="btn white_btn" id = "sve-chngs">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#chk').click(function(){return false;});
		var daemonStatus = "<?php echo $daemonStatus ?>";
		var _token = $('.token').val();

		if(daemonStatus === 'inactive') {
			$('#chk').prop('checked',true);
			$('#daemon').prop('checked',true);
		}

		$("#daemon").click(function () {
		    if ($("#daemon").is(':checked')) {
		        $("#chk").each(function () {
		            $(this).prop("checked", true);
		        });

		    } else {
	            $("#chk").prop("checked", false);
		    }
		})

		$('.naoTooltip-wrap').naoTooltip();

		$('#sve-chngs').on('click',function() {
	    	$('#overlay').show();
	    });
	});
</script>
@endsection