@extends('frontend.layout.app')

@section('content')
    <section class="featured_property featured_poperty_wrapper py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                    <div class="prop_heading weavy-text">
                        Favorite Properties
                    </div>
                </div>
            </div>
            <div class="custom_border mx-3 mx-md-5"></div>
        </div>
        <div class="container-fluid pt-5 card-container">
            <div class="row g-4 px-2 px-md-5 featured_properties_wrapper">
                @include('frontend.home.inc.listing', [
                    'properties' => $properties,
                ])
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('.property-fav').on('click', function() {
                const icon = $(this).find('i');
                let url = $(this).data('url');
                let property_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: property_id
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
        });
    </script>
@endpush
