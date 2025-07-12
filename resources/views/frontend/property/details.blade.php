@extends('frontend.layout.app')

@section('content')
    <section class="map_property my-4 ">
        <div class="container">
            <div class="row">
                <div
                    class="px-3 px-md-0 py-3 d-flex flex-column flex-md-row justify-content-between align-items-center prop_details_top_section">
                    <div class="prop_heading_section text-center text-md-start mb-3 mb-md-0 col-md-6">
                        <div class="property_heading weavy-text">
                            {{ $property->full_address ?? '' }}
                        </div>
                        <p class="prop_found weavy-text mb-0">
                            {{ $property->name }}
                        </p>
                    </div>
                    <div
                        class=" d-flex align-items-center gap-5 flex-wrap justify-content-md-end justify-content-center col-md-6">
                        <div class="share_btn" data-url="{{ route('property.details', ['slug' => $property->slug]) }}">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like_btn" data-url="{{ route('property.add-remove-fev') }}">
                            <i class="{{ is_property_favorite($property->id) ? 'fa-solid' : 'fa-regular' }} fa-heart"
                                id="heartIcon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-4 px-4 px-md-0 my-lg-5 my-3">
        <div class="row g-3 g-lg-5">
            <div class="col-lg-8">
                @include('frontend.property.inc.gallery', compact('property'))
                <div class="row g-3 mt-4 Prop_fact">
                    @if (!empty($property?->residence_type ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Residence Type</p>
                                <h6 class="prop_facts_details">
                                    {{ $property?->residence_type ?? '' }}
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!empty($property?->bedrooms ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Bedrooms</p>
                                <h6 class="prop_facts_details">
                                    {{ $property?->bedrooms ?? '' }}
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!empty($property?->bathrooms ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Bathrooms</p>
                                <h6 class="prop_facts_details">
                                    {{ $property?->bathrooms ?? '' }}
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!empty($property?->surface ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Land Area</p>
                                <h6 class="prop_facts_details">
                                    {{ $property?->surface ?? '' }} {{ $property->surface_type ?? '' }}
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!empty($property?->plot ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Plot Size</p>
                                <h6 class="prop_facts_details">
                                    {{ $property?->plot ?? '' }} {{ $property->plot_type ?? '' }}
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!blank($property?->property_age_min ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Property Age</p>
                                <h6 class="prop_facts_details">
                                    {{ $property?->property_age_min ?? '' }} -
                                    {{ $property?->property_age_max ?? '' }} Years
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!blank($property?->condition ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Property Condition</p>
                                <h6 class="prop_facts_details">
                                    {{ ucfirst(str_replace(['_', '-'], ' ', $property->condition)) }}
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!empty($property?->created_by ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Posted by and On</p>
                                <h6 class="prop_facts_details">
                                    {{ $property->user?->name }} on {{ format_date($property->published_at) }}
                                </h6>
                            </div>
                        </div>
                    @endif
                    @if (!empty($property?->property_available_month ?? ''))
                        <div class="col-6 col-md-4">
                            <div class="sidebar-box h-100">
                                <p class="prop_facts mb-2">Available From</p>
                                <h6 class="prop_facts_details">
                                    {{ $property->available_from ?? '' }}
                                </h6>
                            </div>
                        </div>
                    @endif
                </div>
                <h5 class="mt-5 mb-3 amenities_heading">Amenities</h5>
                <ul class="row list-unstyled amenities p-4">
                    @foreach ($amenities as $item)
                        <li class="col-6 col-md-4 {{ in_array($item->id, $propertyAmenity) ? 'enabled' : 'disabled' }}">
                            @if (in_array($item->id, $propertyAmenity))
                                <i class="fa fa-check-circle text-success me-2"></i>
                            @else
                                <i class="fa fa-times-circle text-danger me-2"></i>
                            @endif
                            {{ $item->name }}
                        </li>
                    @endforeach
                </ul>
                @if ($property->nearby->count() > 0)
                    <h5 class="mt-5 mb-3 amenities_heading">Nearby Places</h5>
                    <div class="container nearby_places p-4">
                        <div class="row g-3">
                            @foreach ($property->nearby as $item)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="nearby-tag w-100">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <div>
                                            <div class="nearby_heading">{{ $item->name }}</div>
                                            <div class="nearby-distance">{{ $item->distance }}
                                                {{ $item->distance_type == 'm' ? 'mile(s)' : $item->distance_type }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <ul class="nav nav-tabs mt-5" id="propertyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab">
                            Description
                        </button>
                    </li>
                    @if (!empty($property->lat) && !empty($property->lng))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="neighborhood-tab" data-bs-toggle="tab"
                                data-bs-target="#neighborhood" type="button" role="tab">
                                Map and Street View
                            </button>
                        </li>
                    @endif
                    @if (count($property->getImages('floor')) > 0)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="floorplan-tab" data-bs-toggle="tab"
                                data-bs-target="#floorplan" type="button" role="tab">
                                Floorplan
                            </button>
                        </li>
                    @endif
                </ul>
                <div class="tab-content border border-top-0 rounded-bottom" id="propertyTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <p>
                            {{ $property->description }}
                        </p>
                    </div>
                    @if (!empty($property->lat) && !empty($property->lng))
                        <div class="tab-pane fade" id="neighborhood" role="tabpanel">
                            <iframe
                                src="https://www.google.com/maps?q={{ $property->lat }},{{ $property->lng }}&z=15&output=embed"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    @endif
                    @if (count($property->getImages('floor')) > 0)
                        <div class="tab-pane fade" id="floorplan" role="tabpanel">
                            @foreach ($property->getImages('floor') as $item)
                                <img src="{{ $item }}" class="img-fluid rounded" alt="Floorplan" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="col"></div>
            <div class="col-lg-3">
                <div class="sticky-top top-0">
                    <div class="sidebar-box price-box text-center mb-4 mb-md-5">
                        <div class=" price_heading mb-2">Price</div>
                        <h3 class="price_amount">
                            {{ format_amount($property->price, currency: $property?->country?->currency_symbol ?? '$') }}
                            @if ($property->property_type == 'rent')
                                <p>Per {{ ucfirst($property->price_type) }}</p>
                            @endif
                        </h3>
                    </div>

                    @if (!empty($property?->user))
                        <div class="sidebar-box alert_box text-center mb-4 mb-md-5">
                            <p class="alert_heading py-4">
                                Receive Email Notifications for Similar Properties
                            </p>
                            <button class="button2 text-uppercase notifyMe">
                                <i class="fa-solid fa-bell"></i> Notify Me
                            </button>
                        </div>
                    @endif

                    <div class="row gx-3 gy-3 text-center my-4 my-lg-5">
                        @if (!empty($property?->user?->phone ?? ''))
                            <div class="col-6">
                                <a href="tel: {{ str_replace(' ', '', $property?->user?->phone ?? '') }}"
                                    class="custom-btn w-100">
                                    <i class="fa-solid fa-phone"></i> CALL
                                </a>
                            </div>
                        @endif
                        @if (!empty($property?->user?->email ?? ''))
                            <div class="col-6">
                                <a href="mailto: {{ str_replace(' ', '', $property?->user?->email ?? '') }}"
                                    class="custom-btn w-100">
                                    <i class="fa-solid fa-envelope"></i> EMAIL
                                </a>
                            </div>
                        @endif
                        @if (!empty($property?->user?->phone ?? ''))
                            <div class="col-12">
                                <a href="{{ $property->whatsapp_url }}" class="custom-btn w-100">
                                    <i class="fa-brands fa-whatsapp"></i> WHATSAPP
                                </a>
                            </div>
                        @endif
                    </div>
                    {{-- Home Page Before Featured Properties --}}
                    {!! get_ad_module(3) !!}
                    {{-- Home Page Before Featured Properties --}}

                    <div class="sidebar-box enquire-form py-5 px-4 my-lg-5 my-4">
                        <h5 class="enquiry_heading mb-4">Enquire Now</h5>
                        <form action="{{ route('do.enquiry') }}" method="post" id="enquiry_form" autocomplete="off">
                            <input type="hidden" name="property_id" value="{{ $property?->id ?? 0 }}">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name*" />
                                <span class="name_error error"></span>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Email*" />
                                <span class="email_error error"></span>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone" class="form-control" placeholder="Phone*" />
                                <span class="phone_error error"></span>
                            </div>
                            <div class="mb-3">
                                <textarea name="message" rows="4" class="form-control" placeholder="Message"></textarea>
                                <span class="message_error error"></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="submitBtn" class="button2 text-center px-5">
                                    SEND
                                </button>
                                <span class="error property_id_error"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="notifyModel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4 pt-3">
                <div class="modal-header pt-0">
                    <h5 class="modal-title">
                        <strong>
                            Notify Me!
                        </strong>
                    </h5>
                    <button type="button" class="close_btn position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa-solid fa-xmark"></i></button>

                </div>
                <form action="{{ route('do.notify.me') }}" method="POST" class="p-4 pb-2" id="notifyMeForm"
                    autocomplete="off">
                    <p>
                        Enter email
                    </p>
                    <div class="form-group mt-2">
                        <input type="text" name="email" class="form-control" placeholder="Enter email"
                            value="{{ auth()?->user()?->email ?? '' }}">
                        <span class="error email_error"></span>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <span class="error property_id_error"></span>
                    <p class="note">
                        Note: This email will be notified when {{ $property?->user?->name }} lists a new property.
                    </p>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            //AFTER 5 SECOND UPDATE THE PROPERTY VIEW
            setTimeout(() => {
                $.ajax({
                    type: "GET",
                    url: "{{ $updateCountUrl }}",
                    success: function(res) {}
                });
            }, 5000);

            $('#enquiry_form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(e.target);
                $.ajax({
                    type: e.target.method,
                    url: e.target.action,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.errors) {
                                showValidationError(res.errors, false);
                            } else {
                                showToast('', res.msg, 'error');
                            }
                        } else {
                            $('#enquiry_form input[type="text"]').val('');
                            $('#enquiry_form textarea').val('');
                            showToast('', res.msg, 'success');
                        }
                    },
                    beforeSend: function() {
                        $('.error').empty();
                        $('#submitBtn').addClass('disabled');
                    },
                    complete: function() {
                        $('#submitBtn').removeClass('disabled');
                    }
                });
                console.log(e.target);
            });

            $('.share_btn').on('click', function() {
                const url = $(this).data('url');
                const btn = $(this);
                navigator.clipboard.writeText(url).then(function() {
                    btn.find('i').removeClass('fa-share-nodes');
                    btn.find('i').addClass('fa-check');
                    setTimeout(() => {
                        btn.find('i').removeClass('fa-check');
                        btn.find('i').addClass('fa-share-nodes');
                    }, 3000);
                    showSweetAlert('Link copied to clipboard!', '', 'success');
                }).catch(function(err) {
                    showSweetAlert('Failed to copy text', '', 'error');
                });
            });

            $('.like_btn').on('click', function() {
                const icon = $('#heartIcon');
                let url = $(this).data('url');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: "{{ $property?->id }}"
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

            $('.notifyMe').on('click', function() {
                $('#notifyModel').modal('show');
            });

            $('#notifyMeForm').on('submit', function(e) {
                e.preventDefault();
                let email = $(this).find('input[name="email"]').val();
                $.ajax({
                    type: e.target.method,
                    url: e.target.action,
                    data: {
                        email: email,
                        property_id: "{{ $property?->id ?? 0 }}"
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.success == 1) {
                            $('#notifyModel').modal('hide');
                            showSweetAlert(res.msg, '', 'success');
                        } else {
                            if (res.errors) {
                                showValidationError(res.errors, false);
                            } else {
                                showSweetAlert(res.msg, '', 'error');
                            }
                        }
                    },
                    beforeSend: function() {
                        $('.error').empty();
                        $('#notifyMeForm button[type="submit"]').addClass('disabled');
                    },
                    complete: function() {
                        $('#notifyMeForm button[type="submit"]').removeClass('disabled');
                    }
                });

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
    </script>
@endpush
