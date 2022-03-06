@extends('layouts.frontend_layout')

@section('title', 'SHAIRPORT-SYNC SETTINGS')

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
                    <h1>SHAIR PORT SETTINGS<h1>
                </div>
            </div>
            <form id = "shair_port_settings" method="post" action="{{ url('user/changeShairPortSettings') }}">
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
                                                            <input type="hidden" name="shairPortStatus" value="no">
                                                            <input type="checkbox" id="chk" name="shairPortStatus" value="yes">
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
                                                    <label>Shairport-sync Enable / Disable :</label>
                                                </div>
                                                <div class="col-md-6 col-sm-4 col-xs-12 right-input">
                                                    <div class="switch">
                                                        <label class="switch-light" onclick="">
                                                            <input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="shairPort" value="no">
                                                            <input type="checkbox" id="shairPort" name="shairPort" value = "yes">
                                                            <span>
                                                                <span value ="Active">Enable</span>
                                                                <span value ="Inactive">Disable</span>
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
                                                    <select class="form-control" name = "frequency" id = "frequency">
                                                        <option value="">Select</option>
                                                        <option value="352800" <?php if($outputFrequencies == 352800) { echo "selected"; 
                                                                               } ?>>352800</option>
                                                        <option value="176400" <?php if($outputFrequencies == 176400) { echo "selected"; 
                                                                               }?>>176400</option>
                                                        <option value="88200" <?php if($outputFrequencies == 88200) { echo "selected"; 
                                                                              } ?>>88200</option>
                                                        <option value="44100" <?php if($outputFrequencies == 44100) { echo "selected"; 
                                                                              } ?>>44100</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="naoTooltip-wrap">
                                                        <span>
                                                            <i class="fa fa-question-circle" style="font-size:24px;color:white">
                                                            </i>
                                                        </span>
                                                        <div class="naoTooltip nt-bottom nt-small">
                                                            <p>
                                                                Allows you to control the output frequency of audio playback with ShairPort-Sync.
                                                            </p>
                                                            <hr>

                                                            <ul>
                                                                <li>
                                                                    352KHz = Highest quality output frequency
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li>
                                                                    44.1KHz = Music standard (eg: CD/MP3 audio)
                                                                </li>
                                                            </ul>
                                                            <hr>

                                                            <p>
                                                                For bit-perfect playback, it is recommended to ensure the output frequency and bit depth, matches the source audio.
                                                                To verify realtime output statistics for the ALSA stream, please check the 'ALSA stream output' section in the 'Status' page.
                                                            </p>
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
                                                        <option value="32" <?php if($bitDepth == '32') { echo "selected"; 
                                                                           } ?>>32</option>
                                                        <option value="24" <?php if($bitDepth == '24') { echo "selected"; 
                                                                           } ?>>24</option>
                                                        <option value="24_3BE" <?php if($bitDepth == '24_3BE') { echo "selected"; 
                                                                               } ?>>24_3BE</option>
                                                        <option value="24_3LE" <?php if($bitDepth == '24_3LE') { echo "selected"; 
                                                                               } ?>>24_3LE</option>
                                                        <option value="16" <?php if($bitDepth == '16') { echo "selected"; 
                                                                           } ?>>16</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="naoTooltip-wrap">
                                                        <span>
                                                            <i class="fa fa-question-circle" style="font-size:24px;color:white">
                                                            </i>
                                                        </span>
                                                        <div class="naoTooltip nt-bottom nt-small">
                                                            <p>
                                                                Allows you to control the output bit depth of audio playback with ShairPort-Sync.
                                                            </p>
                                                            <hr>

                                                            <ul>
                                                                <li>
                                                                    32 = Highest quality output bit depth
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li>
                                                                    16 = Music standard (eg: CD/MP3 audio)
                                                                </li>
                                                            </ul>

                                                            <hr>

                                                            <p>
                                                                For bit-perfect playback, it is recommended to ensure the output frequency and bit depth, matches the source audio.
                                                                To verify realtime output statistics for the ALSA stream, please check the 'ALSA stream output' section in the 'Status' page.
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
                    <button class="btn white_btn" id="sve-chngs">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#chk').click(function(){return false;});
        var shairPortStatus = "<?php echo $shairPortStatus ?>";
        var _token = $('.token').val();

        if(shairPortStatus === 'inactive') {
            $('#chk').prop('checked',true);
            $('#shairPort').prop('checked',true);
        }

        $("#shairPort").click(function () {
            if ($("#shairPort").is(':checked')) {
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