<header class="myHeader fixed-top d-none d-lg-flex">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-md-9">
                <ul class="navbar">
                    <li>
                        <a href="{{ route('index') }}"
                            class="navA {{ request()->route()->getName() == 'index' ? 'active' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="navA {{ request()->route()->getName() == 'about' ? 'active' : '' }}">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('properties') }}"
                            class="navA {{ request()->route()->getName() == 'properties' || request()->route()->getName() == 'property.details' ? 'active' : '' }}">
                            Properties
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}"
                            class="navA {{ request()->route()->getName() == 'faq' ? 'active' : '' }}">
                            FAQs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}"
                            class="navA {{ request()->route()->getName() == 'blogs' ? 'active' : '' }}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="navA {{ request()->route()->getName() == 'contact' ? 'active' : '' }}">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        @if (!auth()->check())
                            <a href="javascript:void(0);" class="loginbtn" data-bs-toggle="modal"
                                data-bs-target="#authModal">
                                <i class="fa-regular fa-user"></i>
                            </a>
                        @elseif(auth()->user()->role == 'agent')
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle d-flex align-items-center gap-2 agent-dropdown"
                            id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                            <span class="fw-medium">{{ auth()->user()->name }}</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3 border-0 mt-2 py-2 small"
                            aria-labelledby="accountDropdown">
                            @if ((auth()?->user()?->role ?? '') == 'agent')
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 px-3 py-2" href="{{route('agent.index')}}" target="_blank">
                                        <i class="fa-solid fa-user-tie" style="font-size: 0.85rem;"></i>
                                        <span>My Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 px-3 py-2" href="{{route('agent.subscription')}}">
                                        <i class="fa-solid fa-money-check-dollar" style="font-size: 0.85rem;"></i>
                                        <span>Subscribe a Plan</span>
                                    </a>
                                </li>
                            @endif
                            @if ((auth()?->user()?->role ?? '') == 'user')
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 px-3 py-2" href="#">
                                        <i class="fa-regular fa-user text-primary" style="font-size: 0.85rem;"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 px-3 py-2 text-danger"
                                    data-href="{{ route('auth.logout') }}" href="javascript:void(0);" id="logoutBtn">
                                    <i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 0.85rem;"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>

                    </li>
                @elseif(auth()->user()->role == 'user')
                    <a href="javascript:void(0);" class="loginbtn" data-bs-toggle="modal" data-bs-target="#authModal">
                        <i class="fa-regular fa-user"></i>
                    </a>
                    @endif
                    </li>

                    <li>
                        @if (!auth()->check())
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#authModal">
                                <button class="button1">
                                    Add Property
                                </button>
                            </a>
                        @else
                            @if (auth()->user()->role == 'agent')
                                <a href="{{ route('property.add') }}">
                                    <button class="button1">
                                        Add Property
                                    </button>
                                </a>
                            @endif
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Mobile navbar -->

<header id="masthead2" class="fixed-top d-flex d-lg-none">
    <div class="phone-nav d-flex d-lg-none position-reltive w-100 px-3">
        <div class="d-flex align-items-center w-100">
            <div class="eader-logo-phone">
                <div class="logo-wrapper">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="header-nav flex-grow-1">
                <li>
                    <a href="javascript:void(0);" class="loginbtn" data-bs-toggle="modal" data-bs-target="#authModal">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </li>
                <div id="swipe_overlay"></div>
                <div id="swipeNav">
                    <div class="pull_nav_close text-center">
                        <a href="javascript:void(0);" id="closeBtn" class="pull-close-nav">
                            <span class="n"></span>
                            <span class="g"></span>
                            <span class="s"></span>
                        </a>
                    </div>
                    <div id="main_nav" class="main_nav">
                        <ul class="navbar">
                            <li>
                                <a href="{{ route('index') }}"
                                    class="navA {{ request()->route()->getName() == 'index' ? 'active' : '' }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}"
                                    class="navA {{ request()->route()->getName() == 'about' ? 'active' : '' }}">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('properties') }}"
                                    class="navA {{ request()->route()->getName() == 'properties' || request()->route()->getName() == 'property.details' ? 'active' : '' }}">
                                    Properties
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq') }}"
                                    class="navA {{ request()->route()->getName() == 'faq' ? 'active' : '' }}">
                                    FAQs
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blogs') }}"
                                    class="navA {{ request()->route()->getName() == 'blogs' ? 'active' : '' }}">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}"
                                    class="navA {{ request()->route()->getName() == 'contact' ? 'active' : '' }}">
                                    Contact Us
                                </a>
                            </li>
                            <li>
                                @if (!auth()->check())
                                    <a href="javascript:void(0);" class="loginbtn" data-bs-toggle="modal"
                                        data-bs-target="#authModal">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                @elseif(auth()->user()->role == 'agent')
                                    {{-- <div class="dropdown">
                                        <a href="#"
                                            class="dropdown-toggle d-flex align-items-center gap-2 loginbtn"
                                            id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-regular fa-user"></i>
                                            <span class="fw-medium">{{ auth()->user()->name }}</span>
                                            <i class="fa-solid fa-caret-down"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                            <li><a class="dropdown-item" href="#">My Account</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('auth.logout') }}">
                                                    Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                @elseif(auth()->user()->role == 'user')
                                    <a href="javascript:void(0);" class="loginbtn" data-bs-toggle="modal"
                                        data-bs-target="#authModal">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                @endif
                            </li>
                            <li>
                                @if (!auth()->check())
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#authModal">
                                        <button class="button1">
                                            Add Property
                                        </button>
                                    </a>
                                @else
                                    @if (auth()->user()->role == 'agent')
                                        <a href="{{ route('property.add') }}">
                                            <button class="button1">
                                                Add Property
                                            </button>
                                        </a>
                                    @endif
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="pull_nav" class="d-flex">
                <a id="menuBtn" class="pull-nav">
                    <span class="n"></span>
                    <span class="g"></span>
                    <span class="s"></span>
                </a>
            </div>
        </div>
    </div>
</header>
