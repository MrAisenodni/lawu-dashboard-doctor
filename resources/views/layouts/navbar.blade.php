<header class="logo-env">

    <!-- logo -->
    <div class="logo">
        <a href="/">
            <img src="{{ asset($provider->provider_picture) }}" width="200" alt="" />
        </a>
    </div>

    <!-- logo collapse icon -->
    <div class="sidebar-collapse">
        <a href="#" class="sidebar-collapse-icon" style="margin-top: 12px"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
            <i class="entypo-menu"></i>
        </a>
    </div>

                    
    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
    <div class="sidebar-mobile-menu visible-xs">
        <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
            <i class="entypo-menu"></i>
        </a>
    </div>

</header>

<ul id="main-menu" class="main-menu">
    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
    @if ($main_menus)
        @foreach ($main_menus as $main_menu)
            @if ($main_menu->is_shown == 1)
                @if ($main_menu->menu_access->view == 1)
                    @if ($main_menu->is_parent == 0)
                        <li 
                            @if ($c_menu->main_menu)
                                @if ($c_menu->main_menu_id == $main_menu->id) 
                                    class="active" 
                                @endif
                            @elseif ($c_menu->id == $main_menu->id) 
                                class="active" 
                            @endif
                        >
                            <a href="{{ $main_menu->url }}">
                                <i class="{{ $main_menu->icon }}"></i>
                                <span class="title">{{ $main_menu->title }}</span>
                            </a>
                        </li>
                    @else
                        <li class="has-sub 
                            @if ($c_menu->main_menu)
                                @if ($c_menu->main_menu_id == $main_menu->id)
                                    active opened
                                @endif
                            @elseif($c_menu->id == $main_menu->id) 
                                active opened 
                            @endif"
                        >
                            <a href="/">
                                <i class="{{ $main_menu->icon }}"></i>
                                <span class="title">{{ $main_menu->title }}</span>
                            </a>
                            <ul>
                                @if ($main_menu->menus)
                                    @foreach ($main_menu->menus as $menu)
                                        @if ($menu->is_shown == 1)
                                            @if ($menu->menu_access->view == 1)
                                                <li 
                                                    @if ($c_menu->main_menu)
                                                        @if ($c_menu->id == $menu->id) 
                                                            class="active" 
                                                        @endif
                                                    @endif
                                                >
                                                    <a href="{{ $menu->url }}">
                                                        <span class="title">{{ $menu->title }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
            @endif
        @endforeach
    @endif
</ul>