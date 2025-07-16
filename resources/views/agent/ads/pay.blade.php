@extends('agent.layout.app')
@push('css')
    <style>
        .mw-450 {
            max-width: 450px;
            width: 100%;
        }

        .card-wrapper {
            width: 100%;
        }

        #card-element {
            min-height: 50px;
            padding: 12px;
        }

        .details-list {
            list-style: none;
            padding: 0;
            margin: 0 0 1rem;
        }

        .details-list li {
            display: flex;
            justify-content: space-between;
            padding: 0.25rem 0;
            border-bottom: 1px dashed #ddd;
        }
    </style>
@endpush
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 mw-450">

                <div class="mb-4">
                    <h5 class="fw-bold text-muted">Ad Details</h5>
                    <ul class="details-list">
                        <li>
                            <span>Rate per Day:</span>
                            <strong>{{ format_amount($ad?->payment?->rate ?? 0) }}</strong>
                        </li>
                        <li>
                            <span>Start Date:</span>
                            <strong>{{ now()->format('jS F Y') }}</strong>
                        </li>
                        <li>
                            <span>End Date:</span>
                            <strong>
                                {{ now()->addDays($ad?->total_days ?? 0)->format('jS F Y') }}
                            </strong>
                        </li>
                        <li>
                            <span>Total Days:</span>
                            <strong>{{ $ad?->formatted_total_days ?? '' }}</strong>
                        </li>
                        <li>
                            <span>Total Amount:</span>
                            <strong>{{ format_amount($ad?->payment?->amount ?? 0) }}</strong>
                        </li>
                    </ul>
                    <div class="alert alert-info small">
                        <strong>Note:</strong> This ad has been approved. After successful payment, it will go live
                        instantly and remain active for the purchased duration.
                    </div>
                </div>

                <div class="card-wrapper mb-3">
                    <label for="card-element" class="form-label fw-semibold text-muted">
                        Enter Card Details
                    </label>
                    <div id="card-element" class="form-control bg-white rounded-3 border border-2"></div>
                </div>
                <div class="d-grid">
                    <button type="button" class="btn btn-warning text-dark px-4 py-2 rounded-pill fw-bold shadow-sm"
                        id="pay-now">
                        Pay Now <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // INITIALIZE STRIPE 
            let csrf = "{{ csrf_token() }}";
            let options = {
                headers: {
                    'X-CSRF-Token': csrf
                },
                method: "POST"
            };
            const stripe = Stripe('{{ env('STRIPE_KEY') }}');
            //MOUNT CARD
            const cardElement = stripe.elements({}).create('card');
            cardElement.mount('#card-element');
            let payBtn = $('#pay-now');

            //MAKE PAYMENT
            payBtn.on('click', async function() {
                try {
                    payBtn.addClass('btn_disabled');
                    const {
                        paymentMethod,
                        error
                    } = await stripe.createPaymentMethod({
                        type: 'card',
                        card: cardElement,
                    });

                    if (error) {
                        payBtn.removeClass('btn_disabled');
                        return;
                    }
                    //CREATE PAYMENT INTENTID
                    $.ajax({
                        type: "POST",
                        url: "{{ route('agent.ads.pay.create') }}",
                        data: {
                            id: "{{ $ad?->id ?? '' }}"
                        },
                        success: async function(res) {
                            if (res.success == 0) {
                                payBtn.removeClass('btn_disabled');
                                showToast('', res.msg, 'error');
                            } else {
                                const client_secret = res.data.client_secret;
                                const {
                                    paymentIntent,
                                    errorConfirm
                                } = await stripe.confirmCardPayment(client_secret, {
                                    payment_method: {
                                        card: cardElement,
                                        billing_details: {
                                            name: res.data.user.name,
                                            email: res.data.user.email
                                        }
                                    },
                                });
                                if (errorConfirm) {
                                    payBtn.removeClass('btn_disabled');
                                    showToast('', res.msg, 'error');
                                } else {
                                    if (paymentIntent.status == "succeeded") {
                                        window.location.href = res.data.url;
                                    } else {
                                        payBtn.removeClass('btn_disabled');
                                        showToast('', 'Payment unsuccessful.', 'error');
                                    }
                                }
                            }
                        },
                        error: function() {
                            payBtn.removeClass('btn_disabled');
                            showToast('', 'Something went wrong!', 'error');
                        }
                    });
                } catch (error) {
                    payBtn.removeClass('btn_disabled');
                    showToast('', 'Something went wrong!', 'error');
                }
            });

            function showToast(title = '', html = '', icon = 'success', position = 'top-end', timer = 5000) {
                Swal.fire({
                    toast: true,
                    title,
                    html,
                    icon,
                    position,
                    showConfirmButton: false,
                    timer,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                        toast.addEventListener('click', () => {
                            Swal.close();
                        });
                    }
                });
            };
        })
    </script>
@endpush
