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
                                <div class="toggle-highlight toggle-highlight_{{ $key }}"></div>
                                <button type="button" class="toggle-button active listBtn"
                                    data-country="{{ $key }}">
                                    List
                                </button>
                                <button type="button" class="toggle-button mapBtn" data-country="{{ $key }}">
                                    Map
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-5 card-container">
                <div class="row g-4 px-2 px-md-5 pb-5" id="featured_property_{{ $key }}">
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}"></script>
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

            $('.listBtn').on('click', function() {
                let country = $(this).data('country');
                $(this).addClass('active');
                $('.mapBtn[data-country="' + country + '"]').removeClass('active');
                let highlight = $('.toggle-highlight_' + country);
                highlight.css('transform', 'translateX(0)');
                let url = "{{ route('properties') }}";
                updateProperty(url, country);

            });

            $('.mapBtn').on('click', function() {
                let country = $(this).data('country');
                $(this).addClass('active');
                $('.listBtn[data-country="' + country + '"]').removeClass('active');
                let highlight = $('.toggle-highlight_' + country);
                highlight.css('transform', 'translateX(100%)');
                showMap(country);
            });

            function showMap(country) {
                let data = {
                    country: country
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('property.map') }}",
                    data: data,
                    success: function(res) {
                        if (res.success == 0) {
                            showToast('', res.msg, 'error');
                        } else {
                            $(`#featured_property_${country}`).html(res.data.html);
                            initializeMap(country, res.data.properties);
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

            function initializeMap(country, properties) {
                $(`#map_${country}`).empty();

                const center = properties.length > 0 ? {
                    lat: parseFloat(properties[0].lat),
                    lng: parseFloat(properties[0].lng)
                } : {
                    lat: 36.1699,
                    lng: -115.1398
                };

                const map = new google.maps.Map(document.getElementById(`map_${country}`), {
                    zoom: 2,
                    center: center
                });

                const infoWindow = new google.maps.InfoWindow();
                let activeCircle = null;

                properties.forEach(property => {
                    if (property.lat && property.lng) {
                        const lat = parseFloat(property.lat);
                        const lng = parseFloat(property.lng);

                        if (isNaN(lat) || isNaN(lng)) {
                            console.warn(`Invalid lat/lng for property ID ${property.id}`);
                            return;
                        }

                        const marker = new google.maps.Marker({
                            position: {
                                lat: lat,
                                lng: lng
                            },
                            map: map,
                            title: property.name ?? 'Property',
                        });

                        marker.addListener('click', function() {
                            $.ajax({
                                url: "{{ route('property.closest') }}",
                                type: 'POST',
                                data: {
                                    id: property.id
                                },
                                success: function(res) {
                                    $(`#map_property_list_${property.country}`).html(res.data.html);
                                }
                            });

                            if (activeCircle) {
                                activeCircle.setMap(null);
                            }

                            activeCircle = new google.maps.Circle({
                                strokeColor: "#FF0000",
                                strokeOpacity: 0.8,
                                strokeWeight: 2,
                                fillColor: "#FF0000",
                                fillOpacity: 0.2,
                                map: map,
                                center: {
                                    lat: lat,
                                    lng: lng
                                },
                                radius: 30000
                            });

                            map.setZoom(9)

                            const html = `
                                <div style="max-width: 250px; font-family: Arial, sans-serif;">
                                    <img src="${property.image ?? 'https://via.placeholder.com/250x150?text=No+Image'}" alt="${property.name ?? 'Property'}" style="width: auto; height: 100px; margin-bottom: 10px; border-radius: 4px;" />
                                    <h4 style="margin: 0 0 10px; color: #333;">${property.name ?? 'Unnamed Property'}</h4>
                                    <p style="margin: 0;">
                                        <strong>Price:</strong> ${property.price ?? 'N/A'}<br>
                                        <strong>Buy/Rent:</strong> ${property.type ?? 'N/A'}<br>
                                        <strong>Address:</strong> ${property.address ?? 'N/A'}<br>
                                    </p>
                                </div>
                            `;

                            infoWindow.setContent(html);
                            infoWindow.open(map, marker);
                        });
                    }
                });

                // Animated Zoom
                let currentZoom = 2;
                const targetZoom = 8;
                const zoomInterval = setInterval(() => {
                    if (currentZoom >= targetZoom) {
                        clearInterval(zoomInterval);
                    } else {
                        currentZoom++;
                        map.setZoom(currentZoom);
                    }
                }, 100);
            }

        });
    </script>
@endpush
