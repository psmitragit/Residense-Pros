@extends('frontend.layout.app')

@section('content')
    <section class="featured_property featured_poperty_wrapper py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                    <div class="prop_heading weavy-text">
                        Edit Profile
                    </div>
                </div>
            </div>
            <div class="custom_border mx-3 mx-md-5"></div>
        </div>
        <div class="container-fluid pt-5 card-container">
            <div class="row g-4 px-2 px-md-5 featured_properties_wrapper">
                <div class="col-12">
                    <form method="post" action="{{ route('do.edit-profile') }}" autocomplete="off" id="edit_profile">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                value="{{ $user?->first_name ?? '' }}">
                            <span class="error first_name_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                value="{{ $user?->last_name ?? '' }}">
                            <span class="error last_name_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ $user?->email ?? '' }}" readonly>
                            <span class="error email_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{ $user?->phone ?? '' }}">
                            <span class="error phone_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ $user?->address ?? '' }}">
                            <span class="error address_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="city"
                                value="{{ $user?->city ?? '' }}">
                            <span class="error city_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" name="state" id="state"
                                value="{{ $user?->state ?? '' }}">
                            <span class="error state_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label">ZIP</label>
                            <input type="text" class="form-control" name="zip" id="zip"
                                value="{{ $user?->zip ?? '' }}">
                            <span class="error zip_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="country_id" class="form-label">Country</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">Select a country</option>
                                @foreach ($counties as $item)
                                    <option value="{{ $item->id }}"
                                        {{ ($user?->country_id ?? '') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error country_id_error"></span>
                        </div>
                        <button type="submit" class="btn button2" id="submitBtn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('#edit_profile').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(e.target);
                $.ajax({
                    type: e.target.method,
                    url: e.target.action,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == 1) {
                            showSweetAlert(res.msg, '', 'success');
                        } else {
                            if (res.errors) {
                                showValidationError(res.errors);
                            } else {
                                showSweetAlert(res.msg, '', 'error');
                            }
                        }
                    },
                    beforeSend: function() {
                        $('.error').empty()
                        $('#edit_profile').find('button[type="submit"]').addClass('disabled');
                    },
                    complete: function() {
                        $('#edit_profile').find('button[type="submit"]').removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endpush
