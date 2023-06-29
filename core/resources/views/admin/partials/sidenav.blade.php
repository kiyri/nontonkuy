<div class="sidebar bg--dark">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('admin.dashboard')}}" class="sidebar__main-logo"><img src="{{getImage(getFilePath('logoIcon') .'/logo.png')}}" alt="@lang('image')"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.category.index')}}">
                    <a href="{{route('admin.category.index')}}" class="nav-link ">
                        <i class="menu-icon las la-bars"></i>
                        <span class="menu-title">@lang('Categories')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.subcategory.index')}}">
                    <a href="{{route('admin.subcategory.index')}}" class="nav-link ">
                        <i class="menu-icon las la-signal"></i>
                        <span class="menu-title">@lang('Sub Categories')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.item*',3)}}">
                        <i class="menu-icon la la-video"></i>
                        <span class="menu-title">@lang('Video Items') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.item*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive(['admin.item.index'])}}">
                                <a href="{{route('admin.item.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Items')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive(['admin.item.single'])}}">
                                <a href="{{route('admin.item.single')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Single Items')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive(['admin.item.episode'])}}">
                                <a href="{{route('admin.item.episode')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Episode Items')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive(['admin.item.trailer'])}}">
                                <a href="{{route('admin.item.trailer')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Trailer Items')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.users*',3)}}">
                        <i class="menu-icon las la-users"></i>
                        <span class="menu-title">@lang('Manage Users')</span>

                        @if($bannedUsersCount > 0 || $emailUnverifiedUsersCount > 0 || $mobileUnverifiedUsersCount > 0)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.users*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.users.active')}} ">
                                <a href="{{route('admin.users.active')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Active Users')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.users.banned')}} ">
                                <a href="{{route('admin.users.banned')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Banned Users')</span>
                                    @if($bannedUsersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{$bannedUsersCount}}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item  {{menuActive('admin.users.email.unverified')}}">
                                <a href="{{route('admin.users.email.unverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Unverified')</span>

                                    @if($emailUnverifiedUsersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{$emailUnverifiedUsersCount}}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.users.mobile.unverified')}}">
                                <a href="{{route('admin.users.mobile.unverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Mobile Unverified')</span>
                                    @if($mobileUnverifiedUsersCount)
                                        <span
                                            class="menu-badge pill bg--danger ms-auto">{{$mobileUnverifiedUsersCount}}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.users.all')}} ">
                                <a href="{{route('admin.users.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Users')</span>
                                </a>
                            </li>


                            <li class="sidebar-menu-item {{menuActive('admin.users.notification.all')}}">
                                <a href="{{route('admin.users.notification.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Notification to All')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary">{{__(systemDetails()['name'])}}</span>
                <span class="text--success">@lang('V'){{systemDetails()['version']}} </span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->

@push('script')
    <script>
        if($('li').hasClass('active')){
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            },500);
        }
    </script>
@endpush
