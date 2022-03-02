@extends('layouts.frontend_layout')

@section('title', 'STATUS')

@section('content')

<?php if($status == 'closed') {
	$status = "Active";
} else {
	$status = "Inactive";
}

?>

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
					<h1>STATUS<h1>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
				<a href="{{url('/')}}" class="back_link">
					<span class="fa fa-long-arrow-left" aria-hidden="true"></span>Back
				</a>

			<div class=" ">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="alsaInfo">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsealsaInfo" aria-expanded="true" aria-controls="collapseServicestatus">
										ALSA Output Stream Information
									</a>
								</h4>
							</div>

							<div id="collapsealsaInfo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="alsaInfo">
								<div class="panel-body">

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>Status :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">
												<?php if(isset($alsaInfo) && !empty($alsaInfo)) { echo $alsaInfo ; } ?>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Displays the current status of the ALSA output stream on the device.</p>
														<hr>
														<p>- When audio playback is active</p>
														<p>Refresh the page to see the output information for ALSA. This will include output frequency and bit depth.</p>
														<hr>
														<p>- When audio playback is stopped</p>
														<p>The status box will be empty. Please start audio playback and refresh the page, to re-obtain this information.</p>
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

			<div class=" ">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="alsaInfo">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsewebInterface" aria-expanded="true" aria-controls="collapseServicestatus">
										Access NetData web interface
									</a>
								</h4>
							</div>

							<div id="collapsewebInterface" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="webInterface">
								<div class="panel-body">

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>NetData :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">

												<a href="http://<?php echo "$ipLocal"; ?>:19999" class='input_link' target = "_blank">
													<?php echo "http://localhost:19999"; ?>
												</a>

											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Clicking the link will launch the NetData web interface</p>
														<hr>
														<p>NetData is a feature rich, system stats viewer</p>
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


				<div class="">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="Servicestatus">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseServicestatus" aria-expanded="true" aria-controls="collapseServicestatus">
											CPU Information
										</a>
									</h4>
								</div>

								<div id="collapseServicestatus" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Servicestatus">
									<div class="panel-body">
										<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
											<div class="col-md-4 col-sm-6 col-xs-12 left-label">
												<label>CPU Temperature ('c) :</label>
											</div>
											<div class="col-md-8 col-sm-6 col-xs-12 right-input">
												<div class="col-md-10 col-sm-12 col-xs-12 right-input">
													<input type="text" class="form-control"  readonly="true" id = "ssid" name = "wifi" value = "<?php if(isset($cpu_temp) && !empty($cpu_temp)) { echo $cpu_temp ; } ?>">
												</div>
												<div class="col-md-2 col-sm-4 col-xs-12">
													<div class="naoTooltip-wrap">
														<span>
															<i class="fa fa-question-circle" style="font-size:24px;color:white">
															</i>
														</span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Displays the current temperature of the ARM/CPU on the device.</p>
															<p>Lower temperatures can prolong the life of the device and offer stability. Higher temperatures may stress components on the device, and, reduce its lifespan.</p>
															<hr>
															<ul>
																<li>
																	30-60'c :
																</li>
															</ul>
															<p>This is the ideal operating temperature, due to minimal stress caused by heat dissipation on device components.</p>
															<hr>
															<ul>
																<li>
																	60-70'c :
																</li>
															</ul>
															<p>Running hot, however, acceptable in most use cases.</p>
															<hr>
															<ul>
																<li>
																	> 70'c :
																</li>
															</ul>
															<p>Not recommended. Running the device for prolonged periods at high temperatures, may reduce the lifespan of the board, and, should be avoided. Please relocate the device to a cooler location, or, tweak the 'CPU Governor' options in 'System Settings' page.</p>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
											<div class="col-md-4 col-sm-6 col-xs-12 left-label">
												<label>CPU Usage (%) :</label>
											</div>
											<div class="col-md-8 col-sm-6 col-xs-12 right-input">
												<div class="col-md-10 col-sm-12 col-xs-12 right-input">
													<input type="text" class="form-control" id = "passkey" name = "passkey" value = "<?php if(isset($cpu_usage) && !empty($cpu_usage)) { echo $cpu_usage ; } ?>" readonly>
												</div>
												<div class="col-md-2 col-sm-4 col-xs-12">
													<div class="naoTooltip-wrap">
														<span>
															<i class="fa fa-question-circle" style="font-size:24px;color:white">
															</i>
														</span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Displays the current CPU usage for this device.</p>
															<hr>
															<ul>
																<li>
																	High CPU usage :
																</li>
															</ul>
															<p>Will increase power consumption and heat.</p>
															<hr>
															<ul>
																<li>
																	Low CPU usage :
																</li>
															</ul>
															<p>Will decrease power consumption and heat.</p>
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
			</div>

			<div class=" ">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="MemoryUsage">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMemoryUsage" aria-expanded="true" aria-controls="collapseMemoryUsage">
										Memory Usage
									</a>
								</h4>
							</div>

							<div id="collapseMemoryUsage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="MemoryUsage">
								<div class="panel-body">

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>Total Memory (MB) :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">
												<input type="text" class="form-control"  readonly="true" id = "ssid" name = "wifi" value = "<?php if(isset($total_memory) && !empty($total_memory)) { echo $total_memory ; } ?>">
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Displays the memory and cache statistics (RAM) for this device.
															To lower memory usage, please disable unwanted applications with the
															'Service control' option, in their respective page.</p>

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>Free Memory (MB) :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">
												<input type="text" class="form-control" id = "passkey" name = "passkey" value = "<?php if(isset($free_memory) && !empty($free_memory)) { echo $free_memory ; } ?>" readonly>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Displays the memory and cache statistics (RAM) for this device.
															To lower memory usage, please disable unwanted applications with the
															'Service control' option, in their respective page.</p>

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>Memory Usage (%) :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">
												<input type="text" class="form-control" id = "passkey" name = "passkey" value = "<?php if(isset($memory_usage_perc) && !empty($memory_usage_perc)) { echo number_format($memory_usage_perc, 2, '.', ''); } ?>" readonly>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Displays the memory and cache statistics (RAM) for this device.
															To lower memory usage, please disable unwanted applications with the
															'Service control' option, in their respective page.</p>

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

<!-- USB STATUS--!>
			<div class=" ">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="UsbStatus">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUsbStatus" aria-expanded="true" aria-controls="collapseUsbStatus">
										SOUNDCARD STATUS
									</a>
								</h4>
							</div>
							<div id="collapseUsbStatus" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="UsbStatus">
								<div class="panel-body">
<!-- // FOR LSBUSB STATUS --!>
									<div class="panel panel-default">
										<div class="panel-heading" style="background-color: transparent;" role="tab" id="lsusb1">
											<h4 class="panel-title" >
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapselsusb1" aria-expanded="true" aria-controls="collapselsusb1">
												USB DAC
												</a>
											</h4>
										</div>
	<!-- // FOR LSBUSB STATUS --!>
										<div id="collapselsusb1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="lsusb1">
											<div class="panel-body">
												<div class="col-md-12 col-sm-12 col-xs-12 left-input">
													 <?php
													 if(isset($lsusb) && !empty($lsusb)) { 
														$lsusb_str = str_replace("\n","&#13;&#10;", $lsusb); }
													 ?>
													<textarea class="form-control" rows="7" cols="20" readonly="true" wrap="hard" style="resize: none;" draggable="false" id = "lsusb" name = "wifi" ><?php echo $lsusb_str; ?></textarea> 
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 " style="text-align:right;">
													<div class="naoTooltip-wrap">
														<span> <i class="fa fa-question-circle" style="font-size:24px;color:white"> </i> </span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Displays the LSUSB Details for this device.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
<!-- // LSBUSB STATUS --!>
<!-- // FOR LSBUSB PORT STATUS --!>
									<div class="panel panel-default">
										<div class="panel-heading" style="background-color: transparent;" role="tab" id="lsusb2">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapselsusb2" aria-expanded="true" aria-controls="collapselsusb2">
												USB PORT INFO
												</a>
											</h4>
										</div>
	<!-- // FOR LSBUSB STATUS --!>
										<div id="collapselsusb2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="lsusb2">
											<div class="panel-body">
												<div class="col-md-12 col-sm-12 col-xs-12 left-input">
													 <?php
													 if(isset($lsusb_port) && !empty($lsusb_port)) { 
														$lsusbport_str = str_replace("\n","&#13;&#10;", $lsusb_port); }
													  ?>
													<textarea class="form-control" rows="10" cols="20" readonly="true" wrap="hard" style="resize: none;" draggable="false" id = "lsusbport" name = "wifi" ><?php echo $lsusbport_str; ?></textarea> 
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 " style="text-align:right;">
													<div class="naoTooltip-wrap">
														<span> <i class="fa fa-question-circle" style="font-size:24px;color:white"> </i> </span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Displays the LSUSB PORT Details for this device.</p>
														</div>
													</div>
												</div>
<!-- STATUS --!>
												<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
													<label for="lsusbport"> SOUND CARD INFO :</label>
													<div class="col-md-12 col-sm-12 col-xs-12 left-input">
														 <?php
														 if(isset($hw_param) && !empty($hw_param)) { 
															$hw_param_str = str_replace("\n","&#13;&#10;", $hw_param); }
														  ?>
														<textarea class="form-control" rows="10" cols="20" readonly="true" wrap="hard" style="resize: none; " draggable="false" id = "lsusbport" name = "wifi" ><?php echo $hw_param_str; ?></textarea> 
													</div>
													<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:right;" >
														<div class="naoTooltip-wrap">
															<span> <i class="fa fa-question-circle" style="font-size:24px;color:white"> </i> </span>
															<div class="naoTooltip nt-bottom nt-small">
																<p>Displays the Sound card hwparam Details for this device.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
<!-- // LSUSB PORT STATUE --!>
										</div>
									</div>
<!-- LSUSB PORT STATUS --!>
<!--- // aplay --!>
									<div class="panel panel-default">
										<div class="panel-heading" style="background-color: transparent;" role="tab" id="lsusb3">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapselsusb3" aria-expanded="true" aria-controls="collapselsusb3">
											APLAY Info
												</a>
											</h4>
										</div>
	<!-- // FOR LSBUSB STATUS --!>
										<div id="collapselsusb3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="lsusb3">
											<div class="panel-body">
												<div class="col-md-12 col-sm-12 col-xs-12 left-input">
													 <?php
													 if(isset($aplay) && !empty($aplay)) { 
														$aplay_str = str_replace("\n","&#13;&#10;", $aplay); }
													 ?>
													<textarea class="form-control" rows="7" cols="20" readonly="true" wrap="hard" style="resize: none;" draggable="false" id = "lsusb" name = "wifi" ><?php echo $aplay_str; ?></textarea> 
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 " style="text-align:right;">
													<div class="naoTooltip-wrap">
														<span> <i class="fa fa-question-circle" style="font-size:24px;color:white"> </i> </span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Displays the aplay Details .</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
<!-- // Aplay status --!>
<!--- // Dmesg --!>
									<div class="panel panel-default">
										<div class="panel-heading" style="background-color: transparent;" role="tab" id="lsusb4">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapselsusb4" aria-expanded="true" aria-controls="collapselsusb4">
											DMESG Info
												</a>
											</h4>
										</div>
										<div id="collapselsusb4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="lsusb4">
											<div class="panel-body">
												<div class="col-md-12 col-sm-12 col-xs-12 left-input">
													 <?php
													 if(isset($dmesg) && !empty($dmesg)) { 
														$dmesg_str = str_replace("\n","&#13;&#10;", $dmesg); }
													 ?>
													<textarea class="form-control" rows="7" cols="20" readonly="true" wrap="hard" style="resize: none;" draggable="false" id = "lsusb" name = "wifi" ><?php echo $dmesg_str; ?></textarea> 
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 " style="text-align:right;">
													<div class="naoTooltip-wrap">
														<span> <i class="fa fa-question-circle" style="font-size:24px;color:white"> </i> </span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>Displays the Dmesg Details .</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
<!-- DMESG --!>
<!-- // DMESG --!>
<!-- // Download options --!>
									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="edit-option" aria-labelledby="UsbStatus" style="text-align:right;">
											<a href="{{url('/user/download')}}">Download Data</a>
										</div>
									</div>
<!-- // Download options --!>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- USB STATUS--!>
			<div class=" ">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="StorageUsage">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseStorageUsage" aria-expanded="true" aria-controls="collapseServicestatus">
										Storage Usage
									</a>
								</h4>
							</div>

							<div id="collapseStorageUsage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="StorageUsage">
								<div class="panel-body">

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>Total Storage (MB) :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">
												<input type="text" class="form-control"  readonly="true" id = "ssid" name = "wifi" value = "<?php if(isset($total_storage) && !empty($total_storage)) { echo $total_storage ; } ?>">
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Displays the storage statistics (RootFS, SD/EMMC) for this device.</p>
													</div>
												</div>
											</div>

										</div>
									</div>

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>Free Storage (MB) :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">
												<input type="text" class="form-control" id = "passkey" name = "passkey" value = "<?php if(isset($free_storage) && !empty($free_storage)) { echo $free_storage ; } ?>" readonly>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Displays the storage statistics (RootFS, SD/EMMC) for this device.</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
										<div class="col-md-4 col-sm-6 col-xs-12 left-label">
											<label>Storage Usage (%) :</label>
										</div>
										<div class="col-md-8 col-sm-6 col-xs-12 right-input">
											<div class="col-md-10 col-sm-12 col-xs-12 right-input">
												<input type="text" class="form-control" id = "passkey" name = "passkey" value = "<?php if(isset($storage_usage_perc) && !empty($storage_usage_perc)) { echo number_format($storage_usage_perc, 2, '.', ''); } ?>" readonly>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12">
												<div class="naoTooltip-wrap">
													<span>
														<i class="fa fa-question-circle" style="font-size:24px;color:white">
														</i>
													</span>
													<div class="naoTooltip nt-bottom nt-small">
														<p>Displays the storage statistics (RootFS, SD/EMMC) for this device.</p>
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

		</div>
	</div>
</div>
<?php $alsaInfo = preg_replace('/\s+/', '', $alsaInfo); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.naoTooltip-wrap').naoTooltip();
		var alsaInfo = '<?php echo $alsaInfo; ?>';

		if(alsaInfo != 'closed') {
			$('.alsaInfo').css('display','block');
		}
	});

</script>
@endsection
