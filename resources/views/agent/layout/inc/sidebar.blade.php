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
                <li class="nav-item {{ (request()?->route()?->getName() ?? '') == 'agent.index' ? 'active' : '' }}">
                    <a href="{{ route('agent.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->is('agent/property*') || request()->is('admin/categories*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#propertyMenu">
                        <i class="fa-brands fa-blogger-b"></i>
                        <p>Properties</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('agent/property*') ? 'show' : '' }}" id="propertyMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('agent/property/published') ? 'active' : '' }}">
                                <a href="{{ route('agent.property.published') }}">
                                    <span class="sub-item">Published ({{get_agent_property_count(auth()->id(), 'published')}})</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('agent/property/drafted') ? 'active' : '' }}">
                                <a href="{{ route('agent.property.drafted') }}">
                                    <span class="sub-item">Drafted ({{get_agent_property_count(auth()->id(), 'draft')}})</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('agent/property/blocked') ? 'active' : '' }}">
                                <a href="{{ route('agent.property.blocked') }}">
                                    <span class="sub-item">Blocked ({{get_agent_property_count(auth()->id(), 'blocked')}})</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('agent/property/archive') ? 'active' : '' }}">
                                <a href="{{ route('agent.property.archive') }}">
                                    <span class="sub-item">Archived ({{get_agent_archived_property(auth()->id())}})</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ (request()?->route()?->getName() ?? '') == 'agent.enquiry.index' ? 'active' : '' }}">
                    <a href="{{ route('agent.enquiry.index') }}">
                        <i class="fas fa-question-circle"></i>
                        <p>Enquiry</p>
                    </a>
                </li>
                <li
                class="nav-item {{ request()->is('agent/ads*') ? 'active' : '' }}">
                <a data-bs-toggle="collapse" href="#adsMenu">
                    <i class="fa-solid fa-audio-description"></i>
                    <p>ADS</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->is('agent/ads*') ? 'show' : '' }}" id="adsMenu">
                    <ul class="nav nav-collapse">
                        <li class="{{ request()->is('agent/ads/all') ? 'active' : '' }}">
                            <a href="{{ route('agent.ads.all') }}">
                                <span class="sub-item">All Ads</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('agent/ads/add') ? 'active' : '' }}">
                            <a href="{{ route('agent.ads.add') }}">
                                <span class="sub-item">
                                    Add New Ad
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
                <li class="nav-item {{ (request()?->route()?->getName() ?? '') == 'agent.subscription.index' ? 'active' : '' }}">
                    <a href="{{ route('agent.subscription.index') }}">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <p>Subscription</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
