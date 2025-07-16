@extends('frontend.layout.app')

@section('content')
    <div class="container pt-3 pb-5 py-md-5 px-3 px-md-0 add-property-page">
        <h2 class="addprop_heading mb-4">Update Property</h2>

        <form class="property-form" id="propertyForm" method="POST" action="{{ route('agent.property.add.do') }}"
            autocomplete="off">
            <div class="mb-3">
                <label class="form-label">Property Caption *</label>
                <input type="text" name="property_caption" class="form-control"
                    placeholder="Eg: Banjara Hills, Jubilee Hills, etc" value="{{ $property->name ?? '' }}">
                <span class="error property_caption_error"></span>
            </div>

            <div class="row mb-4 g-3 align-items-center">
                <div class="col-12 col-md-6">
                    <label class="form-label">Residential Type *</label>
                    <select class="form-select" name="residential_type">
                        <option selected disabled>Select Type</option>
                        <option value="Flat" {{ ($property?->residence_type ?? '') == 'Flat' ? 'selected' : '' }}>Flat</option>
                        <option value="House" {{ ($property?->residence_type ?? '') == 'House' ? 'selected' : '' }}>House
                        </option>
                        <option value="Villa" {{ ($property?->residence_type ?? '') == 'Villa' ? 'selected' : '' }}>Villa
                        </option>
                        <option value="Plot" {{ ($property?->residence_type ?? '') == 'Plot' ? 'selected' : '' }}>Plot
                        </option>
                        <option value="Farm Land" {{ ($property?->residence_type ?? '') == 'Farm Land' ? 'selected' : '' }}>
                            Farm Land</option>
                        <option value="Other" {{ ($property?->residence_type ?? '') == 'Other' ? 'selected' : '' }}>Other
                        </option>
                    </select>
                    <span class="error residential_type_error"></span>
                </div>

                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <div class="d-flex gap-5 align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="residential_option" id="buy"
                                    value="buy" {{ $property?->property_type == 'buy' ? 'checked' : '' }}>
                                <label class="form-check-label" for="buy">BUY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="residential_option" id="rent"
                                    value="rent" {{ $property?->property_type == 'rent' ? 'checked' : '' }}>
                                <label class="form-check-label" for="rent">RENT</label>
                            </div>
                        </div>
                        <span class="error residential_option_error"></span>
                    </div>

                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control" name="price" placeholder="$"
                                value="{{ $property?->price ?? '' }}">
                            <span class="error price_error"></span>
                        </div>
                        <div class="col-12 col-md-6 {{ $property?->property_type == 'rent' ? '' : 'd-none'}}" id="residential_option">
                            <select class="form-select" name="price_duration">
                                <option value="month" {{ ($property?->price_type ?? '') == 'month' ? 'selected' : '' }}>
                                    Month</option>
                                <option value="day" {{ ($property?->price_type ?? '') == 'day' ? 'selected' : '' }}>Day
                                </option>
                                <option value="year" {{ ($property?->price_type ?? '') == 'year' ? 'selected' : '' }}>
                                    Year</option>
                            </select>
                            <span class="error price_duration_error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <label class="mb-3 form-label">Property Details</label>
            <div class="row g-3 mb-3 prop_details">
                <div class="col-md-12">
                    <label for="address" class="form-label">Address *</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"
                        value="{{ $property?->address ?? '' }}">
                    <span class="error address_error"></span>
                </div>

                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="City"
                        value="{{ $property?->city ?? '' }}">
                    <span class="error city_error"></span>
                </div>

                <div class="col-md-6">
                    <label for="state" class="form-label">State</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="State"
                        value="{{ $property?->state ?? '' }}">
                    <span class="error state_error"></span>
                </div>

                <div class="col-md-6">
                    <label for="country" class="form-label">Country</label>
                    <select name="country" id="country" class="form-select">
                        <option value="">* Country</option>
                        @foreach (all_active_countries() as $item)
                            <option value="{{ $item->id }}"
                                {{ ($property?->country_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="error country_error"></span>
                </div>

                <div class="col-md-6">
                    <label for="zip" class="form-label">Zip Code</label>
                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip"
                        value="{{ $property?->zip ?? '' }}">
                    <span class="error zip_error"></span>
                </div>

                <div class="row g-3 mb-3 mb-md-5" id="nearbyplaces">
                    @forelse ($nearbyPlaces as $key => $item)
                        <div class="col-md-6 nearby-row-{{ $key }}">
                            <label for="nearby_{{ $key }}" class="form-label">Nearby Places</label>
                            <input type="text" name="nearby[]" id="nearby_{{ $key }}" class="form-control"
                                value="{{ $item->name }}">
                            <span class="error nearby_{{ $key }}_error"></span>
                        </div>
                        <div class="col-md-5 nearby-row-{{ $key }}">
                            <label class="form-label">Distance</label>
                            <div
                                class="custom-distance-box d-flex align-items-center justify-content-between px-3 py-2 mb-3">
                                <input type="number" name="distance[]" class="form-control border-0 shadow-none p-0"
                                    placeholder="0" value="{{ $item->distance }}">
                                <select name="distance_unit[]" class="form-select border-0 shadow-none p-0 text-center">
                                    <option {{ $item->distance_type == 'km' ? 'selected' : '' }}>Kilometers</option>
                                    <option {{ $item->distance_type == 'm' ? 'selected' : '' }}>Miles</option>
                                </select>
                            </div>
                        </div>
                        <div
                            class="col-md-1 d-flex justify-content-center align-items-center nearby-row-{{ $key }}">
                            <label class="form-label"></label>
                            <button class="deleteRow delete-row" data-key="{{ $key }}" type="button"><i
                                    class="fa-solid fa-xmark"></i></button>
                        </div>
                    @empty
                        <div class="col-md-6">
                            <label for="nearby_0" class="form-label">Nearby Places</label>
                            <input type="text" name="nearby[]" id="nearby_0" class="form-control">
                            <span class="error nearby_0_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Distance</label>
                            <div
                                class="custom-distance-box d-flex align-items-center justify-content-between px-3 py-2 mb-3">
                                <input type="number" name="distance[]" class="form-control border-0 shadow-none p-0"
                                    placeholder="0">
                                <select name="distance_unit[]" class="form-select border-0 shadow-none p-0 text-center">
                                    <option selected>Kilometers</option>
                                    <option>Miles</option>
                                </select>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="d-flex justify-content-md-end justify-content-center">
                        <button type="button" class="button2" id="addNearbyPlaces">
                            <i class="fa-solid fa-plus"></i> Add Row
                        </button>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-3 prop_details">
                <div class="col-md-6">
                    <div class="row g-2">
                        <label class="form-label">Surface Area *</label>
                        <div class="col-md-6">
                            <select class="form-select" name="surface_area_value">
                                <option value="2400" {{ ($property?->surface ?? '') == '2400' ? 'selected' : '' }}>
                                    2400
                                </option>
                                <option value="2500" {{ ($property?->surface ?? '') == '2400' ? 'selected' : '' }}>
                                    2500
                                </option>
                                <option value="2800" {{ ($property?->surface ?? '') == '2400' ? 'selected' : '' }}>
                                    2800
                                </option>
                                <option value="3000" {{ ($property?->surface ?? '') == '2400' ? 'selected' : '' }}>
                                    3000
                                </option>
                            </select>
                            <span class="error surface_area_value_error"></span>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="surface_area_unit">
                                <option value="sqft" {{ ($property?->surface_type ?? '') == 'sqft' ? 'selected' : '' }}>
                                    Sq Ft
                                </option>
                                <option value="sqyard"
                                    {{ ($property?->surface_type ?? '') == 'sqyard' ? 'selected' : '' }}>Sq Yards
                                </option>
                            </select>
                            <span class="error surface_area_unit_error"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row g-2">
                        <label class="form-label">Plot Size *</label>
                        <div class="col-md-6">
                            <select class="form-select" name="plot_size_value">
                                <option value="60" {{ ($property?->plot ?? '') == '60' ? 'selected' : '' }}>
                                    60
                                </option>
                                <option value="80" {{ ($property?->plot ?? '') == '80' ? 'selected' : '' }}>
                                    80
                                </option>
                                <option value="120" {{ ($property?->plot ?? '') == '120' ? 'selected' : '' }}>
                                    120
                                </option>
                                <option value="150" {{ ($property?->plot ?? '') == '150' ? 'selected' : '' }}>
                                    150
                                </option>
                            </select>
                            <span class="error plot_size_value_error"></span>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="plot_size_unit">
                                <option value="acer" {{ ($property?->plot_type ?? '') == 'acer' ? 'selected' : '' }}>
                                    Accrs</option>
                                <option value="sqyard" {{ ($property?->plot_type ?? '') == 'sqyard' ? 'selected' : '' }}>
                                    Sq Yards</option>
                            </select>
                            <span class="error plot_size_unit_error"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Bedrooms *</label>
                            <div class="counter-box d-flex align-items-center justify-content-between border">
                                <button class="counter-btn" type="button" onclick="decrement('bedrooms')">-</button>
                                <span id="bedrooms" class="counter-value">{{ $property?->bedrooms ?? 0 }}</span>
                                <button class="counter-btn-right" type="button"
                                    onclick="increment('bedrooms')">+</button>
                            </div>
                            <input type="hidden" name="bedrooms" id="bedrooms_input"
                                value="{{ $property?->bedrooms ?? 0 }}">
                            <span class="error bedrooms_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bathrooms *</label>
                            <div class="counter-box d-flex align-items-center justify-content-between border">
                                <button class="counter-btn" type="button" onclick="decrement('bathrooms')">-</button>
                                <span id="bathrooms" class="counter-value">{{ $property?->bathrooms ?? 0 }}</span>
                                <button class="counter-btn-right" type="button"
                                    onclick="increment('bathrooms')">+</button>
                            </div>
                            <input type="hidden" name="bathrooms" id="bathrooms_input"
                                value="{{ $property?->bathrooms ?? 0 }}">
                            <span class="error bathrooms_error"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Property Condition *</label>
                    <select class="form-select" name="property_condition">
                        <option>Select Condition</option>
                        <option value="furnished" {{ ($property?->condition ?? '') == 'furnished' ? 'selected' : '' }}>
                            Furnished</option>
                        <option value="un_furnished"
                            {{ ($property?->condition ?? '') == 'non-furnished' ? 'selected' : '' }}>Unfurnished</option>
                        <option value="semi_furnished"
                            {{ ($property?->condition ?? '') == 'semi-furnished' ? 'selected' : '' }}>Semi Furnished
                        </option>
                    </select>
                    <span class="error property_condition_error"></span>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Property Age *</label>
                    <select class="form-select" name="property_age">
                        <option>Select Age</option>
                        <option value="0" {{ $property->property_age_min == '0' ? 'selected' : '' }}>
                            0-5 Years
                        </option>
                        <option value="5" {{ $property->property_age_min == '5' ? 'selected' : '' }}>
                            5-10 Years
                        </option>
                        <option value="10" {{ $property->property_age_min == '10' ? 'selected' : '' }}>
                            10-15 Years
                        </option>
                        <option value="15" {{ $property->property_age_min == '15' ? 'selected' : '' }}>
                            15-20 Years
                        </option>
                    </select>
                    <span class="error property_age_error"></span>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Property Available From *</label>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <select class="form-select" name="available_month">
                                <option>Select month</option>
                                @foreach ($months as $key => $month)
                                    <option value="{{ $key + 1 }}"
                                        {{ $property?->property_available_month == $key + 1 ? 'selected' : '' }}>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error available_month_error"></span>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="available_year">
                                <option>Select year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}"
                                        {{ $property?->property_available_year == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error available_year_error"></span>
                        </div>
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="row g-2">
                        <label class="form-label">Location</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Latitude" class="form-control" name="latitude" value="{{$property?->lat ?? ''}}">
                            <span class="error latitude_error"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Longitude" class="form-control" name="longitude" value="{{$property?->lng ?? ''}}">
                            <span class="error longitude_error"></span>
                        </div>
                         <a href="https://www.latlong.net/" target="_blank" style="font-size: 12px;">
                            Click here to find your location's latitude and longitude
                        </a>
                    </div>                    
                </div>

                <h5 class="mb-2 mt-4 form-label">Amenities *</h5>
                <div class="row g-2 mb-4 amenities-list">
                    @foreach ($amenities as $item)
                        <div class="col-6 col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]"
                                    value="{{ $item->id ?? '' }}" id="amanity_{{ $item->id }}"
                                    {{ in_array($item->id ?? '', $existing_amenities) ? 'checked' : '' }}>
                                <label class="form-check-label" for="amanity_{{ $item->id }}">
                                    {{ $item->name ?? '' }}
                                </label>
                            </div>
                        </div>
                    @endforeach

                </div>
                <span class="error amenities_error"></span>
            </div>
            <div class="mb-4">
                <label class="form-label">Description</label>
                <p for="desc" class="about-prop mb-2 mb-md-4">Write About the Property *</p>
                <textarea id="desc" class="form-control" rows="6" name="description">{{ $property->description ?? '' }}</textarea>
                <span class="error description_error"></span>
            </div>
            <div class="mb-4">
                <label class="form-label">Floor Plan <span>(Optional)</span></label>
                <p class="about-prop mb-2 mb-md-4">Maximum 10 photos. 2 MB each. (File supported .jpg, .jpeg)</p>
                <div class="row my-3">
                    @foreach ($floorImagesPath as $item)
                        <div
                            class="col-md-2 col-6 image-container mb-2  position-relative image_wrapper_{{ $item['id'] }}">
                            <button type="button" class="cross-image crossImg" data-id="{{ $item['id'] }}"
                                data-type="floor">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <img src="{{ $item['path'] }}" alt="Preview" class="img-fluid rounded">
                        </div>
                    @endforeach
                </div>
                <div class="row property_image_shown my-3" id="property_image_shown">
                </div>
                <div class="upload-box p-4 text-center cursor-pointer" id="floorUploadBox">
                    <img src="{{ asset('assets/frontend/images/upload-image.png') }}" alt="upload-image"
                        class="img-fluid">
                    <p class="mb-1">
                        Click to upload floor plan
                    </p>
                    <input type="file" class="form-control-file d-none" id="floorInput" accept=".jpg,.jpeg,.png"
                        name="floor_plan[]" multiple>
                </div>
                <span class="error floor_plan_error"></span>
                <span class="error floor_plan_max_error"></span>
                <span class="error floor_plan_e_error"></span>
            </div>
            <div class="mb-4">
                <label class="form-label">Property Photos</label>
                <p class="about-prop mb-2 mb-md-4">
                    Maximum 10 photos. 2 MB each. (File supported .jpg, .jpeg)
                </p>
                <div class="row my-3">
                    @foreach ($galaryImagesPath as $item)
                        <div
                            class="col-md-2 col-6 image-container mb-2 position-relative image_wrapper_{{ $item['id'] }}">
                            <button type="button" class="cross-image crossImg" data-id="{{ $item['id'] }}"
                                data-type="galary">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <img src="{{ $item['path'] }}" alt="Preview" class="img-fluid rounded">
                        </div>
                    @endforeach
                </div>
                <div class="row property_image_shown my-3" id="property_gelery_shown">
                </div>
                <div class="upload-box p-4 text-center cursor-pointer" id="photoUploadBox">
                    <img src="{{ asset('assets/frontend/images/upload-image.png') }}" alt="upload-image"
                        class="img-fluid">
                    <p class="mb-1">Upload property images (max 20MB)</p>
                    <input type="file" multiple class="form-control-file d-none" id="photoInput" accept=".jpg,.jpeg,.png"
                        name="galary[]">
                </div>
                <span class="error galary_error"></span>
                <span class="error galary_e_error"></span>
                <span class="error galary_e2_error"></span>
            </div>
            <div class="text-center prop_button_section">
                <input type="hidden" name="draft" value="0" id="draft">
                @if ($property->status == 'draft')
                    <button type="button" class="button1 me-2 mb-3 mb-md-0" id="draftBtn">
                        Save as Draft
                    </button>
                @endif
                <button type="button" class="button2" id="publishBtn">Publish</button>
                <span class="error draft_error"></span>
            </div>
            <input type="hidden" name="property_id" value="{{ $property?->id ?? '' }}">
            <input type="hidden" name="remove_galary_images" value="">
            <input type="hidden" name="remove_floor_images" value="">
        </form>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let maxFloorImageLength = '{{10 - count($floorImagesPath)}}';
            let maxGalaryImageLength = '{{10 - count($galaryImagesPath)}}';
            let key = $('input[name="nearby[]"]').length;
            $('#addNearbyPlaces').on('click', function() {
                let rowNo = key;
                let html = `<div class="col-md-6 nearby-row-${rowNo}">
                    <label for="nearby_${rowNo}" class="form-label">Nearby Places</label>
                    <input type="text" name="nearby[]" id="nearby_${rowNo}" class="form-control">
                    <span class="error nearby_${rowNo}_error"></span>
                </div>
                <div class="col-md-5 nearby-row-${rowNo}">
                    <label class="form-label">Distance</label>
                    <div class="custom-distance-box d-flex align-items-center justify-content-between px-3 py-2 mb-3">
                        <input type="number" name="distance[]" class="form-control border-0 shadow-none p-0"
                            placeholder="0">
                        <select name="distance_unit[]" class="form-select border-0 shadow-none p-0 text-center">
                            <option selected>Kilometers</option>
                            <option>Miles</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1 d-flex justify-content-center align-items-center nearby-row-${rowNo}">
                     <label class="form-label"></label>
                    <button class="deleteRow delete-row" data-key="${rowNo}" type="button"><i class="fa-solid fa-xmark"></i></button>
                </div>
                `;
                $('#nearbyplaces').append(html);
                key++;
            })

            $('#photoInput').val('');
            $('#floorInput').val('');

            $(document).on('click', '.deleteRow', function() {
                if ($(`.nearby-row-${$(this).data('key')}`)) {
                    $(`.nearby-row-${$(this).data('key')}`).remove();
                }
            })

            $('#floorInput').on('change', function() {
                let files = this.files;
                let previewBox = $('#property_image_shown');
                showChangedImages(files, previewBox, 'floorInput', maxFloorImageLength);
            });

            $('#photoInput').on('change', function() {
                let files = this.files;
                let previewBox = $('#property_gelery_shown');
                showChangedImages(files, previewBox, 'photoInput', maxGalaryImageLength);
            });

            $('#draftBtn').on('click', function() {
                $('#draft').val(1);
                $('#propertyForm').submit();
            });

            $('#publishBtn').on('click', function() {
                $('#draft').val(0);
                $('#propertyForm').submit();
            });

            let addPropertyProcess = false;
            $('#propertyForm').on('submit', function(e) {
                e.preventDefault();
                if (addPropertyProcess) {
                    showToast('', 'Submission already in progress.', 'warning');
                    return false;
                }
                addPropertyProcess = true;
                $('.error').empty()
                let data = new FormData(e.target)
                let btn = $('#publishBtn');
                if ($('#draft').val() > 0) {
                    btn = $('#draftBtn');
                }
                $.ajax({
                    url: e.target.action,
                    type: e.target.method,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data,
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.errors) {
                                showValidationError(res.errors);
                            } else {
                                showToast(res.msg || 'Something Went Wrong.', '', 'error');
                            }
                        } else {
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            } else {
                                showToast('', res.msg, 'success', 'top-end', 10000);
                            }
                        }
                    },
                    beforeSend: function() {
                        btn.addClass('disabled');
                    },
                    complete: function() {
                        btn.removeClass('disabled');
                        addPropertyProcess = false;
                    }
                })
            });

            $('.crossImg').on('click', function() {
                let type = $(this).data('type');
                let id = $(this).data('id');
                $(`.image_wrapper_${id}`).remove();
                let val = $(`input[name="remove_${type}_images"]`).val() + id + ',';
                $(`input[name="remove_${type}_images"]`).val(val);
                if(type == 'galary'){
                    maxGalaryImageLength++;
                    if(maxGalaryImageLength > 10){
                        maxGalaryImageLength = 10;
                    }
                }else{
                    maxFloorImageLength++;
                    if(maxFloorImageLength > 10){
                        maxFloorImageLength = 10;
                    }
                }
            });

            $('input[name="residential_option"]').on('change', function(){
                if($(this).val() == 'rent'){
                    $('#price_type_wrapper').removeClass('d-none');
                }else{
                    $('#price_type_wrapper').addClass('d-none');
                }
            });
        });


        function showChangedImages(files, previewBox, inputName, max = 10) {
            previewBox.empty();
            if (files.length === 0) {
                return;
            }
            if (files.length > max) {
                $(`#${inputName}`).val('');
                showToast('You can select image only upto '+max, '', 'warning');
                return;
            }
            $.each(files, function(index, file) {
                if (!file.type.match('image*')) return;
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imageWrapper = `
                        <div class="col-md-2 col-6 image-container mb-2">
                            <img src="${e.target.result}" alt="Preview" class="img-fluid rounded">
                        </div>
                    `;
                    previewBox.append(imageWrapper);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endpush
