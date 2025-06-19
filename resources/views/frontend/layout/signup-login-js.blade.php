<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#signupForm').on('submit', function(e) {
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
                        $('#signupForm')[0].reset();
                        $('#signupForm').html(res.msg);
                    }
                },
                beforeSend: function() {
                    btn.addClass('disabled');
                },
                complete: function() {
                    btn.removeClass('disabled');
                }
            })
        });

        $('#loginForm').on('submit', function(e) {
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
                            $('#loginForm')[0].reset();
                            $('#loginForm').html(res.msg);
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
        });

        $('#logoutBtn').on('click', function() {
            let url = $(this).data('href');
            Swal.fire({
                title: "Are you sure you want to logout?",
                showCancelButton: true,
                confirmButtonText: "Yes",
                ButtonText: `No`,
                icon: 'warning',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });

        $('#forgotForm').on('submit', function(e) {
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
                            $('#forgotForm')[0].reset();
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

        // SHOW HIDE LOGIN, REGISTER, FORGOT FORM   
        const toogleBtn = $('#toggleAuthForm');
        const loginForm = $('#loginForm');
        const signupForm = $('#signupForm');
        const forgotForm = $('#forgotForm');
        const authTitle = $('#authTitle');
        const authToggleText = $('#authToggleText');

        toogleBtn.on('click', function() {
            $('.error').empty();
            if (loginForm.hasClass('d-none')) {
                loginForm.removeClass('d-none');
                signupForm.addClass('d-none');
                forgotForm.addClass('d-none');
                authToggleText.html("Don't have an account?");
                authTitle.html('Login');
                toogleBtn.html('Sign Up');
            } else {
                loginForm.addClass('d-none');
                signupForm.removeClass('d-none');
                forgotForm.addClass('d-none');
                authToggleText.html('Already have an account?');
                authTitle.html('Sign Up');
                toogleBtn.html('Login');

            }
        });

        $('.forgot_pass').on('click', function() {
            $('.error').empty();
            if (loginForm.hasClass('d-none')) {
                loginForm.removeClass('d-none');
                signupForm.addClass('d-none');
                forgotForm.addClass('d-none');
                authToggleText.html("Don't have an account?");
                authTitle.html('Login');
                toogleBtn.html('Sign Up');
            } else {
                loginForm.addClass('d-none');
                signupForm.addClass('d-none');
                forgotForm.removeClass('d-none');
                authTitle.html("Forgot Password");
                authToggleText.html('');
                toogleBtn.html('');
            }
        });
        // #SHOW HIDE LOGIN, REGISTER, FORGOT FORM
    });
</script>
@if (!empty(request()->auth_modal))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#authModal').modal('show');
        });
    </script>
@endif
