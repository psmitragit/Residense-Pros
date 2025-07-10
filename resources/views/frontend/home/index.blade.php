@extends('frontend.layout.app')
@section('banner')
    <section class="home_banner">
        <div class="container px-3 px-md-0">
            <div class="hero-content">
                @if (!empty($homepage_title))
                    <h1 class="banner_heading weavy-text">
                        {{ $homepage_title }}
                    </h1>
                @endif
                @if (!empty($homepage_description))
                    <p class="mb-5 banner_subheading weavy-word-text">
                        {{ $homepage_description }}
                    </p>
                @endif
                @include('frontend.home.inc.search-form')
            </div>
        </div>
    </section>
@endsection

@section('content')
    @foreach ($group as $key => $properties)
        {{-- Home Page Before Featured Properties --}}
        {!! get_ad_module(1) !!}
        {{-- Home Page Before Featured Properties --}}

        <section class="featured_property featured_poperty_wrapper" id="featured_property_list_{{ $key }}">
            <div class="loader-wrapper d-none">
                <div class="loader"></div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                        <div class="prop_heading weavy-text">
                            Featured Properties in {{ get_country_code($key) }}
                        </div>
                        <a class="button3" href="{{ route('properties', ['country' => $key]) }}">
                            View all <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="custom_border mx-3 mx-md-5"></div>
            </div>

            <div class="container-fluid pt-5 card-container">
                <div class="row g-4 px-2 px-md-5 featured_properties_wrapper" id="featured_property_{{ $key }}">
                    @include('frontend.home.inc.listing', ['properties' => $properties, 'filter' => $filter, 'country' => $key])
                </div>
            </div>
        </section>
    @endforeach

    {{-- Home Page Before Blogs --}}
    {!! get_ad_module(2) !!}
    {{-- Home Page Before Blogs --}}

    <section class="featured_property blogs_wrapper" id="blogs_wrapper">
        <div class="loader-wrapper d-none">
            <div class="loader"></div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                    <div class="prop_heading weavy-text">Latest Blog Posts</div>
                    @if (!empty($blogs->total()))
                        <a href="{{ route('blogs') }}" class="button3">
                            View all <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="custom_border mx-3 mx-md-5"></div>
        </div>
        <div class="container-fluid pt-5 card-container">
            <div class="row g-4 px-2 px-md-5" id="blog_list_wrapper">
                @include('frontend.home.inc.listing-blogs', ['blogs' => $blogs])
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('.featured_poperty_wrapper').on('click', '.custom-pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                let urlObj = new URL(url);
                let country = urlObj.searchParams.get('country');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        country: country,
                        type: 'property'
                    },
                    success: function(res) {
                        if (res.success == 0) {
                            showToast('', res.msg, 'error');
                        } else {
                            $(`#featured_property_${country}`).html(res.html);
                        }
                    },
                    beforeSend: function() {
                        $(`#featured_property_list_${country} .loader-wrapper`).removeClass(
                            'd-none');
                    },
                    complete: function() {
                        $(`#featured_property_list_${country} .loader-wrapper`).addClass(
                            'd-none');
                    }
                });
            });

            $('.blogs_wrapper').on('click', '.custom-pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        type: 'blog'
                    },
                    success: function(res) {
                        if (res.success == 0) {
                            showToast('', res.msg, 'error');
                        } else {
                            $(`#blog_list_wrapper`).html(res.html);
                        }
                    },
                    beforeSend: function() {
                        $(`#blogs_wrapper .loader-wrapper`).removeClass(
                            'd-none');
                    },
                    complete: function() {
                        $(`#blogs_wrapper .loader-wrapper`).addClass(
                            'd-none');
                    }
                });
            });
        });
    </script>
@endpush
