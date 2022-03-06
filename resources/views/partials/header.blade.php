<div class="header-outr">
    <div class="header-inr">
        <div class="header-cont">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-5 col-sm-12 col-xs-12 header-left">
                    <a href="{{url('/')}}" class="col-md-4 col-sm-12 col-xs-12 logo"><img src="{{ asset('img/white-logo.png') }}" class="img-responsive"></a>
                    <!-- <div class="input-group col-md-7 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-remove"></i></button>
                        </div>
                    /div> -->
                    Allo Web Interface
                    <p><?php echo exec("TERM=linux; . /boot/dietpi/.hw_model; echo \$G_HW_MODEL_NAME"); ?></p>
                    <div class="date"><span class="glyphicon glyphicon-calendar" aria-hidden="true">&nbsp;</span><?php echo "$current_date"; ?></div>
                </div>

                <div class="col-md-7 col-sm-12 col-xs-12 header-right">
                    <div class="col-md-4 col-sm-4 col-xs-12 right-dropmenu">
                      <span><img src="{{ asset('img/user-icon.png') }}"></span>
                      <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        {{ Auth::user()->name }} <span class="fa fa-caret-down" aria-hidden="true"></span>
                      </a>
                      <ul class="dropdown-menu">
                       <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                       </li>
                      </ul>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>