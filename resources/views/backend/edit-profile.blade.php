@extends('backend.layout.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.profile.do-edit') }}" id="profileForm" method="POST" autocomplete="OFF">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" placeholder="First Name" name="first_name" id="first_name" class="form-control"
                    value="{{ auth('admin')->user()?->first_name ?? '' }}">
                <span class="first_name_error error"></span>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" placeholder="Last Name" name="last_name" id="last_name" class="form-control" value="{{ auth('admin')->user()?->last_name ?? '' }}">
                <span class="last_name_error error"></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" placeholder="Email" name="email" id="email" class="form-control" value="{{ auth('admin')->user()?->email ?? '' }}">
                <span class="email_error error"></span>
            </div>
            <div class="form-group">
                <label for="password">Password:<span style="color: grey; font-size: 12px;"> (optional)</span></label>
                <input type="text" placeholder="Password" name="password" id="password" class="form-control">
                <span class="password_error error"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id="updateBtn">Update</button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('#profileForm').on('submit', function(e) {
                console.log('S');
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
                                showValidationError(res.errors);
                            } else {
                                showToast('', res.msg || 'Something went wrong', 'error');
                            }
                        } else {
                           window.location.reload();
                        }
                    },
                    beforeSend: function() {
                        $('.error').empty();
                        $('#updateBtn').addClass('btn_disabled');
                    },
                    complete: function() {
                        $('#updateBtn').removeClass('btn_disabled');
                    }
                });



            });
        });
    </script>
@endpush
