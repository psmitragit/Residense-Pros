@extends('backend.layout.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.update.settings') }}" id="settingsForm" method="POST" autocomplete="OFF">
            <div class="form-group">
                <label for="site_title">Site Title:</label>
                <input type="text" placeholder="Site Title" name="site_title" id="site_title" class="form-control"
                    value="{{ $settings['site_title'] ?? '' }}">
                <span class="site_title_error error"></span>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" placeholder="Phone" name="phone" id="phone" class="form-control"
                    value="{{ $settings['phone'] ?? '' }}">
                <span class="phone_error error"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" placeholder="Email" name="email" id="email" class="form-control"
                    value="{{ $settings['email'] ?? '' }}">
                <span class="email_error error"></span>
            </div>

            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" placeholder="Facebook URL" name="facebook" id="facebook" class="form-control"
                    value="{{ $settings['facebook'] ?? '' }}">
                <span class="facebook_error error"></span>
            </div>

            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input type="text" placeholder="Instagram URL" name="instagram" id="instagram" class="form-control"
                    value="{{ $settings['instagram'] ?? '' }}">
                <span class="instagram_error error"></span>
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" placeholder="LinkedIn URL" name="linkedin" id="linkedin" class="form-control"
                    value="{{ $settings['linkedin'] ?? '' }}">
                <span class="linkedin_error error"></span>
            </div>

            <div class="form-group">
                <label for="notification_email">Notification Email:</label>
                <input type="text" placeholder="Notification Email" name="notification_email" id="notification_email"
                    class="form-control" value="{{ $settings['notification_email'] ?? '' }}">
                <span class="notification_email_error error"></span>
            </div>

            <div class="form-group">
                <label for="admin_perpage">Admin Per Page:</label>
                <input type="number" placeholder="Admin Per Page" name="admin_perpage" id="admin_perpage"
                    class="form-control" value="{{ $settings['admin_perpage'] ?? '' }}">
                <span class="admin_perpage_error error"></span>
            </div>

            <div class="form-group">
                <label for="frontend_perpage">Frontend Per Page:</label>
                <input type="number" placeholder="Frontend Per Page" name="frontend_perpage" id="frontend_perpage"
                    class="form-control" value="{{ $settings['frontend_perpage'] ?? '' }}">
                <span class="frontend_perpage_error error"></span>
            </div>

            <div class="form-group">
                <label for="homepage_title">Homepage Title:</label>
                <input type="text" placeholder="Homepage Title" name="homepage_title" id="homepage_title"
                    class="form-control" value="{{ $settings['homepage_title'] ?? '' }}">
                <span class="homepage_title_error error"></span>
            </div>

            <div class="form-group">
                <label for="homepage_description">Homepage Description:</label>
                <textarea name="homepage_description" id="homepage_description" placeholder="Homepage Description" rows="3"
                    class="form-control">{{ $settings['homepage_description'] ?? '' }}</textarea>
                <span class="homepage_description_error error"></span>
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
            $('#settingsForm').on('submit', function(e) {
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
