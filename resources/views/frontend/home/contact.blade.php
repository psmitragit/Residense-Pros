@extends('frontend.layout.app')

@section('content')
    <section class="contact-section py-5 px-3 px-md-0">
        <div class="container pt-md-5">
            <div class="row mb-4 text-center justify-content-center">
                <div class="col-12 col-md-6 col-xl-3 fade-up delay-0.1">
                    <a href="tel:{{ get_option('phone') }}" class="contact-link-wrapper">
                        <div class="contact-box mb-3">
                            <div class="icon mb-4">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <span class="contact-text">
                                {{ get_option('phone') }}
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-3 fade-up delay-0">
                    <a href="mailto: {{ get_option('email') }}" target="_blank" class="contact-link-wrapper">
                        <div class="contact-box mb-3">
                            <div class="icon mb-4">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <span class="contact-text">
                                {{ get_option('email') }}
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="container ">
        <div class="row d-flex justify-content-center my-2 my-md-5">
            <div class="add-banner adv1 my-4 text-center">
                <a href="#" target="_blank" rel="noopener">
                    <img src="{{ asset('assets/frontend/images/728-90.png') }}" alt="Ad Banner" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
    <section class="contact-form-section py-5 px-3 px-md-0 my-lg-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-10 text-center">
                    <h2 class="contact_heading">Have a Question?</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form class="contact-form" id="contactForm" action="{{ route('do.contact') }}" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" placeholder="First name"
                                    name="first_name">
                                <span class="error first_name_error"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" placeholder="Last name"
                                name="last_name">
                                <span class="error last_name_error"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" placeholder="Email" name="email">
                                <span class="error email_error"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control custom-input" placeholder="Phone" name="phone">
                                <span class="error phone_error"></span>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control custom-textarea" rows="5" placeholder="Message" name="message"></textarea>
                                <span class="error message_error"></span>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="button2 custom-submit-btn">
                                    SUBMIT
                                    <i class="fa-solid fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(e.target);
                $.ajax({
                    type: e.target.method,
                    url: e.target.action,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if(res.success == 1){
                            showSweetAlert(res.msg, '', 'success');
                            $('#contactForm')[0].reset();
                        }else{
                            if(res.errors){
                                showValidationError(res.errors);
                            }else{
                                showSweetAlert(res.msg, '', 'error');
                            }
                        }
                    },
                    beforeSend: function() {
                        $('.error').empty()
                        $('#contactForm').find('button[type="submit"]').addClass('disabled');
                    },
                    complete: function() {
                        $('#contactForm').find('button[type="submit"]').removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endpush
