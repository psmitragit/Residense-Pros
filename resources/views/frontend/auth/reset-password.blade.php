@extends('frontend.layout.app')

@section('content')
    <div class="container pt-3 pb-5 py-md-5 px-3 px-md-0 add-property-page">
        <h2 class="addprop_heading text-center mb-4 fw-bold"
            style="font-family: var(--bold); font-size: clamp(1.5rem, 4vw, 2.25rem);">
            Reset Password
        </h2>
        <form id="resetPasswordForm" action="{{ route('do.password.reset') }}" method="POST">
            <input type="hidden" name="token" value="{{ $token ?? '' }}">
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
                <span class="error email_error"></span>
            </div>
            <div class="form-group mb-3">
                <label>New Password</label>
                <input type="password" name="password" class="form-control">
                <span class="error password_error"></span>
            </div>
            <div class="form-group mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                <span class="error password_confirmation_error"></span>
            </div>
            <button type="submit" class="btn btn-secondary">Reset Password</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#resetPasswordForm').on('submit', function(e) {
                e.preventDefault();
                $('.error').empty()
                let data = new FormData(e.target)
                let btn = $(this).find('button[type="submit"]');
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
                    }
                })
            })
        });
    </script>
@endpush
