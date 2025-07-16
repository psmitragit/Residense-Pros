<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/frontend/js/jquery-3.7.1.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="{{ asset('assets/common/js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/frontend/menu/nav.css') }}">
    <script src="{{ asset('assets/frontend/menu/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/menu/nav.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>{{ get_option('site_title') }}{{ ($title ?? '') == '' ? '' : ' | ' . $title }}</title>
    @stack('css')
</head>

<body>
    @include('frontend.layout.header')
    @if (!empty($links))
        <section class="about_banner">
            <div class="container px-3 px-md-0">
                <div class="hero-content">
                    <h1 class="banner_heading weavy-text">{{ $title ?? '-' }}</h1>
                    <p class="mb-5 banner_subheading">
                        @foreach ($links as $item)
                            @if (!empty($item['url']))
                                <a href="{{ $item['url'] }}">
                            @endif
                            {{ $item['name'] }}
                            @if (!empty($item['url']))
                                </a>
                            @endif
                            @if (!$loop->last)
                                |
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </section>
    @endif
    @yield('banner')
    @yield('content')
    @include('frontend.layout.modal')
    @stack('modal')
    @include('frontend.layout.footer')
    @include('frontend.layout.alert')
    @include('frontend.layout.signup-login-js')
    @stack('js')
    <script src="{{ asset('assets/frontend/js/ads.js') }}"></script>
</body>

</html>
