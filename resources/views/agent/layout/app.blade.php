<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="{{ asset('assets/images/fav.ico') }}" type="image/x-icon" />
    <title>{{ get_option('site_title') }}{{ empty($title) ? '' : ' | ' . $title }}</title>
    <script src="{{ asset('assets/admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}?v={{ time() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/admin/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/kaiadmin.min.css') }}" />


    <script src="{{ asset('assets/admin/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jsvectormap/world.js') }}"></script>
    <script src="{{ asset('assets/admin/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/main.js') }}"></script>
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.min.css " rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    @stack('css')
</head>

<body>
    <div class="wrapper">
        @include('agent.layout.inc.sidebar')
        <div class="main-panel">
            @include('agent.layout.inc.navbar')
            <div class="container">
                <div class="page-inner">
                    @include('agent.layout.inc.breadcrumbs')
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-3">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('modal')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#logoutBtn').on('click', function() {
                Swal.fire({
                    title: 'Are you sure you want to logout?',
                    text: "You will be logged out of the admin panel.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, logout',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('auth.logout') }}";
                    }
                });
            })

            $('button[data-dismiss="modal"]').on('click', function() {
                const modalId = $(this).data('modal');
                const $modal = $('#' + modalId);

                if ($modal.length) {
                    $modal.modal('hide');
                    $modal.hide();
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                }
            });

            $(".datepicker").datepicker();
            $(".select2").select2();
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

        })
    </script>
    @include('agent.layout.inc.alert')
    @stack('js')
</body>

</html>
