<!-- Main Header -->
<header class="main-header" style="background: black; background-color: black;">

    <!-- Logo -->
    <a href="/" class="logo" style="height: 70px; padding-top:10px;"><img src="/img/logo-white.png" style="height: 30px; margin-left: -50px;"/></a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="height: 70px;">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                <li class="dropdown user user-menu" style="margin-right: 130px;">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #4D4D4D;">
                        <!-- The user image in the navbar-->
                        <h4 class="hidden-xs"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp; CREATE </h4>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <!-- Menu Body -->
                        @if (Auth::user()->account_type == 'Admin')
                        <li class="user-footer"><a href="/account/create">Account</a></li>
                        <li class="user-footer"><a href="/register">User</a></li>
                        @endif
                        <li class="user-footer"><a href="/contact/create">Contacts</a></li>
                        <li class="user-footer"><a href="/opportunity/create">Opportunity</a></li>
                        <li class="user-footer"><a href="/lead/create">Lead</a></li>
                        <li class="user-footer"><a href="/call/create">Log Call</a></li>
                        <li class="user-footer"><a href="/task/create">Task</a></li>
                        <!--<li class="user-footer"><a href="#">Quote</a></li>-->
                    </ul>
                </li>
                <li class="dropdown" style="padding-top: 10px; padding-right: 40px;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li style="padding: 5px 0px; font-size: 17px;">
                            <a href="#" >Profile</a>

                        </li>
                        <li style="padding: 5px 0px; font-size: 17px;">
                            <a href="/password/new" >Change Password</a>

                        </li>
                        <li style="padding: 5px 0px; font-size: 17px;">
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>