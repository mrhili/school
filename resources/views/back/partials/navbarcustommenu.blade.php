      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          {{--
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->

                          {!! Html::image(CommonPics::ifImg( ArrayHolder::roles_routing( Auth::user()->role ) ,  Auth::user()->img ),'User Image', ['class' => 'img-circle'] ) !!}



                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          --}}
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          {{--
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          --}}
          <!-- Tasks Menu -->
          {{--
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>

          --}}
          <!-- User Account Menu -->

          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-language"></i>
              <span class="label label-info">{{ session('locale') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Changer le language</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">


                @foreach(config('app.locales') as $l => $locale)

                  @if($l != Session::get('locale') )

                  

                  <li><!-- Task item -->
                    <a href="{{ route('locals.change', $l) }}">
                      <!-- Task title and progress text -->
                      <h3>
                        {{ $locale }}
                        <small class="pull-right">{{ $l }}</small>
                      </h3>
                      <!-- The progress bar -->
                    </a>
                  </li>

                  @endif


                @endforeach









                  <!-- end task item -->
                </ul>
              </li>

            </ul>
          </li>



          @guest

          @else




          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              {!! Html::image(CommonPics::ifImg( ArrayHolder::roles_routing( Auth::user()->role ) ,  Auth::user()->img ),'User Image', ['class' => 'user-image'] ) !!}
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">

                {!! Html::image(CommonPics::ifImg( ArrayHolder::roles_routing( Auth::user()->role ) ,  Auth::user()->img ),'User Image', ['class' => 'img-circle'] ) !!}
                <p>
                  {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                  <small>{{ ArrayHolder::roles(  Auth::user()->role  )}}</small>
                </p>
              </li>
              <!-- Menu Body -->


                <div class="row">
                @forelse(config('app.locales') as $locale)


                  @if($locale != session('locale'))
                      <div class="col-xs-4 text-center">
                        <a href="{{ route('locals.change', $locale) }}">{{ $locale }}</a>
                      </div>
                  @endif

                @empty

                <div class="col-xs-4 text-center">
                    There is no language
                  </div>

                @endforelse




                </div>

                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('my-profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" id="logoutbutton" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <form id="logoutform" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>



        @endguest


          <!-- Control Sidebar Toggle Button -->

          @if( !empty( $outside_links ) )

            @if( !in_array ( \Request::route()->getName() , $outside_links ) )
              <li>

                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            @endif

          @else

            <li>

              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>

          @endif



        </ul>
      </div>
