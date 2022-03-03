@extends('layouts.frontend_layout')

@section('title', 'SYSTEM SETTINGS')
@section('content')
<?php //echo "<pre>";print_r($updateDietPiStatus);die; ?>
<!-- <div id="myDiv">
    <img id="loading-image" src="{{ asset('img/loading.gif') }}" style = "display:none"/>
</div> -->


<!-- <div class="container">
	<div class="panel-group" id="accordionMenu" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
	      	<div class="panel-heading" role="tab" id="headingOne">
		        <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		          	Menu 0
			        </a>
	      		</h4>
	      	</div>
	      	<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	        	<div class="panel-body">
		          	<ul class="nav">
			            <li><a href="#">item 1</a></li>
			            <li><a href="#">item 2</a></li>
			            <li><a href="#">item 3</a></li>
		          	</ul>
	        	</div>
	      	</div>
    	</div>
    	<div class="panel panel-default">
      		<div class="panel-heading" role="tab" id="headingTwo">
        		<h4 class="panel-title">
        			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          			Menu 1
        			</a>
      			</h4>
      		</div>
	      	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		        <div class="panel-body">
		          	<ul class="nav">
			            <li><a href="#">item 1</a></li>
			            <li><a href="#">item 2</a></li>
			            <li><a href="#">item 3</a></li>
			            <li><a href="#">item 4</a></li>
		          	</ul>
		        </div>
	      	</div>
	    </div>
  	</div>
</div>
 -->

<div class="outr-cont">
	<div class="container">
		@if(Session::has('custom_message'))
			<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<span>{!! Session::get('custom_message') !!}</span>
			</div>
        @endif
        <div class="alert alert-success" id = "alertSuccess" style = "display:none">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  	<strong>Success!</strong> DietPi version successfully updated. A system reboot is required to finish the update, please reboot the system.
		</div>
		<div class="alert alert-success" id = "alertSound" style = "display:none">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  	<strong>Success!</strong> Soundcard successfully updated.
		</div>
		<div class="alert alert-success" id = "alertFile" style = "display:none">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  	<strong>Success!</strong> Swapfile size successfully updated .
		</div>
		<div class="alert alert-success" id = "alertReeboot" style = "display:none">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  	<strong>Success!</strong> System is now rebooting.
		</div>
		<div class="alert alert-success" id = "alertPower" style = "display:none">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  	<strong>Success!</strong> System has been successfully shut down.
		</div>
		<div class="cont systemsettnnssss">
			<div class="col-md-12 col-sm-12 col-xs-12 page-main-heading">
				<div class="col-md-6 col-sm-6 col-xs-12 heading">
					<h1>SYSTEM SETTINGS<h1>
				</div>
			</div>
			<form id = "system_settings" method="post" action="{{ url('user/changeSystemSettings') }}">
				{{ csrf_field() }}
				<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
					<a href="{{url('/')}}" class="back_link">
						<span class="fa fa-long-arrow-left" aria-hidden="true"></span>Back
					</a>
					<div class=" ">

						<div class="panel-group" id="accordionMenu" role="tablist" aria-multiselectable="true">
							<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="host">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseHost" aria-expanded="true" aria-controls="collapseHost">
											Host name
											</a>
										</h4>
									</div>
									<div id="collapseHost" class="panel-collapse collapse in " role="tabpanel" aria-labelledby="host">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Host Name :</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12">
													<div class="col-md-10 col-sm-12 col-xs-12 right-input">
														<input type="text" name="host" class="form-control host" value="<?php echo $hostName; ?>" id = "hstNm">
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<p>
																	The hostname is the unique network name for this device.
																</p>
																<p>
																	Changing the hostname will also effect the device name in Roon and Shairport sync.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="network">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNetwork" aria-expanded="true" aria-controls="collapseNetwork">
												Networking options
											</a>
										</h4>
									</div>
									<div id="collapseNetwork" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="network">
										<div class="panel-body">
                                            <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>DHCP / Static IP :</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<div class="col-md-10 col-sm-12 col-xs-12 right-input">
	                                                    <select class="form-control" name = "IP" id = "dhstc">
	                                                        <option value="dhcp" <?php if($selectoption == 1){ echo "selected";}?>>DHCP</option>
	                                                        <option value="static" <?php if($selectoption == 0){ echo "selected";}?>>STATIC</option>
														</select>
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<ul>
																	<li>
																		DHCP:
																	</li>
																</ul>
																<p>
																	When running under DHCP mode, the IP address of this system is automatically assigned by your network router.
																</p>
																<hr>
																<ul>
																	<li>
																		STATIC:
																	</li>
																</ul>
																<p>
																	In STATIC mode, you can specify a persistent IP address to use for this system. We recommend this option for advanced users, who wish to manage their local network infrastructure.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>IP Address :</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input" id = "fade">
													<div class="col-md-10 col-sm-12 col-xs-12 right-input">
														<input type="text" name="address" class="form-control address" id = "address" value="<?php echo($ipAddress); ?>" readonly>
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<ul>
																	<li>
																		DHCP:
																	</li>
																</ul>
																<p>
																	In DHCP mode, this will display the current IP address of the system.
																</p>
																<hr>
																<ul>
																	<li>
																		STATIC:
																	</li>
																</ul>
																<p>
																	In STATIC mode, you can assign a unique persistent IP address for this system.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>IP Gateway :</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input" id = "fade1">
													<div class="col-md-10 col-sm-12 col-xs-12 right-input">
														<input type="text" name="gateway" class="form-control faded gateway" value="<?php echo($ipGateway); ?>" readonly>
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<ul>
																	<li>
																		DHCP:
																	</li>
																</ul>
																<p>
																	In DHCP mode, this will display the current IP gateway of the system.
																</p>
																<hr>
																<ul>
																	<li>
																		STATIC:
																	</li>
																</ul>
																<p>
																	In STATIC mode, you can assign a different gateway address for this system. The gateway is usually the IP address of the main router on your network.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>IP Mask :</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input" id = "fade2">
													<div class="col-md-10 col-sm-12 col-xs-12 right-input">
														<input type="text" name="mask" class="form-control faded mask" value="<?php echo($ipMask); ?>" readonly>
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<ul>
																	<li>
																		DHCP:
																	</li>
																</ul>
																<p>
																	In DHCP mode, this will display the current IP mask of the system.
																</p>
																<hr>
																<ul>
																	<li>
																		STATIC:
																	</li>
																</ul>
																<p>
																	In STATIC mode, you can assign a different mask address for this system. The mask is usually 255.255.255.0 in most cases, however, advanced users can adjust as required.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>IP DNS :</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input" id = "fade3">
													<div class="col-md-10 col-sm-12 col-xs-12 right-input">
														<input type="text" name="dns" class="form-control faded dns" value="<?php echo($ipDns); ?>" readonly>
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<ul>
																	<li>
																		DHCP:
																	</li>
																</ul>
																<p>
																	In DHCP mode, this will display the current IP DNS of the system.
																</p>
																<hr>
																<ul>
																	<li>
																		STATIC:
																	</li>
																</ul>
																<p>
																	In STATIC mode, you can assign a different DNS address for this system. In most use cases, the router will handle DNS server requests and that IP should be used. Alternatives such as google DNS (8.8.8.8) are also valid options.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Soundcard">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSoundcard" aria-expanded="true" aria-controls="collapseSoundcard">
												Soundcard selection
											</a>
										</h4>
									</div>
									<div id="collapseSoundcard" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Soundcard">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>SoundCard :</label>
												</div>
												<div class = "col-md-8 col-sm-6 col-xs-12 edit-input-row padding-all-zero">
													<div class="col-md-12 col-sm-12 col-xs-12 right-input appearance">
														<?php
															if ( $HW_MODEL == 70 )
															{
																$str1 = 'snd-soc-allo-piano-dac';
																$str2 = 'snd-soc-allo-piano-dac-plus';
																$str3 = 'allo-cheapo-analogue';
																$str4 = 'allo-cheapo-optical';
																$str5 = 'usb-dac';
																$str6 = 'usb-dac-1.1';
																$str7 = 'none';
															} else {
																$str1 = 'rpi-bcm2835-auto';
																$str2 = 'rpi-bcm2835-3.5mm';
																$str3 = 'rpi-bcm2835-hdmi';
																$str4 = 'allo-boss-dac-pcm512x-audio';
																$str5 = 'allo-digione';
																$str6 = 'allo-katana-dac-audio';
																$str7 = 'allo-piano-dac-pcm512x-audio';
																$str8 = 'allo-piano-dac-plus-pcm512x-audio';
																$str9 = 'usb-dac';
																$str10 = 'none';
																$str11 = 'allo-boss2-dac-audio';
															}
														?>
														<div class="col-md-10 col-sm-12 col-xs-12 right-input">
															<select class="form-control" name = "soundcard" id = "sound">
																<?php if ( $HW_MODEL == 70 ) { ?>
																	<option value = "snd-soc-allo-piano-dac" @if($soundCard =='snd-soc-allo-piano-dac'){{"selected"}} @endif>snd-soc-allo-piano-dac</option>
																	<option value = "snd-soc-allo-piano-dac-plus" <?php if($soundCard == $str2) { echo "selected"; } ?>>snd-soc-allo-piano-dac-plus</option>
																	<option value = "allo-cheapo-analogue" <?php if($soundCard == $str3) { echo "selected"; } ?>>allo-cheapo-analogue</option>
																	<option value = "allo-cheapo-optical" <?php if($soundCard == $str4) { echo "selected"; } ?>>allo-cheapo-optical</option>
																	<option value = "usb-dac" <?php if($soundCard == $str5) { echo "selected"; } ?>>usb-dac</option>
																	<option value = "usb-dac-1.1" <?php if($soundCard == $str6) { echo "selected"; } ?>>usb-dac-1.1</option>
																	<option value = "none" <?php if($soundCard == $str7) { echo "selected"; } ?>>none</option>
																<?php } else { ?>
																	<option value = "rpi-bcm2835-auto" @if($soundCard =='rpi-bcm2835-auto'){{"selected"}} @endif>rpi-bcm2835-auto</option>
																	<option value = "rpi-bcm2835-3.5mm" <?php if($soundCard == $str2) { echo "selected"; } ?>>rpi-bcm2835-3.5mm</option>
																	<option value = "rpi-bcm2835-hdmi" <?php if($soundCard == $str3) { echo "selected"; } ?>>rpi-bcm2835-hdmi</option>
																	<option value = "allo-boss-dac-pcm512x-audio" <?php if($soundCard == $str4) { echo "selected"; } ?>>allo-boss-dac-pcm512x-audio</option>
																	<option value = "allo-boss2-dac-audio" <?php if($soundCard == $str11) { echo "selected"; } ?>>allo-boss2-dac-audio</option>
																	<option value = "allo-digione" <?php if($soundCard == $str5) { echo "selected"; } ?>>allo-digione</option>
																	<option value = "allo-katana-dac-audio" <?php if($soundCard == $str6) { echo "selected"; } ?>>allo-katana-dac-audio</option>
																	<option value = "allo-piano-dac-pcm512x-audio" <?php if($soundCard == $str7) { echo "selected"; } ?>>allo-piano-dac-pcm512x-audio</option>
																	<option value = "allo-piano-dac-plus-pcm512x-audio" <?php if($soundCard == $str8) { echo "selected"; } ?>>allo-piano-dac-plus-pcm512x-audio</option>
																	<option value = "usb-dac" <?php if($soundCard == $str9) { echo "selected"; } ?>>usb-dac</option>
																	<option value = "none" <?php if($soundCard == $str10) { echo "selected"; } ?>>none</option>
																<?php } ?>
															</select>
														</div>
														<div class="col-md-2 col-sm-4 col-xs-12">
															<div class="naoTooltip-wrap">
																<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
																<div class="naoTooltip nt-bottom nt-small">
																	<p>
																		This options allows you to select and configure the soundcard for your system:
																	</p>
																	<hr>
																	<?php if ( $HW_MODEL == 70 ) { ?>
																		<ul><li>snd-soc-allo-piano-dac = Allo Piano DAC 1</li></ul>
																		<ul><li>snd-soc-allo-piano-dac-plus = Allo Piano DAC 2.1</li></ul>
																		<ul><li>allo-cheapo-analogue = Allo Cheapo, running under analogue output</li></ul>
																		<ul><li>allo-cheapo-optical = Allo Cheapo, running under optical output</li></ul>
																	<?php } else { ?>
																		<ul><li>rpi-bcm2835-auto = Onboard RPi soundcard (HQ). HDMI if plugged in, else 3.5mm output.</li></ul>
																		<ul><li>rpi-bcm2835-3.5mm = Onboard RPi soundcard (HQ). Forced 3.5mm output.</li></ul>
																		<ul><li>rpi-bcm2835-hdmi = Onboard RPi soundcard (HQ). Forced HDMI output.</li></ul>
																		<ul><li>allo-boss-dac-pcm512x-audio = Allo BOSS and MINI BOSS DAC's</li></ul>
																		<ul><li>allo-boss2-dac-audio = Allo BOSS2 DAC</li></ul>
																		<ul><li>allo-digione = Allo DiGiOne</li></ul>
																		<ul><li>allo-piano-dac-pcm512x-audio = Allo Piano DAC</li></ul>
																		<ul><li>allo-piano-dac-plus-pcm512x-audio = Allo Piano 2.1 DAC</li></ul>
																	<?php } ?>
																	<ul><li>usb-dac = Will detect and configure for the USB DAC connected to this device. Please make sure the USB DAC is connected, before saving changes.</li></ul>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div>
													<!-- // FOR Alsa Mixer --!>
													<div class="panel panel-default" <?php if($soundCard != 'allo-boss2-dac-audio' ) { ?> style="display: none;" <?php } ?>>
														<div class="panel-heading" style="background-color: transparent;" role="tab" id="alsamixerctrl" >
															<h4 class="panel-title" >
																<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsealsamixerctrl" aria-expanded="true" aria-controls="collapsealsamixerctrl">
																ALSA MIXER CONTROLS
																</a>
															</h4>
														</div>
														<div id="collapsealsamixerctrl" class="panel-collapse collapse" role="tabpanel" aria-labelledby="alsamixerctrl">
															<div class="panel-body">
																<!-- // Alsamixer controls --!>
																<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("Master", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label>Master</label>
																	</div>
																	<div class="col-md-8 col-sm-6 col-xs-12 right-input" id = "fade3">
																		<div class="col-md-10 col-sm-12 col-xs-12 right-input">
																			<input class="range-example-input-2" id="master-range" type="text" min="0" max="100" value="{{$Master}}" name="points" step="1" />
																			<input type = "hidden" id = "master_chng_val" val = "{{$Master}}" name = "master_chng_val">
																		</div>
																		<div class="col-md-2 col-sm-4 col-xs-12">
																			<div class="naoTooltip-wrap">
																				<span>
																					<i class="fa fa-question-circle" style="font-size:24px;color:white">
																					</i>
																				</span>
																				<div class="naoTooltip nt-bottom nt-small">
																					<ul>
																						<li>
																							Alsamixer -  Master Playback Volume :
																						</li>
																					</ul>
																					<p>
																						Drag to change Master Control Volume
																					</p>
																				</div>
																			</div>
																		</div>
																	  </div>
																   </div>
																  <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("Digital", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label>Digital</label>
																	</div>
																	<div class="col-md-8 col-sm-6 col-xs-12 right-input" id = "fade3">
																		<div class="col-md-10 col-sm-12 col-xs-12 right-input">
																			<input class="range-example-input-2" id="digital-range" type="text" min="0" max="100" value="{{$Digital}}" name="points" step="1" />
																			<input type = "hidden" id = "digital_chng_val" val = "{{$Digital}}" name = "digital_chng_val">
																		</div>
																		<div class="col-md-2 col-sm-4 col-xs-12">
																			<div class="naoTooltip-wrap">
																				<span>
																					<i class="fa fa-question-circle" style="font-size:24px;color:white">
																					</i>
																				</span>
																				<div class="naoTooltip nt-bottom nt-small">
																					<ul>
																						<li>
																							Alsamixer -  Digital Playback Volume:
																						</li>
																					</ul>
																					<p>
																						Drag to change Digital Control Volume																					</p>
																				</div>
																			</div>
																		</div>
																	  </div>
																   </div>
																   <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("PCM De-emphasis Filter", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label>PCM De-emphasis Filter :</label>
																	</div>
																	<div class="col-md-6 col-sm-4 col-xs-12 right-input">
																		<div class="switch">
																			<label class="switch-light" onclick="">
																				<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" id = "pcm_de_emphasis_val" name = "pcm_de_emphasis_val" value = "">
																				<input type="checkbox" id = "pcm_de_emphasis" name = "pcm_de_emphasis" value = "">
																				<span>
																					<span id = "pcm_de_emphasis_enable" value ="">Enable</span>
																					<span id = "pcm_de_emphasis_disable" value ="">Disable</span>
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
																				<p> Allows you to Enable or Disable the PCM De-emphasis Filter : </p>
																				<hr>
																				<ul> <li> Enable : </li> </ul>
																				<p> This Control is allowed to Enable the PCM De-emphasis Filter. </p>
																				<hr>
																				<ul> <li> Disable : </li> </ul>
																				<p> This Control is allowed to Disable the PCM De-emphasis Filter. </p>
																			</div>
																		</div>
																	  </div>
														                       </div>
																   <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("PCM Filter Speed", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label>PCM Filter Speed :</label>
																	</div>
																	<div class="col-md-6 col-sm-4 col-xs-12 right-input">
																		<div class="switch">
																			<label class="switch-light" onclick="">
																				<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" id = "pcm_filter_speed_val" name = "pcm_filter_speed_val" value = "">
																				<input type="checkbox" id = "pcm_filter_speed" name = "pcm_filter_speed" value = "">
																				<span>
																					<span id = "pcm_filter_speed_enable" value ="Fast">Fast</span>
																					<span id = "pcm_filter_speed_disable" value ="slow">Slow</span>
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
																				<p> Allows you to set the PCM Filter Speed to Fast or Slow : </p>
																				<hr>
																				<ul> <li> Fast : </li> </ul>
																				<p> This Control is allowed to Fast the PCM Filter Speed. </p>
																				<hr>
																				<ul> <li> Slow : </li> </ul>
																				<p> This Control is allowed to Slow the PCM Filter Speed.   </p>
																			</div>
																		</div>
																	  </div>
														                       </div>
																   <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("PCM High-pass Filter", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label> PCM High-pass Filter :</label>
																	</div>
																	<div class="col-md-6 col-sm-4 col-xs-12 right-input">
																		<div class="switch">
																			<label class="switch-light" onclick="">
																				<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" id = "pcm_high_pass_filter_val" name = "pcm_high_pass_filter_val" value = "">
																				<input type="checkbox" id = "pcm_high_pass_filter" name = "pcm_high_pass_filter" value = "">
																				<span>
																					<span id = "pcm_high_pass_filter_enable" value ="">Enable</span>
																					<span id = "pcm_high_pass_filter_disable" value ="">Disable</span>
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
																				<p> Allows you to Enable or Disable the PCM High-pass Filter : </p>
																				<hr>
																				<ul> <li> Enable : </li> </ul>
																				<p> This Control is allowed to Enable the PCM High-Pass Filter.  </p>
																				<hr>
																				<ul> <li> Disable : </li> </ul>
																				<p> This Control is allowed to Disable the PCM High-Pass Filter.  </p>
																			</div>
																		</div>
																	  </div>
														                       </div>
																   <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("PCM Nonoversample Emulate", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label> PCM Nonoversample Emulate :</label>
																	</div>
																	<div class="col-md-6 col-sm-4 col-xs-12 right-input">
																		<div class="switch">
																			<label class="switch-light" onclick="">
																				<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" id = "pcm_nonoversample_val" name = "pcm_nonoversample_val" value = "">
																				<input type="checkbox" id = "pcm_nonoversample" name = "pcm_nonoversample" value = "">
																				<span>
																					<span id = "pcm_nonoversample_enbale" value ="">Enable</span>
																					<span id = "pcm_nonoversample_disable" value ="">Disable</span>
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
																				<p> Allows you to Enable or Disable the PCM Nonoversample Emulate.  </p>
																				<hr>
																				<ul> <li> Enable : </li> </ul>
																				<p> This Control is allowed to Enable the PCM Nonoversample Emulate.  </p>
																				</p>
																				<hr>
																				<ul> <li> Disable : </li> </ul>
																				<p> This Control is allowed to Disable the PCM Nonoversample Emulate.  </p>
																			</div>
																		</div>
																	  </div>
														                       </div>
																   <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("PCM Phase Compensation", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label> PCM Phase Compensation :</label>
																	</div>
																	<div class="col-md-6 col-sm-4 col-xs-12 right-input">
																		<div class="switch">
																			<label class="switch-light" onclick="">
																				<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" id = "pcm_phase_compensation_val" name = "pcm_phase_compensation_val" value = "">
																				<input type="checkbox" id = "pcm_phase_compensation" name = "pcm_phase_compensation" value = "">
																				<span>
																					<span id = "pcm_phase_compensation_enable" value ="">Enable</span>
																					<span id = "pcm_phase_compensation_disable" value ="">Disable</span>
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
																				<p> Allows you to Enable or Disable the PCM Phase Compensation.  </p>
																				<hr>
																				<ul> <li> Enable : </li> </ul>
																				<p> This Control is allowed to Enable the PCM Phase Compensation.  </p>
																				</p>
																				<hr>
																				<ul> <li> Disable : </li> </ul>
																				<p> This Control is allowed to Disable the PCM Phase Compensation.  </p>
																			</div>
																		</div>
																	  </div>
														                       </div>
																   <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero" <?php if(!(in_array("HV_Enable", $amixerCtrlList))) { ?> style="display: none;" <?php } ?>>
																	<div class="col-md-4 col-sm-6 col-xs-12 left-label">
																		<label> HV_Enable :</label>
																	</div>
																	<div class="col-md-6 col-sm-4 col-xs-12 right-input">
																		<div class="switch">
																			<label class="switch-light" onclick="">
																				<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" id = "hv_enable_val" name = "hv_enable_val" value = "">
																				<input type="checkbox" id = "hv_enable" name = "hv_enable" value = "">
																				<span>
																					<span id = "hv_enable_enable" value ="">Enable</span>
																					<span id = "hv_enable_disable" value ="">Disable</span>
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
																				<p> Allows you to Enable or Disable the HV_Enable.  </p>
																				<hr>
																				<ul> <li> Enable : </li> </ul>
																				<p> This Control is allowed to Enable the HV_Enable.  </p>
																				</p>
																				<hr>
																				<ul> <li> Disable : </li> </ul>
																				<p> This Control is allowed to Disable the HV_Enable.  </p>
																			</div>
																		</div>
																	  </div>
														                       </div>
															<!-- // Alsamixer controls --!>
																<!-- // Save Alsamixer options --!>
			<div class = "display">
				<div class="col-md-12 col-sm-12 col-xs-12 left-label">
					<div class="panel-body">
						<label>Please click on save changes button to implement the Alsa Mixer control changes done</label>
					</div>
				</div>
			</div>
																<!-- // Save Alsamixer options --!>
															</div>
														</div>
													</div>
<!-- // Alsa Mixer end --!>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="cpuGovernor">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseCpuGovernor" aria-expanded="true" aria-controls="collapseCpuGovernor">
												CPU Governor
											</a>
										</h4>
									</div>
									<div id="collapseCpuGovernor" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="cpuGovernor">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>CPU Governor :</label>
												</div>
												<div class = "col-md-8 col-sm-6 col-xs-12 edit-input-row padding-all-zero">
													<div class="col-md-12 col-sm-12 col-xs-12 right-input appearance">
														<?php
															$str1 = 'ondemand';
															$str2 = 'conservative';
															$str3 = 'performance';
															$str4 = 'powersave';
														?>
														<div class="col-md-10 col-sm-12 col-xs-12 right-input">
															<select class="form-control" name = "cpuGovernor" id = "cpu">
																<!-- <option value = "">Select</option> -->
																<option value = "ondemand" @if($cpuGovernor =='ondemand'){{"selected"}} @endif>ondemand</option>
																<option value = "conservative" <?php if($cpuGovernor == $str2) { echo "selected"; } ?>>conservative</option>
																<option value = "performance" <?php if($cpuGovernor == $str3) { echo "selected"; } ?>>performance</option>
																<option value = "powersave" <?php if($cpuGovernor == $str4) { echo "selected"; } ?>>powersave</option>
															</select>
														</div>
														<div class="col-md-2 col-sm-4 col-xs-12">
															<div class="naoTooltip-wrap">
																<span>
																	<i class="fa fa-question-circle" style="font-size:24px;color:white">
																	</i>
																</span>
																<div class="naoTooltip nt-bottom nt-small">
																	<p>
																		Changing the CPU governor will allow you to control system response, performance, heat and power consumption.
																	</p>
																	<hr>
																	<ul>
																		<li>
																			Ondemand (Recommended)
																		</li>
																	</ul>
																	<p>
																		Dynamic CPU frequency based on usage. CPU frequency is increased when system is under load, decreased when system is idle.
																	</p>
																	<hr>
																	<ul>
																		<li>
																			Conservative
																		</li>
																	</ul>
																	<p>
																		Same as ondemand, with a bias towards powersaving, slower up scaling of CPU frequencies when under load.
																	</p>
																	<hr>
																	<ul>
																		<li>
																			Powersave
																		</li>
																	</ul>
																	<p>
																		Disables CPU frequency scaling. Limits the CPU to run at the minimum speed, offering reduced power consumption, heat and performance.
																	</p>
																	<hr>
																	<ul>
																		<li>
																			Performance
																		</li>
																	</ul>
																	<p>
																		Disables CPU frequency scaling. Forces the CPU to run at the maximum speed, offering increased power consumption, heat and performance.
																	</p>
																</div>
															</div>
														</div>
													</div>
													<!-- <div class="col-md-4 col-sm-4 col-xs-12">
														<button class="btn green_btn">
															<span class="fa fa-spinner" aria-hidden="true"></span>Reboot
														</button>
													</div> -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="swapFile">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSwapFile" aria-expanded="true" aria-controls="collapseSwapFile">
												SwapFile Size
											</a>
										</h4>
									</div>
									<div id="collapseSwapFile" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="swapFile">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>SwapFile Size :</label>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 block_btns">
													<div class="col-md-10 col-sm-4 col-xs-12">
														<input class="range-example-input-2" id="swap-size-range" type="text" min="0" max="5000" value="{{$rangeVal}}" name="points" step="1" />
														<input type = "hidden" id = "chag_sort" val = "" name = "chag_sort">
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<p>
																	Swapfile is a reserve memory store, on disk, when free memory (RAM) is running low.
																</p>
																<p>
																	The goal of the swapfile is to prevent "out of memory" errors, which can occur when resource hungry applications are utilizing memory.
																</p>
																<p>
																	Use the slider to set a swapfile size:
																</p>
																<hr>
																<ul>
																	<li>
																		Setting a value of "0" will disable the swapfile.
																	</li>
																</ul>
																<p>
																	This is recommended for advanced users who can manage their systems memory (RAM) allocations.
																</p>
																<hr>
																<ul>
																	<li>
																		Any other value will set the swapfile size accordingly.
																	</li>
																</ul>
																<p>
																	Creating a memory reserve, for when free memory (RAM) is running low.
																</p>
																<hr>
																<p>
																	We suggest the following, for calculating recommended size:
																</p>
																<ul>
																	<li>
																		2048(MB) minus "Total RAM (MB)" | eg: 1024 RAM = 1024 SWAP
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default" id = "updateDiet" >
									<div class="panel-heading" role="tab" id="Update1">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUpdate1" aria-expanded="true" aria-controls="collapseUpdate1">
												DietPi Version / Update
											</a>
										</h4>
									</div>
									<div id="collapseUpdate1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Update1">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Current Version :</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<div class="col-md-10 col-sm-4 col-xs-12">
														<label>v<?php echo $currentversionDietPi ?></label>
														<?php if ( $updateDietPiStatus != NULL ) { ?>
															<label> - (Update available):</label>
															<span class="btn green_btn">
																<a href="https://dietpi.com/phpbb/viewtopic.php?p=9218#p9218" target="_blank" style="color:white"> <span class="fa fa-undo"></span>Update Now</a>
															</span>
														<?php } ?>
													</div>
													<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span><i class="fa fa-question-circle" style="font-size:24px;color:white"></i></span>
															<div class="naoTooltip nt-bottom nt-small">
																<p>Allows you to update your device with the latest version of DietPi.</p>
																<p>Updates will patch your system, which include bug fixes, performance enhancements and more.</p>
																<hr>
																<ul><li>When updates are available:</li></ul>
																<p>You will be offered the ability to update.</p>
																<p>Selecting this option will update your system, to the latest version of DietPi. Please note this may take time to complete, do not refresh or exit the page.</p>
																<hr>
																<ul><li>When updates are not available:</li></ul>
																<p>Your system is currently running the latest version of DietPi.</p>
																<p>The version number will also be shown.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="Power">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsePower" aria-expanded="true" aria-controls="collapsePower">
											Power Control
										</a>
									</h4>
								</div>
								<div id="collapsePower" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Power">
									<div class="panel-body">
										<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
											<div class="col-md-4 col-sm-6 col-xs-12 left-label">
												<label>Power Off System :</label>
											</div>
											<div class="col-md-8 col-sm-6 col-xs-12 right-input">
												<div class="col-md-10 col-sm-4 col-xs-12">
													<span class="btn red_btn" id = "power">
														<span class="fa fa-power-off" aria-hidden="true"></span>Poweroff
													</span>
												</div>
												<div class="col-md-2 col-sm-4 col-xs-12">
														<div class="naoTooltip-wrap">
															<span>
																<i class="fa fa-question-circle" style="font-size:24px;color:white">
																</i>
															</span>
															<div class="naoTooltip nt-bottom nt-small">
																<p>
																	This option allows you to correctly shutdown the system.
																</p>
															</div>
														</div>
													</div>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
											<div class="col-md-4 col-sm-6 col-xs-12 left-label">
												<label>Reboot System :</label>
											</div>
											<div class="col-md-8 col-sm-6 col-xs-12 right-input">
												<div class="col-md-10 col-sm-4 col-xs-12">
													<span class="btn green_btn" id = "reeboot">
														<span class="fa fa-spinner" aria-hidden="true"></span>Reboot
													</span>
												</div>
												<div class="col-md-2 col-sm-4 col-xs-12">
													<div class="naoTooltip-wrap">
														<span>
															<i class="fa fa-question-circle" style="font-size:24px;color:white">
															</i>
														</span>
														<div class="naoTooltip nt-bottom nt-small">
															<p>
																This option allows you to reboot the system.
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
			</div>
				<!-- <div class="col-md-12 col-sm-12 col-xs-12 bottom_btn">
					<button class="btn white_btn" id = "sve-chngs">Save changes</button>
				</div> -->
				<div class = "display" style = "display:none">
					<div class="col-md-12 col-sm-12 col-xs-12 left-label">
						<div class="panel-body">
							<label>Please click on save changes button to implement the changes done</label>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 right-input">
						<button class="btn green_btn" id = "sve-chngs">
							<span class="fa fa-spinner" aria-hidden="true"></span>Save Changes
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<input type="hidden" value="{{ csrf_token() }}" id="token">
<?php
	$hostName = preg_replace('/\s+/', '', $hostName);
	$selectoption = preg_replace('/\s+/', '', $selectoption);
	$rangeVal = preg_replace('/\s+/', '', $rangeVal);
	$ipAddress = preg_replace('/\s+/', '', $ipAddress);
	$ipGateway = preg_replace('/\s+/', '', $ipGateway);
	$ipMask = preg_replace('/\s+/', '', $ipMask);
	$ipDns = preg_replace('/\s+/', '', $ipDns);
	$Master = trim($Master);
	$Digital = trim($Digital);
	$pcm_de_emphasis_filter = trim($pcm_de_emphasis_filter);
	$pcm_filter_speed = trim($pcm_filter_speed);
	$pcm_high_pass_filter = trim($pcm_high_pass_filter);
	$pcm_nonoversample = trim($pcm_nonoversample);
	$pcm_phase_compensation = trim($pcm_phase_compensation);
	$hv_enable = trim($hv_enable);
?>
<script>
	$(document).ready(function() {
		$('.naoTooltip-wrap').naoTooltip();

		var Master = "<?php echo $Master; ?>";
		$('#master_chng_val').val(Master);

		var Digital = "<?php echo $Digital; ?>";
		$('#digital_chng_val').val(Digital);

		var pcm_de_emphasis_filter = "<?php echo $pcm_de_emphasis_filter; ?>";
		if(pcm_de_emphasis_filter == 'off') {
			$('#pcm_de_emphasis').prop('checked',true);
			$('#pcm_de_emphasis_val').val('off');
		}else{
			$('#pcm_de_emphasis').prop('checked',false);
			$('#pcm_de_emphasis_val').val('on');
		}

		var pcm_filter_speed = "<?php echo $pcm_filter_speed; ?>";
		if(pcm_filter_speed == "'Slow'") {
			$('#pcm_filter_speed').prop('checked',true);
			$('#pcm_filter_speed_val').val('Slow');
		}else{
			$('#pcm_filter_speed').prop('checked',false);
			$('#pcm_filter_speed_val').val('Fast');
		}

		var pcm_high_pass_filter = "<?php echo $pcm_high_pass_filter; ?>";
		if(pcm_high_pass_filter == 'off') {
			$('#pcm_high_pass_filter').prop('checked',true);
			$('#pcm_high_pass_filter_val').val('off');
		}else{
			$('#pcm_high_pass_filter').prop('checked',false);
			$('#pcm_high_pass_filter_val').val('on');
		}

		var pcm_nonoversample = "<?php echo $pcm_nonoversample; ?>";
		if(pcm_nonoversample == 'off') {
			$('#pcm_nonoversample').prop('checked',true);
			$('#pcm_nonoversample_val').val('off');
		}else{
			$('#pcm_nonoversample').prop('checked',false);
			$('#pcm_nonoversample_val').val('on');
		}

		var pcm_phase_compensation = "<?php echo $pcm_phase_compensation; ?>";
		if(pcm_phase_compensation == 'off') {
			$('#pcm_phase_compensation').prop('checked',true);
			$('#pcm_phase_compensation_val').val('off');
		}else{
			$('#pcm_phase_compensation').prop('checked',false);
			$('#pcm_phase_compensation_val').val('on');
		}

		var hv_enable = "<?php echo $hv_enable; ?>";
		if(hv_enable == 'off') {
			$('#hv_enable').prop('checked',true);
			$('#hv_enable_val').val('off');
		}else{
			$('#hv_enable').prop('checked',false);
			$('#hv_enable_val').val('on');
		}

//		$(".range-example-input-2").asRange({
		$("#swap-size-range").asRange({
			range: false,
			limit: false,
		      //   onChange:function() {
		      //   	$('#overlay').show();
				// var token= $('#token').val();
				// var val = $('.asRange-tip').text();
		      //      	$.ajax({
		      //      		method:'Post',
		      //      		data:{_token:token,val:val},
		      //      		url:"{{ url('/user/swapFileSize') }}",
		      //      		success:function(resp){
		      //      			$('#overlay').hide();
		      //      			$('#alertFile').css('display','block');
		      //      		}
		      //      });
		      //   },
			onChange:function(e) {
				$(".display").css('display','block');
				var sort2 = this.value;
				$('#chag_sort').val(sort2);
			},
		});

		$("#master-range").asRange({
			range: false,
			limit: false,
			onChange:function(e) {
				$(".display").css('display','block');
				var master_val = this.value;
				$('#master_chng_val').val(master_val);
			},
		});
		$("#digital-range").asRange({
			range: false,
			limit: false,
			onChange:function(e) {
				$(".display").css('display','block');
				var digital_val = this.value;
				$('#digital_chng_val').val(digital_val);
			},
		});


		$("#pcm_de_emphasis").click(function () {
		    $(".display").css('display','block');
		    if ($("#pcm_de_emphasis").is(':checked')) {
		            $(this).prop("checked", true);
			    $("#pcm_de_emphasis_val").val('off');
		    } else {
			    $(this).prop("checked", false);
			    $("#pcm_de_emphasis_val").val('on');
		    }
		});

		$("#pcm_filter_speed").click(function () {
		    $(".display").css('display','block');
		    if ($("#pcm_filter_speed").is(':checked')) {
		            $(this).prop("checked", true);
			    $("#pcm_filter_speed_val").val('Slow');
		    } else {
			    $(this).prop("checked", false);
			    $("#pcm_filter_speed_val").val('Fast');
		    }
		});

		$("#pcm_high_pass_filter").click(function () {
		    $(".display").css('display','block');
		    if ($("#pcm_high_pass_filter").is(':checked')) {
		            $(this).prop("checked", true);
			    $("#pcm_high_pass_filter_val").val('off');
		    } else {
			    $(this).prop("checked", false);
			    $("#pcm_high_pass_filter_val").val('on');
		    }
		});

		$("#pcm_nonoversample").click(function () {
		    $(".display").css('display','block');
		    if ($("#pcm_nonoversample").is(':checked')) {
		            $(this).prop("checked", true);
			    $("#pcm_nonoversample_val").val('off');
		    } else {
			    $(this).prop("checked", false);
			    $("#pcm_nonoversample_val").val('on');
		    }
		});

		$("#pcm_phase_compensation").click(function () {
		    $(".display").css('display','block');
		    if ($("#pcm_phase_compensation").is(':checked')) {
		            $(this).prop("checked", true);
			    $("#pcm_phase_compensation_val").val('off');
		    } else {
			    $(this).prop("checked", false);
			    $("#pcm_phase_compensation_val").val('on');
		    }
		});
		$("#hv_enable").click(function () {
		    $(".display").css('display','block');
		    if ($("#hv_enable").is(':checked')) {
		            $(this).prop("checked", true);
			    $("#hv_enable_val").val('off');
		    } else {
			    $(this).prop("checked", false);
			    $("#hv_enable_val").val('on');
		    }
		});


	    function getVal(val){
	        window.location.href="?selected="+val
	    }

	    var selectoption = '<?php echo $selectoption?>';
	    if(selectoption == '1') {
	    	$('.address').addClass('faded');
	    	$('.address').css('attr','readonly');

	    }

	    $('#sve-chngs').on('click',function() {
			$("#system_settings").validate({
				rules: {
		            host: "required"
		        },
		        messages: {
		            host: "Please fill the hostname"
		        },
		        submitHandler: function(form){
		        	$('#overlay').show();
		        	form.submit();
		        }
			})
		});

		$('#dhstc').on('change', function() {
			var selectoption = '<?php echo $selectoption?>';
			var newSelectOption = this.value ;

			if(newSelectOption == 'static') {
				var newSelectOption = 0;
				$('.address').attr('readonly',false);
				$('.gateway').attr('readonly',false);
				$('.mask').attr('readonly',false);
				$('.dns').attr('readonly',false);
				$('.address').removeClass('faded');
				$('.gateway').removeClass('faded');
				$('.mask').removeClass('faded');
				$('.dns').removeClass('faded');
			} else if(newSelectOption == 'dhcp') {
				var newSelectOption = 1;
				$('.address').attr('readonly',true);
				$('.gateway').attr('readonly',true);
				$('.mask').attr('readonly',true);
				$('.dns').attr('readonly',true);
				$('.address').addClass('faded');
				$('.gateway').addClass('faded');
				$('.mask').addClass('faded');
				$('.dns').addClass('faded');
			}

			if(selectoption != newSelectOption) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});

		$('#address').keyup(function() {
			var address = '<?php echo $ipAddress ?>';
			var newAddress = this.value;
			if(address != newAddress) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});
		$('.gateway').keyup(function() {
			var gateway = '<?php echo $ipGateway ?>';
			var newGateway = this.value;
			if(gateway != newGateway) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});
		$('.mask').keyup(function() {
			var mask = '<?php echo $ipMask ?>';
			var newMask = this.value;
			if(mask != newMask) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});
		$('.dns').keyup(function() {
			var dns = '<?php echo $ipDns ?>';
			var newDns = this.value;
			if(dns != newDns) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});

		if(selectoption == 0) {
			$('.address').attr('readonly',false);
			$('.gateway').attr('readonly',false);
			$('.mask').attr('readonly',false);
			$('.dns').attr('readonly',false);
			$('.address').removeClass('faded');
			$('.gateway').removeClass('faded');
			$('.mask').removeClass('faded');
			$('.dns').removeClass('faded');
		}

		$('#sound').on('change', function() {

			var soundCard = '<?php echo $soundCard?>';
			var newSoundCard = this.value ;
			// $('#overlay').show();
			// var token= $('#token').val();
			// var val = $( "#sound option:selected" ).text();
   //          $.ajax({
   //              type: 'POST',
   //              url: "{{url ('/user/updateSoundCard')}}",
   //              data:{_token:token,val:val},

   //              success: function(resp) {
   //          		$('#overlay').hide();
   //          		$('#alertSound').css('display','block');
   //              }
   //          });
			if(soundCard != newSoundCard) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});

		$('#cpu').on('change', function() {
			var cpuGovernor = '<?php echo $cpuGovernor?>';
			var newcpuGovernor = this.value ;
			if(cpuGovernor != newcpuGovernor) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});

		$('#hstNm').keyup(function() {
			var hostName = '<?php echo $hostName ?>';
			var newHostName = this.value;
			if(hostName != newHostName) {
				$(".display").css('display','block');
			} else {
				$(".display").css('display','none');
			}
		});

        $("#updateDietPi").click(function(event){
        	// event.preventDefault();
        	$('#overlay').show();
            $.ajax({
                type: 'POST',
                url: "{{url ('/user/updateDietPi')}}",
                data:{
                	"_token": "{{ csrf_token() }}"
                },

                success: function(resp) {
                	//if(data == 1) {
                		$('#overlay').hide();
						window.scrollTo(0, 0);
                		$('#alertSuccess').css('display','block');
                		$('#updateDiet').css('display','none');
                	//}
                }
            });
	   	});

    	$("#reeboot").click(function(event){
        	//event.preventDefault();
        	$('#overlay').show();
            $.ajax({
                type: 'POST',
                url: "{{url ('/user/reeboot')}}",
                data:{
                	"_token": "{{ csrf_token() }}"
                },
                success: function(data) {

					$('#overlay').hide();

					//location.reload(true);
					window.scrollTo(0, 0);
					$('#alertReeboot').css('display','block');
                }
            });
	   	});

    	$("#power").click(function(event){
        	//event.preventDefault();
        	$('#overlay').show();
            $.ajax({
                type: 'POST',
                url: "{{url ('/user/power')}}",
                data:{
                	"_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                	if(data == 1) {
                		$('#overlay').hide();
                		$('#alertPower').css('display','block');
                	}
                }
            });
	});
    });

</script>
@endsection