<footer class="custom-footer pt-5 pb-3">
    <div class="container">
        <div class="row gy-4">
            <!-- Logo & Contact -->
            <div class="col-lg-4 col-6">
                <div class="footer-logo mb-4">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/frontend/images/logo-white.png') }}" alt="Residences Pros Logo"
                            class="footer-logo-img">
                    </a>
                </div>
                <ul class="footer-contact list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <span class="icon_holder">
                            <i class="fa-solid fa-phone-volume"></i>
                        </span>
                        <span class="ms-2">
                            <a href="tel:{{ get_option('phone') }}">
                                {{ get_option('phone') }}
                            </a>
                        </span>
                    </li>
                    <li class="d-flex align-items-center mb-3 mb-md-5">
                        <span class="icon_holder">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <span class="ms-2">
                            <a href="mailto:{{ get_option('email') }}">{{ get_option('email') }}</a>
                        </span>
                    </li>
                </ul>
                @if (!auth()->check())
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#authModal">
                        <button class="button1 add-property-btn">
                            Add Property
                        </button>
                    </a>
                @else
                    @if (auth()->user()->role == 'agent')
                        <a href="{{ route('property.add') }}">
                            <button class="button1 add-property-btn">
                                Add Property
                            </button>
                        </a>
                    @endif
                @endif
            </div>
            <div class="col-lg-3 col-6">
                <h5 class="footer-heading mb-3">Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li>
                        <a href="{{ route('index') }}"
                            class="navA {{ (request()?->route()?->getName() ?? '') == 'index' ? 'active' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="navA {{ (request()?->route()?->getName() ?? '') == 'about' ? 'active' : '' }}">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('properties') }}"
                            class="navA {{ (request()?->route()?->getName() ?? '') == 'properties' || (request()?->route()?->getName() ?? '') == 'property.details' ? 'active' : '' }}">
                            Properties
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}"
                            class="navA {{ (request()?->route()?->getName() ?? '') == 'faq' ? 'active' : '' }}">
                            FAQs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}"
                            class="navA {{ (request()?->route()?->getName() ?? '') == 'blogs' ? 'active' : '' }}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="navA {{ (request()?->route()?->getName() ?? '') == 'contact' ? 'active' : '' }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Other Links -->
            <div class="col-lg-3 col-6">
                <h5 class="footer-heading mb-3">Other Links</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('sitemap') }}" target="_blank">Sitemap</a></li>
                    <li><a href="{{ route('cookie.policy') }}">Cookie Policy</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                </ul>
            </div>
            <!-- Social Media -->
            @php
                $social = get_option(['facebook', 'instagram', 'linkedin']);
            @endphp
            <div class="col-lg-2 col-6">
                @if (!empty($social['facebook']) || !empty($social['instagram']) || !empty($social['linkedin']))
                    <h5 class="footer-heading mb-3">Follow Us</h5>
                @endif
                <ul class="list-unstyled footer-social">
                    @if (!empty($social['facebook']))
                        <li class="mb-3">
                            <a href="{{ $social['facebook'] }}" class="d-flex align-items-center" target="_blank">
                                <span class="icon_holder"><i class="fa-brands fa-facebook-f"></i></span>
                                <span class="ms-2">Facebook</span>
                            </a>
                        </li>
                    @endif
                    @if (!empty($social['instagram']))
                        <li class="mb-3">
                            <a href="{{ $social['instagram'] }}" class="d-flex align-items-center" target="_blank">
                                <span class="icon_holder"><i class="fa-brands fa-instagram"></i></span>
                                <span class="ms-2">Instagram</span>
                            </a>
                        </li>
                    @endif
                    @if (!empty($social['linkedin']))
                        <li>
                            <a href="{{ $social['linkedin'] }}" class="d-flex align-items-center" target="_blank">
                                <span class="icon_holder">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </span>
                                <span class="ms-2">
                                    LinkedIn
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- Bottom Footer -->
    <section class="copyright_section mt-5">
        <div class="container">
            <div class="row mt-4 pb-2  align-items-center">
                <div class="col-md-6 text-center text-md-start footer-copyright mb-3 mb-md-0">
                    &copy; {{ date('Y') }}
                    <a href="{{ route('index') }}">
                        Residences Pros
                    </a>
                    - All Rights Reserved.
                </div>
                <div
                    class="col-md-6  text-center text-md-end d-flex justify-content-md-end justify-content-center gap-2">
                    <img src="{{ asset('assets/frontend/images/visa.png') }}" alt="Visa" class="payment-icon">
                    <img src="{{ asset('assets/frontend/images/mastercard.png') }}" alt="MasterCard"
                        class="payment-icon">
                    <img src="{{ asset('assets/frontend/images/amex.png') }}" alt="American Express"
                        class="payment-icon">
                    <img src="{{ asset('assets/frontend/images/discover.png') }}" alt="Discover" class="payment-icon">
                </div>
            </div>
        </div>
    </section>
    <button id="scrollToTopBtn" title="Go to top">
        <i class="fas fa-angle-up"></i>
    </button>
</footer>
