<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="{{route('admin.home')}}" class="@yield('home-active') text_font">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Dashboard 
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{route('admin.voter.index')}}" class="@yield('voter-active') text_font">
                                        <i class="metismenu-icon pe-7s-users"></i>
                                        Voters 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.boy.index')}}" class="@yield('boy-active') text_font">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Boy 
                                    </a>
                                </li> 
                                <li>
                                    <a href="{{route('admin.message.index')}}" class="@yield('message-active') text_font">
                                    <i class="metismenu-icon pe-7s-comment"></i>
                                        Messages 
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                </div>