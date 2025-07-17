@extends('frontend.layout.app')

@section('content')
    <section class="featured_property featured_poperty_wrapper py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                    <div class="prop_heading weavy-text">
                        Change Password
                    </div>
                </div>
            </div>
            <div class="custom_border mx-3 mx-md-5"></div>
        </div>
        <div class="container-fluid pt-5 card-container">
            <div class="row g-4 px-2 px-md-5 featured_properties_wrapper">
                <div class="col-12">
                    <form method="post" action="{{ route('do.change.password') }}" autocomplete="off" id="change_password">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="error password_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                value="{{ $user?->zip ?? '' }}">
                            <span class="error confirm_password_error"></span>
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
            $('#change_password').on('submit', function(e) {
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
                            window.location.reload();
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
                        $('#change_password').find('button[type="submit"]').addClass('disabled');
                    },
                    complete: function() {
                        $('#change_password').find('button[type="submit"]').removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endpush
