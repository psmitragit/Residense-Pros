<!doctype html>
<html lang="en">

<head>
    <title>{{ get_option('site_title') }} | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/auth/admin.css') }}">
    <script src="{{ asset('assets/common/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.js"></script>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Sign In</h3>
                        <form action="{{ route('auth.admin.do.login') }}" class="login-form" id="loginForm"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Username"
                                    name="username">
                                <span class="error text-danger username_error"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control rounded-left" placeholder="Password"
                                    name="password">
                                <span class="error text-danger password_error"></span>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" name="remember" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    {{-- <a href="#">Forgot Password</a> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault()
                $('.error').empty()
                let data = new FormData(e.target)
                let btn = $(this).find('button[type="submit"]');
                let oldText = btn.html();
                $.ajax({
                    url: e.target.action,
                    type: e.target.method,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data,
                    success: function(response) {
                        if (response.success == 0) {
                            if (response.errors) {
                                showValidationError(response.errors);
                            } else {
                                showToast(response.msg || 'Something Went Wrong.', '', 'error');
                            }
                        } else {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }
                    },
                    beforeSend: function() {
                        btn.css({
                            'opacity': '.5'
                        });
                        btn.html('Please wait...');
                        btn.addClass('disabled');
                    },
                    complete: function() {
                        btn.removeClass('disabled');
                        btn.css({
                            'opacity': ''
                        });
                        btn.html(oldText);
                    }
                })
            })
        })
    </script>
</body>

</html>
