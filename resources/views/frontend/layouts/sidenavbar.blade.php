<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle"
                        src="{{ asset('assets/admin/images/profile_small.jpg') }}" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"> {{ Auth::user()->name }}</span>
                        <span class="text-muted text-xs block">
                            <?php
                            $role = Auth::user()->user_role;
                            if ($role == '2') {
                            echo 'Manufacturar';
                            } elseif ($role == '3') {
                            echo 'Wholesaler';
                            } else {
                            echo 'Admin';
                            }
                            ?> <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{ route('admin.profile.index') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="/admin/change-password">Change Password</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            @include('admin.layouts.menu')


        </ul>
    </div>
</nav>
