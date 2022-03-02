<?php

namespace App\Http\Controllers;

use Redirect;
use App\User;
use Auth;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;

class AccountController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function Index() {
		$current_date = date("M d, Y");
		$current_time = date("h:i a");
		$ipaddress = exec("TERM=linux ip a s eth0 | grep -m1 '^[[:blank:]]*inet ' | mawk '{print $2}' | sed 's|/.*$||'");
		$hostName = exec("TERM=linux cat /etc/hostname");
		$soundCard = exec("TERM=linux sed -n '/^CONFIG_SOUNDCARD=/{s/^[^=]*=//p;q}' /boot/dietpi.txt");

		$amixerCtrlList = (array) null;
		if(trim($soundCard) == "allo-boss2-dac-audio" ) {
			$list = exec("TERM=linux sudo amixer -c Boss2 | grep \"Simple mixer control\"  | cut -f1 -d, | cut -f2 -d\' ");
			$ctrlList = explode("\n", $list);
			$amixerCtrlList = array_filter($ctrlList);
		}

		$Master = '';
		$Digital = '';
		$pcm_de_emphasis_filter= '';
		$pcm_filter_speed = '';
		$pcm_high_pass_filter= '';
		$pcm_nonoversample= '';
		$pcm_phase_compensation= '';
		$hv_enable= '';

		if(trim($soundCard) == "allo-boss2-dac-audio" ) {
			if (in_array("Master", $amixerCtrlList)) {
				//error_log(" can set master is thr ",0);
				$Master = exec("TERM=linux sudo amixer -c Boss2  get 'Master' | grep 'Front Left:' | cut -f1  -d% | cut -f2 -d[");
			}
			if (in_array("Digital", $amixerCtrlList)) {
				//error_log(" can set digital is thr ",0);
				$Digital = exec("TERM=linux sudo amixer -c Boss2  get 'Digital' | grep 'Front Left:' | cut -f1  -d% | cut -f2 -d[");
			}
			if (in_array("PCM De-emphasis Filter", $amixerCtrlList)) {
				//error_log(" can set PCM De-emphasis Filter is thr ",0);
				$pcm_de_emphasis_filter= exec("TERM=linux sudo amixer -c Boss2  get 'PCM De-emphasis Filter' | grep 'Mono:' | cut -f1 -d] | cut -f2 -d[");
			}
			if (in_array("PCM Filter Speed", $amixerCtrlList)) {
				//error_log(" can set PCM Filter Speed is thr ",0);
				$pcm_filter_speed = exec("TERM=linux sudo amixer -c Boss2  get 'PCM Filter Speed' | grep 'Item0:' | cut -f2 -d:");
			}
			if (in_array("PCM High-pass Filter", $amixerCtrlList)) {
				//error_log(" can set PCM High-pass Filter is thr ",0);
				$pcm_high_pass_filter= exec("TERM=linux sudo amixer -c Boss2  get 'PCM High-pass Filter' | grep 'Mono:' | cut -f1 -d] | cut -f2 -d[");
			}
			if (in_array("PCM Nonoversample Emulate", $amixerCtrlList)) {
				//error_log(" can set PCM Nonoversample Emulate is thr ",0);
				$pcm_nonoversample= exec("TERM=linux sudo amixer -c Boss2  get 'PCM Nonoversample Emulate' | grep 'Mono:' | cut -f1 -d] | cut -f2 -d[");
			}
			if (in_array("PCM Phase Compensation", $amixerCtrlList)) {
				//error_log(" can set PCM Phase Compensation is thr ",0);
				$pcm_phase_compensation= exec("TERM=linux sudo amixer -c Boss2  get 'PCM Phase Compensation' | grep 'Mono:' | cut -f1 -d] | cut -f2 -d[");
			}
			if (in_array("HV_Enable", $amixerCtrlList)) {
				//error_log(" can set HV_Enable is thr ",0);
				$hv_enable= exec("TERM=linux sudo amixer -c Boss2  get 'HV_Enable' | grep 'Mono:' | cut -f1 -d] | cut -f2 -d[");
			}
		}

		$mpd_status = rtrim(exec("TERM=linux systemctl is-active mpd"));
		$mpdNativeOutput = exec("TERM=linux grep -cim1 '^format ' /etc/mpd.conf");
		if ($mpdNativeOutput == 0) {
			$outputFrequencies = 'Native';
			$bitDepth = 'Native';
		} else {
			$outputFrequencies = exec("TERM=linux sudo grep -m1 'format ' /etc/mpd.conf | sed 's/\"//g' | sed 's/:/ /g' | mawk '{print $2}'");
			$outputFrequencies = "$outputFrequencies Hz";
			$bitDepth = exec("TERM=linux sudo grep -m1 'format ' /etc/mpd.conf | sed 's/\"//g' | sed 's/:/ /g' | mawk '{print $3}'");
		}

		$roon_status = rtrim(exec("TERM=linux systemctl is-active roonbridge"));

		$daemon_status = rtrim(exec("TERM=linux systemctl is-active networkaudiod"));

		$wifiStatus = rtrim(exec("TERM=linux systemctl is-active hostapd"));

		$currentSSID = exec("TERM=linux sudo sed -n '/^ssid=/{s/^[^=]*=//p;q}' /etc/hostapd/hostapd.conf");
		$currentPasskey = exec("TERM=linux sudo sed -n '/^wpa_passphrase=/{s/^[^=]*=//p;q}' /etc/hostapd/hostapd.conf");

		$shairPortStatus = rtrim(exec("TERM=linux systemctl is-active shairport-sync"));
		$outputFrequencies_shair = exec("TERM=linux sudo grep -m1 'output_rate' /usr/local/etc/shairport-sync.conf | sed 's/\///g' | mawk '{print $3}' | sed 's/\;//g'");
		$bitDepth_shair = exec("TERM=linux sudo grep -m1 'output_format' /usr/local/etc/shairport-sync.conf | sed 's/\///g' | mawk '{print $3}' | sed 's/\;//g' | sed 's/\"//g' | sed 's/S//g'");

		$cpu_temp = exec("TERM=linux . /boot/dietpi/func/dietpi-globals; G_INTERACTIVE=0 G_OBTAIN_CPU_TEMP");

		$gmrenderStatus = rtrim(exec("TERM=linux systemctl is-active gmrender"));

		$netdataStatus = rtrim(exec("TERM=linux systemctl is-active netdata"));

		$squeezeliteStatus = rtrim(exec("TERM=linux systemctl is-active squeezelite"));

		if (file_exists('/lib/systemd/system/squeezelite.service')) {
			$bitDepth_squeezelite = (string) trim(exec("TERM=linux grep -m1 '^ExecStart=' /lib/systemd/system/squeezelite.service | mawk '{print $3}' | sed 's/:/ /g' | mawk '{print $3}'"));
		} else {
			$bitDepth_squeezelite = 16;
		}

		return view('frontend.dashboard')->with(['ipAddress' => $ipaddress, 'current_date' => $current_date, 'current_time' => $current_time, 'ipaddress' => $ipaddress, 'hostName' => $hostName, 'soundCard' => $soundCard, 'Master' => $Master, 'Digital' => $Digital, 'pcm_de_emphasis_filter' => $pcm_de_emphasis_filter, 'pcm_filter_speed' => $pcm_filter_speed, 'pcm_high_pass_filter' => $pcm_high_pass_filter, 'pcm_nonoversample' => $pcm_nonoversample, 'pcm_phase_compensation' => $pcm_phase_compensation, 'hv_enable' => $hv_enable, 'mpd_status'=>$mpd_status, 'outputFrequencies'=>$outputFrequencies,'bitDepth'=>$bitDepth,'roon_status'=>$roon_status, 'daemon_status' =>$daemon_status,'wifiStatus'=>$wifiStatus,'currentSSID'=>$currentSSID, 'currentPasskey'=>$currentPasskey,'shairPortStatus'=>$shairPortStatus,'cpu_temp' =>$cpu_temp, 'outputFrequencies_shair'=>$outputFrequencies_shair,'bitDepth_shair'=>$bitDepth_shair, 'mpdNativeOutput'=>$mpdNativeOutput, 'gmrenderStatus'=>$gmrenderStatus, 'netdataStatus'=>$netdataStatus, 'squeezeliteStatus'=>$squeezeliteStatus, 'bitDepth_squeezelite'=>$bitDepth_squeezelite]);
	}

	public function ssh_login(Request $request) {
		if (!empty($request->all())) {
			echo 'Hotspot Password is: ' . exec("TERM=linux sudo sed -n '/^wpa_passphrase=/{s/^[^=]*=//p;q}' /etc/hostapd/hostapd.conf");
			$hotspotstatus = exec("TERM=linux; sudo systemctl unmask hostapd; sudo systemctl restart hostapd");
			if ($hotspotstatus == 0) {
				$hotspot_status = 'Inactive';
			} elseif ($hotspotstatus == 1) {
				$hotspot_status = 'Active';
			}
		} else {
			return view('ssh_login');
		}
	}
}