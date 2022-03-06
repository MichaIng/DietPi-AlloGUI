@extends('layouts.frontend_layout')

@section('title', 'WIFI HOTSPOT SETTINGS')

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
                    <h1>WIFI HOTSPOT SETTINGS<h1>
                </div>
            </div>
            <form id="wifi_settings" method="post" action="{{ url('user/changeWifiSettings') }}">
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
                                                            <input type="hidden" name="wifiStatus" value="no">
                                                            <input type="checkbox" id="chk" name="wifiStatus" value="yes">
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
                                                    <label>Wifi Enable / Disable :</label>
                                                </div>
                                                <div class="col-md-6 col-sm-4 col-xs-12 right-input">
                                                    <div class="switch">
                                                        <label class="switch-light" onclick="">
                                                            <input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="wifi" value="no">
                                                            <input type="checkbox" id="wifi" name="wifi" value="yes">
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
                                            <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
                                                <div class="col-md-4 col-sm-6 col-xs-12 left-label">
                                                    <label>Wifi SSID :</label>
                                                </div>
                                                <div class="col-md-6 col-sm-4 col-xs-12 right-input">
                                                    <input type="text" class="form-control" id="ssid" name="wifiSsid" value="<?php if(isset($currentSSID) && !empty($currentSSID)) { echo $currentSSID ; 
                                                                                                                             } ?>">
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="naoTooltip-wrap">
                                                        <span>
                                                            <i class="fa fa-question-circle" style="font-size:24px;color:white">
                                                            </i>
                                                        </span>
                                                        <div class="naoTooltip nt-bottom nt-small">
                                                            <p>
                                                                Displays the current and editable, WiFi SSID for the hotspot.
                                                            </p>
                                                            <p>
                                                                The WiFi SSID is the name given to the hotspot. This name will then be displayed when searching for WiFi connections on another device.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
                                                <div class="col-md-4 col-sm-6 col-xs-12 left-label">
                                                    <label>New Wifi SSID</label>
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12 right-input">
                                                    <input type="text" class="form-control" id="ssidChng" name="chngwifi" value = "">
                                                </div>
                                            </div> -->
                                            <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
                                                <div class="col-md-4 col-sm-6 col-xs-12 left-label">
                                                    <label>Passkey :</label>
                                                </div>
                                                <div class="col-md-6 col-sm-4 col-xs-12 right-input">
                                                    <input type="text" class="form-control" id="passkey" name="wifiPasskey" value="<?php if(isset($currentPasskey) && !empty($currentPasskey)) { echo $currentPasskey ; 
                                                                                                                                   } ?>" >
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="naoTooltip-wrap">
                                                        <span>
                                                            <i class="fa fa-question-circle" style="font-size:24px;color:white">
                                                            </i>
                                                        </span>
                                                        <div class="naoTooltip nt-bottom nt-small">
                                                            <p>
                                                                Displays the current and editable, WiFi passkey for the hotspot.
                                                            </p>
                                                            <p>
                                                                The WiFi passkey is required to establish a connection with the hotspot, on another device.
                                                            </p>
                                                            <hr>
                                                            <p>
                                                                NB: The passkey must be at least 8 characters in length, else, the service will fail to run.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
                                                <div class="col-md-4 col-sm-6 col-xs-12 left-label">
                                                    <label>New Passkey</label>
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12 right-input">
                                                    <input type="text" class="form-control" id="passkeyChng" name="chngpasskey" value="">
                                                </div>
                                            </div> -->
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
        var wifiStatus = "<?php echo $wifiStatus ?>";
        var _token = $('.token').val();

        if(wifiStatus === 'inactive') {
            $('#chk').prop('checked',true);
            $('#wifi').prop('checked',true);
        }

        $("#wifi").click(function () {
            if ($("#wifi").is(':checked')) {
                $("#chk").each(function () {
                    $(this).prop("checked", true);
                });

            } else {
                $("#chk").prop("checked", false);
            }
        })

        $('#sve-chngs').on('click',function() {
            $("#wifi_settings").validate({
                rules: {
                    wifiSsid: "required",
                    wifiPasskey: "required"
                },
                messages: {
                    wifiSsid: "Please fill the WIFI SSID",
                    wifiPasskey: "Please fill the Passkey"
                },

                submitHandler: function(form){
                    $('#overlay').show();
                    form.submit();
                }
            })
        });

        $('.naoTooltip-wrap').naoTooltip();
    });
</script>
@endsection