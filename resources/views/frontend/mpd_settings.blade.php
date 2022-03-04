@extends('layouts.frontend_layout')

@section('title', 'MPD SETTINGS')

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
					<h1>MPD SETTINGS<h1>
				</div>
			</div>
			<form id="mpd_settings" method="post" action="{{ url('user/changeMpdSettings') }}">
				{{ csrf_field() }}
				<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
					<a href="{{url('/')}}" class="back_link">
						<span class="fa fa-long-arrow-left" aria-hidden="true"></span>Back
					</a>
					<div class=" ">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Servicestatus">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseServicestatus" aria-expanded="true" aria-controls="collapseServicestatus">
												Service status/control
											</a>
										</h4>
									</div>
									<div id="collapseServicestatus" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Servicestatus">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Status :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="hidden" name="mpd_status" value="no">
															<input type="checkbox" id="chk" name="mpd_status" value="yes">
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
														<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Displays the current operational status of the target application.</p>
															<p>You can use the 'Enable/Disable' options below, to control this state.</p>
															<hr>
															<ul><li>Active :</li></ul>
															<p>The application is currently running, and, fully functional.</p>
															<hr>
															<ul><li>Inactive :</li></ul>
															<p>The application is not currently running. If the service is enabled and you see this state, the application may have encountered an issue and is failing to run.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>MPD Enable / Disable :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
															<input type="hidden" name="mpd" value="no">
															<input type="checkbox" id="mpd" name="mpd" value="yes">
															<span>
																<span id="mpd_enable" value="Active">Enable</span>
																<span id="mpd_disable" value="Inactive">Disable</span>
															</span>
															<a class="btn btn-primary"></a>
														</label>
													</div>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Allows you to enable or disable the target application.</p>
															<p>It is recommended to disable unwanted applications, as this will reduce CPU & memory usage of the device.</p>
															<hr>
															<ul><li>Enable :</li></ul>
															<p>The application is allowed to run.</p>
															<hr>
															<ul><li>Disable :</li></ul>
															<p>The application is prevented from running.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="WebInterface">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseWebInterface" aria-expanded="true" aria-controls="collapseWebInterface">
												Access MPD web interface
											</a>
										</h4>
									</div>
									<div id="collapseWebInterface" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="WebInterface">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>O!MPD :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input">
													<a href="../../../../ompd" class='input_link' target="_blank">
														http://<?php echo $_SERVER['HTTP_HOST']; ?>/ompd
													</a>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Clicking the following link will launch the O!MPD web interface.</p>
															<p>O!MPD is a feature rich front-end for playing audio through MPD.</p>
															<hr>
															<p>Default login details:</p>
															<ul><li>Username = admin</li></ul>
															<ul><li>Password = admin</li></ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Outputoption">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOutputoption" aria-expanded="true" aria-controls="collapseOutputoption">
												Output options ( Soxr resampling )
											</a>
										</h4>
									</div>
									<div id="collapseOutputoption" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Outputoption">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>SOXR :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="hidden" name="soxrStatus" value="no" class="SOXR_STATUS">
															<input type="checkbox" id="soxr_status" name="soxrStatus" value="yes" class="SOXR_STATUS" >
															<span><span>Enable</span><span>Disable</span></span>
															<a class="btn btn-primary"></a>
														</label>
													</div>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Allows you to control the usage of SOXR resampling.

																SOXR offers high quality audio resampling.</p>
															<p>Recommended if you are planning to upscale to a higher output frequency/bit, than the source format.</p>
															<hr>
															<ul><li>Enable:</li></ul>
															<p>Enables SOXR resampling.</p>
															<hr>
															<ul><li>Disable:</li></ul>
															<p>Disables resampling</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>SOXR Quality :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input appearance">
													<?php
														if(strpos($soxrQuality, "very high")) {
															$soxrQuality = 1;
														} elseif(strpos($soxrQuality, "high")) {
															$soxrQuality = 2;
														} elseif(strpos($soxrQuality, "low")) {
															$soxrQuality = 3;
														} else {
															$soxrQuality = 0;
														}
													?>
													<select class="form-control" name="soxrQuality">
														<option value="">Select</option>
														<option value="very high" <?php if($soxrQuality === 1) { echo "selected"; } ?>>Very High</option>
														<option value="high" <?php if($soxrQuality === 2) { echo "selected"; } ?>>High</option>
														<option value="low" <?php if($soxrQuality === 3) { echo "selected" ; } ?> >Low</option>
													</select>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Allows you to control the quality of SOXR resampling.</p>
															<hr>
															<ul><li>Very High</li></ul>
															<p>The highest quality setting for SOXR. Increases CPU usage significantly.</p>
															<hr>
															<ul><li>High</li></ul>
															<p>Acceptable quality. Medium CPU usage.</p>
															<hr>
															<ul><li>Low</li></ul>
															<p>The lowest quality setting for SOXR. Reduces CPU usage and audio quality significantly.</p>
														</div>
													</div>
												</div>
											</div>
											<!-- <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Restart Service<small>( To apply setting )</small></label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control" name ="soxrRestart">
														<option value ="">Select</option>
														<option>Restart</option>
													</select>
												</div>
											</div> -->
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="OutputFrequency">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOutputFrequency" aria-expanded="true" aria-controls="collapseOutputFrequency">
												Output Frequency / Bit Depth
											</a>
										</h4>
									</div>
									<div id="collapseOutputFrequency" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="OutputFrequency">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Frequency :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input appearance">
													<select class="form-control" name="frequency" id="frequency">
														<option value="">Select</option>
														<option value="384000" <?php if($outputFrequencies == 384000) { echo "selected"; } ?>>384000</option>
														<option value="352800" <?php if($outputFrequencies == 352800) { echo "selected"; } ?>>352800</option>
														<option value="192000" <?php if($outputFrequencies == 192000) { echo "selected"; }?>>192000</option>
														<option value="96000" <?php if($outputFrequencies == 96000) { echo "selected"; } ?>>96000</option>
														<option value="88200" <?php if($outputFrequencies == 88200) { echo "selected"; } ?>>88200</option>
														<option value="64000" <?php if($outputFrequencies == 64000) { echo "selected"; } ?>>64000</option>
														<option value="48000" <?php if($outputFrequencies == 48000) { echo "selected"; } ?>>48000</option>
														<option value="44100" <?php if($outputFrequencies == 44100) { echo "selected"; } ?>>44100</option>
														<option value="Native" <?php if($outputFrequencies == 'Native') { echo "selected"; } ?>>Native</option>
													</select>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Allows you to control the output frequency of audio playback with MPD.</p>
															<p>If the source audio format does not match the current setting, SOXR is recommended in this case to ensure highest audio conversion.</p>
															<hr>
															<ul><li>384KHz = Highest quality output frequency</li></ul>
															<ul><li>44.1KHz = Music standard (eg: CD/MP3 audio)</li></ul>
															<ul><li>Native  = Output matches the source format (bit perfect)</li></ul>
															<hr>
															<p>For bit-perfect playback, it is recommended to ensure the output frequency and bit depth, matches the source audio.
																To verify realtime output statistics for the ALSA stream, please check the 'ALSA stream output' section in the 'Status' page.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Bit Depth :</label>
												</div>
												<div class="col-md-6 col-sm-4 col-xs-12 right-input appearance">
													<select class="form-control" name = "bitDepth" id = "bitDepth">
														<option value="">Select</option>
														<option value="32" <?php if($bitDepth == 32) { echo "selected"; } ?>>32</option>
														<option value="24" <?php if($bitDepth == 24) {  echo "selected"; } ?>>24</option>
														<option value="16" <?php if($bitDepth == 16) { echo "selected"; } ?>>16</option>
														<option value="Native" <?php if($bitDepth == 'Native') { echo "selected"; } ?>>Native</option>
													</select>
												</div>
												<div class="col-md-2 col-sm-2 col-xs-12">
													<div class="naoTooltip-wrap">
														<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Allows you to control the output bit depth of audio playback with MPD.</p>
															<p>If the source audio format does not match the current setting, SOXR is recommended in this case to ensure highest audio conversion.</p>
															<hr>
															<ul><li>32 = Highest quality output bit depth</li></ul>
															<ul><li>16 = Music standard (eg: CD/MP3 audio)</li></ul>
															<ul><li>Native  = Output matches the source format (bit perfect)</li></ul>
															<hr>
															<p>For bit-perfect playback, it is recommended to ensure the output frequency and bit depth, matches the source audio.
																To verify realtime output statistics for the ALSA stream, please check the 'ALSA stream output' section in the 'Status' page.</p>
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
					<button class="btn white_btn" id="sve-chngs">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#chk').click(function(){return false;});
		var mpd_status = "<?php echo $mpd_status ?>";
		var _token = $('.token').val();
		var soxrStatus = "<?php echo $soxr_status ?>";

		if(mpd_status !== 'active') {
			$('#chk').prop('checked',true);
			$('#mpd').prop('checked',true);
		}

		if(soxrStatus !== 'active') {
			$('#soxr_status').prop('checked',true);
		}

		$("#mpd").click(function () {
			if ($("#mpd").is(':checked')) {
				$("#chk").each(function () {
					$(this).prop("checked", true);
				});

			} else {
				$("#chk").prop("checked", false);
			}
		});
	});

	$('#sve-chngs').on('click',function() {
		if ($('#mpd').prop('checked')) {
			$("#mpd_settings").validate({
				submitHandler: function(form){
					$('#overlay').show();
					form.submit();
				}
			})
		} else if ($('#soxr_status').prop('checked')) {
			$("#mpd_settings").validate({
				rules: {
					bitDepth: "required",
					frequency: "required"
				},
				messages: {
					bitDepth: "Please select the output bit depth!",
					frequency: "Please select the frequency!"
				},
				submitHandler: function(form){
					$('#overlay').show();
					form.submit();
				}
			})
		} else {
			$("#mpd_settings").validate({
				rules: {
					soxrQuality: "required",
					bitDepth: "required",
					frequency: "required"
				},
				messages: {
					soxrQuality: "Please select the quality!",
					bitDepth: "Please select the output bit depth!",
					frequency: "Please select the frequency!"
				},
				submitHandler: function(form){
					$('#overlay').show();
					form.submit();
				}
			})
		}
	});

	$('.naoTooltip-wrap').naoTooltip();
</script>
@endsection