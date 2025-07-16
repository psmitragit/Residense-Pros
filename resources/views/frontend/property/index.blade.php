@extends('frontend.layout.app')

@section('content')
    <section class="Property_banner py-4">
        <div class="container">
            <div class="hero-content bg-lightblue rounded-5 p-3 p-md-4">
                @include('frontend.property.inc.search-form')
            </div>
        </div>
    </section>


    @foreach ($group as $key => $item)
        {{-- Property Listing Page --}}
        {!! get_ad_module(3) !!}
        {{-- Property Listing Page --}}

        <section class="featured_property featured_poperty_wrapper" id="featured_property_list_{{ $key }}">
            <div class="loader-wrapper d-none">
                <div class="loader"></div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="px-3 px-md-5 d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="prop_heading_section text-center text-md-start mb-3 mb-md-0 col-md-6">
                            <div class="property_heading weavy-text">
                                Rent Properties in {{ get_country_code($key) }}
                            </div>
                            <p class="prop_found weavy-text mb-0">
                                {{ $item['count'] > 0 ? $item['count'] : 'No' }} properties found
                            </p>
                        </div>

                        <div
                            class="togglesection d-flex align-items-center gap-3 flex-wrap justify-content-md-end justify-content-center col-md-6">
                            <div class="d-flex align-items-center gap-2">
                                <label for="sortSelect" class="sortBy">Sort by:</label>
                                <select class="form-select rounded-pill px-4 py-2 sortBySelect"
                                    data-country="{{ $key }}">
                                    <option value="">Select</option>
                                    <option value="price_low">Price: Low to High</option>
                                    <option value="price_high">Price: High to Low</option>
                                    <option value="newest">Newest</option>
                                    <option value="popularity">Popularity</option>
                                </select>
                            </div>

                            <div class="custom-toggle-container">
                                <div class="toggle-highlight"></div>
                                <button type="button" class="toggle-button active" id="listBtn">List</button>
                                <button type="button" class="toggle-button" id="mapBtn">Map</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-5 card-container">
                <div class="row g-4 px-2 px-md-5" id="featured_property_{{ $key }}">
                    @include('frontend.home.inc.listing', [
                        'properties' => $item['data'],
                        'filter' => $filter,
                        'country' => $key,
                    ])
                </div>
            </div>
        </section>
    @endforeach
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('.featured_poperty_wrapper').on('click', '.custom-pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                let urlObj = new URL(url);
                let country = urlObj.searchParams.get('country');
                updateProperty(url, country)
            });

            $(document).on('change', '.sortBySelect', function() {
                let val = $(this).val();
                let country = $(this).data('country');
                let url = "{{ route('properties') }}";
                updateProperty(url, country, val);
            });


            function updateProperty(url, country, sort_by = '') {
                let data = {
                    country: country
                };
                if (sort_by != '') {
                    data.sort_by = sort_by;
                }
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(res) {
                        if (res.success == 0) {
                            showToast('', res.msg, 'error');
                        } else {
                            $(`#featured_property_${country}`).html(res.html);
                            setTimeout(() => {
                                $('html, body').animate({
                                    scrollTop: $(
                                            `#featured_property_${country}`)
                                        .offset().top - 200
                                }, 500);
                            }, 1);
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
            }

            $('.property-fav').on('click', function() {
                const icon = $(this).find('i');
                let url = $(this).data('url');
                let property_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: property_id
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.success == 1) {
                            if (res.type == 'add') {
                                makeHeart(icon);
                            } else {
                                removeHeart(icon);
                            }
                        } else {
                            if (res.show_login_modal == 1) {
                                $('#authModal').modal('show');
                            } else {
                                showSweetAlert(res.msg, '', 'error');
                            }
                        }
                    }
                });
            });

            function makeHeart(icon) {
                icon.removeClass('fa-regular');
                icon.addClass('fa-solid');
                icon.addClass('heart-animate');
                setTimeout(() => {
                    icon.removeClass('heart-animate');
                }, 600);
            }

            function removeHeart(icon) {
                icon.addClass('fa-regular');
                icon.removeClass('fa-solid');
                icon.addClass('heart-animate');
                setTimeout(() => {
                    icon.removeClass('heart-animate');
                }, 600);
            }
        });
    </script>
@endpush
