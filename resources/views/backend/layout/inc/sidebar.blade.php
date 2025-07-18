<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
        <a href="{{ route('index') }}" class="logo" target="_blank">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="navbar" class="navbar-brand"
                    height="20">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ (request()?->route()?->getName() ?? '') == 'admin.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->is('admin/blogs*') || request()->is('admin/categories*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#blogMenu">
                        <i class="fa-brands fa-blogger-b"></i>
                        <p>Blogs</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('admin/blogs*') || request()->is('admin/categories*') ? 'show' : '' }}"
                        id="blogMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
                                <a href="{{ route('admin.categories.index') }}">
                                    <span class="sub-item">Categories</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/blogs*') ? 'active' : '' }}">
                                <a href="{{ route('admin.blog.index') }}">
                                    <span class="sub-item">Posts</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li
                    class="nav-item {{ (request()?->route()?->getName() ?? '') == 'admin.agent.index' || (request()?->route()?->getName() ?? '') == 'admin.agent.purchase.history' ? 'active' : '' }}">
                    <a href="{{ route('admin.agent.index') }}">
                        <i class="fa-solid fa-user"></i>
                        <p>Agents</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/property*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#propertyMenu">
                        <i class="fa-solid fa-house"></i>
                        <p>Properties</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('admin/property*') ? 'show' : '' }}" id="propertyMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/property') ? 'active' : '' }}">
                                <a href="{{ route('admin.property.index') }}">
                                    <span class="sub-item">Active</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/property/blocked*') ? 'active' : '' }}">
                                <a href="{{ route('admin.property.blocked') }}">
                                    <span class="sub-item">Blocked</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('admin/subscription*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#subscriptionMenu">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <p>Subscription</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('admin/subscription*') ? 'show' : '' }}"
                        id="subscriptionMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/subscription/plans') ? 'active' : '' }}">
                                <a href="{{ route('admin.subscription.index') }}">
                                    <span class="sub-item">Plans</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/subscription/history') ? 'active' : '' }}">
                                <a href="{{ route('admin.subscription.history') }}">
                                    <span class="sub-item">History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('admin/ads*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#adsMenu">
                        <i class="fa-solid fa-audio-description"></i>
                        <p>ADS</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('admin/ads*') ? 'show' : '' }}" id="adsMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/ads/all') ? 'active' : '' }}">
                                <a href="{{ route('admin.ads.all') }}">
                                    <span class="sub-item">All Ads</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/ads/revenue') ? 'active' : '' }}">
                                <a href="{{ route('admin.ads.revenue') }}">
                                    <span class="sub-item">Revenue</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/ads/position') ? 'active' : '' }}">
                                <a href="{{ route('admin.ads.position') }}">
                                    <span class="sub-item">Positions</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/ads/pending') ? 'active' : '' }}">
                                <a href="{{ route('admin.ads.pending') }}">
                                    <span class="sub-item">Pending Approval ({{ get_pending_approval_ads() }})</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li
                    class="nav-item {{ (request()?->route()?->getName() ?? '') == 'admin.static.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.static.index') }}">
                        <i class="fas fa-file"></i>
                        <p>Static Page</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ (request()?->route()?->getName() ?? '') == 'admin.faq.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.faq.index') }}">
                        <i class="fa-solid fa-question"></i>
                        <p>FAQ</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
