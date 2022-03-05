@extends('layouts.frontend_layout')

@section('title', 'Dashboard')

@section('content')
<div class="cont">
	<div class="col-md-12 col-sm-12 col-xs-12 page-main-heading" style="padding-top: 20px">
		<div class="col-md-6 col-sm-6 col-xs-12 heading">
			<h1>Software Options :
			</h1>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
		<div class=" ">
		  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			    <div class="col-md-12 col-sm-6 col-xs-12 padding-all-zero two-boxes">
			    	<div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingTwo">
					        <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							<span <?php echo ($mpd_status=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
							MPD + O!MPD :
							<p style="text-align:center;"><img src="img/mpg-logo.png"/></p>
					        </a>
					      </h4>
					      </div>
					      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
					        <div class="panel-body">
					         <ul>
					         	<li><label>Status :</label><span <?php echo ($mpd_status=='active')?'class="green-text"':'class="red-text"'?>><?php echo $mpd_status; ?></span></li>
							<li><label>Freq :</label><span><?php echo $outputFrequencies; ?></span></li>
							<li><label>Bit :</label><span><?php echo $bitDepth; ?></span></li>
				          	</ul>
					        </div>
					        <div class="edit-option">
				        		<a href="{{url('/user/mpd_settings')}}">View</a>
				        	</div>
					      </div>
					    </div>
				    </div>
				    <div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
						      <div class="panel-heading" role="tab" id="headingThree">
						        <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								<span <?php echo ($roon_status=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
								Roon Bridge :
								<p style="text-align:center;"><img src="img/roon-logo.png"/></p>
						        </a>
						      </h4>
						      </div>
						      <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						        <div class="panel-body">
						         <ul>
						         	<li><label>Status :</label><span <?php echo ($roon_status=='active')?'class="green-text"':'class="red-text"'?>><?php echo $roon_status; ?></span></li>
								<li><label>.</label></li>
								<li><label>.</label></li>
					          	</ul>
						        </div>
						        <div class="edit-option">
						        	<a href="{{url('/user/roon_settings')}}">View</a>
						        </div>
						      </div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingFour">
					        <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
							<span <?php echo ($daemon_status=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
					        NAA Daemon :
							<p style="text-align:center;"><img src="img/naa-logo.png"/></p>
					        </a>
					      </h4>
					      </div>
					      <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
					        <div class="panel-body">
					         	<ul>
					         		<li><label>Status :</label><span <?php echo ($daemon_status=='active')?'class="green-text"':'class="red-text"'?>><?php echo $daemon_status; ?></span></li>
								<li><label>.</label></li>
								<li><label>.</label></li>
					          	</ul>
					        </div>
					        <div class="edit-option">
					        	<a href="{{url('/user/daemon_settings')}}">View</a>
					        </div>
					      </div>
					    </div>
				    </div>
				    <div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
							<?php
								$WiFiHotSpot_Installed =  file_exists("/etc/hostapd/hostapd.conf");
								if (! $WiFiHotSpot_Installed)
								{
									$wifiStatus = 'Not Installed';
									$currentSSID = 'N/A';
									$currentPasskey = 'N/A';
								}
							?>
							<div class="panel-heading" role="tab" id="headingFive">
						        <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
								<span <?php echo ($wifiStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
								WiFi Hotspot :
								<p style="text-align:center;"><img src="img/wifispot.png"/></p>
						        </a>
						      </h4>
						      </div>
						      <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
						        <div class="panel-body">
						         <ul>
					          		<li><label>Status :</label><span <?php echo ($wifiStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo $wifiStatus; ?></span></li>
					          		<li><label>SSID :</label><span><?php echo $currentSSID ; ?></span></li>
					          		<li><label>KEY :</label><span><?php echo $currentPasskey ; ?></span></li>
					          	</ul>
						        </div>
						        <div class="edit-option" <?php if (! $WiFiHotSpot_Installed){ echo 'style="display:none;"'; } ?> >
						        	<a href="{{url('/user/wifi_settings')}}">View</a>
						        </div>
						      </div>
						</div>
					</div>
				</div>
			    <div class="col-md-12 col-sm-6 col-xs-12 padding-all-zero two-boxes">
			    	<div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingSix">
					        <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseFour">
							<span <?php echo ($shairPortStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
							Shairport-Sync :
							<p style="text-align:center;"><img src="img/airplay-logo.png"/></p>
					        </a>
					      </h4>
					      </div>
					      <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
					        <div class="panel-body">
					         	<ul>
								<li><label>Status :</label><span <?php echo ($shairPortStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo $shairPortStatus; ?></span></li>
								<li><label>Freq :</label><span><?php echo $outputFrequencies_shair; ?>Hz</span></li>
								<li><label>Bit :</label><span><?php echo $bitDepth_shair; ?></span></li>
					          	</ul>
					        </div>
					        <div class="edit-option">
					        	<a href="{{url('/user/shair_port_settings')}}">View</a>
					        </div>
					      </div>
					    </div>
				    </div>
			    	<div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingEight">
					        <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
							<span <?php echo ($gmrenderStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
							Gmrender :
							<p style="text-align:center;"><img src="img/gmrender.png"/></p>
					        </a>
					      </h4>
					      </div>
					      <div id="collapseEight" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight">
					        <div class="panel-body">
					         	<ul>
								<li><label>Status :</label><span <?php echo ($gmrenderStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo $gmrenderStatus; ?></span></li>
								<li><label>.</label></li>
								<li><label>.</label></li>
					          	</ul>
					        </div>
					        <div class="edit-option">
					        	<a href="{{url('/user/gmrender_settings')}}">View</a>
					        </div>
					      </div>
					    </div>
				    </div>
			    	<div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingNine">
					        <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
							<span <?php echo ($netdataStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
							NetData :
							<p style="text-align:center;"><img src="img/Netdata_Logo.png"/></p>
					        </a>
					      </h4>
					      </div>
					      <div id="collapseNine" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingNine">
					        <div class="panel-body">
					         	<ul>
								<li><label>Status :</label><span <?php echo ($netdataStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo $netdataStatus; ?></span></li>
								<li><label>.</label></li>
								<li><label>.</label></li>
					          	</ul>
					        </div>
					        <div class="edit-option">
					        	<a href="{{url('/user/netdata_settings')}}">View</a>
					        </div>
					      </div>
					    </div>
				    </div>
			    	<div class="col-md-3 col-sm-3 col-xs-3">
					    <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingTen">
					        <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
							<span <?php echo ($squeezeliteStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo '● '; ?></span>
							Squeezelite :
							<p style="text-align:center;"><img src="img/logitech-logo.png"/></p>
					        </a>
					      </h4>
					      </div>
					      <div id="collapseTen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTen">
					        <div class="panel-body">
					         	<ul>
								<li><label>Status :</label><span <?php echo ($squeezeliteStatus=='active')?'class="green-text"':'class="red-text"'?>><?php echo $squeezeliteStatus; ?></span></li>
								<li><label>.</label></li>
								<li><label>Bit :</label><span><?php echo $bitDepth_squeezelite; ?></span></li>
					          	</ul>
					        </div>
					        <div class="edit-option">
					        	<a href="{{url('/user/squeezelite_settings')}}">View</a>
					        </div>
					      </div>
					    </div>
				    </div>
				</div>
		  	</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 page-main-heading" style="padding-top: 20px">
		<div class="col-md-6 col-sm-6 col-xs-12 heading">
			<h1>System Settings / Status :</h1>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
		<div class=" ">
		  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  	<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero system-settings">
				    <div class="panel panel-default">
				      <div class="panel-heading" role="tab" id="headingOne">
				        <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          System Settings :
				        </a>
				      </h4>
				      </div>
				      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				        <div class="panel-body">
				          	<ul>
				          		<li><label>IP :</label><span><a href="{{url('/user/system_settings')}}"><?php echo $ipaddress; ?></a></span></li>
				          		<li><label>Hostname :</label><span><a href="{{url('/user/system_settings')}}"><?php echo $hostName; ?></a></span></li>
				          		<li><label>Soundcard :</label><span><a href="{{url('/user/system_settings')}}"><?php echo $soundCard; ?></a></span></li>
				          	</ul>
				        </div>
				        <div class="edit-option">
				        	<a href="{{url('/user/system_settings')}}">View</a>
				        </div>
				      </div>
				    </div>
				</div>
			</div>
		  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  	<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero system-settings">
				    <div class="panel panel-default">
				      <div class="panel-heading" role="tab" id="headingEleven">
				        <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
						System Status :
				        </a>
				      </h4>
				      </div>
				      <div id="collapseEleven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEleven">
				        <div class="panel-body">
				          	<ul>
							<li><label>ALSA Output Stream Information :</label><span><a href="{{url('/user/status')}}">View</a></span></li>
							<li><label>NetData System Stats :</label><span><a href="{{url('/user/status')}}">View</a></span></li>
							<li><label>CPU Temperature :</label><span><a href="{{url('/user/status')}}"><?php echo $cpu_temp; ?>'c</a></span></li>
				          	</ul>
				        </div>
				        <div class="edit-option">
				        	<a href="{{url('/user/status')}}">View</a>
				        </div>
				      </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection