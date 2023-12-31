<div class="row">
		
    <!-- Profile Info and Notifications -->
    <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">

            <!-- Profile Info -->
            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="@if (session()->get('spicture')) {{ asset(session()->get('spicture')) }} @else {{ asset('thumb-1.png') }} @endif" alt="" class="img-circle" width="44" />
                    {{ session()->get('sname') }}
                </a>

                <ul class="dropdown-menu">

                    <!-- Reverse Caret -->
                    <li class="caret"></li>

                    <!-- Profile sub-links -->
                    <li>
                        <a href="/profil">
                            <i class="entypo-user"></i>
                            Ubah Profil
                        </a>
                    </li>
                    <!-- Logout sub-links -->
                    <li>
                        <a href="/logout">
                            <i class="entypo-logout"></i>
                            Keluar
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>


    <!-- Raw Links -->
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">

            <li class="sep"></li>

            <li>
                <a href="/logout">
                    Keluar <i class="entypo-logout right"></i>
                </a>
            </li>
        </ul>

    </div>

</div>