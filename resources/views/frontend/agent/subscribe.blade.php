@extends('frontend.layout.app')

@section('content')
    <div class="container pt-3 pb-5 py-md-5 px-3 px-md-0 add-property-page">
        <h2 class="addprop_heading text-center mb-4 fw-bold"
            style="font-family: var(--bold); font-size: clamp(1.5rem, 4vw, 2.25rem);">
            Subscribe a Plan
        </h2>

        <div class="row justify-content-center g-4">
            @foreach ($plans as $key => $item)
                @php
                    $color = getPlanColorClass($key);
                @endphp
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="plan-card shadow-sm rounded text-center overflow-hidden plan_{{ $item->id }}">
                        <div class="plan-header bg-{{ $color }} text-white py-3">
                            <h5 class="mb-1 text-uppercase plan-name"
                                style="font-family: var(--semibold); font-size: clamp(16px,3vw,22px);">
                                {{ $item->name ?? '' }}
                            </h5>
                            <p style="font-family: var(--bold); font-size: clamp(13px,3vw,16px);">Per Month</p>
                        </div>
                        <div class="plan-body bg-white py-4 px-3">
                            <h2 class="text-{{ $color }} fw-bold mb-4 plan-amount"
                                style="font-family: var(--eb); font-size: clamp(1.5rem, 3vw, 2rem);">
                                {{ format_amount($item->price) }}
                            </h2>
                            <ul class="list-unstyled text-start small"
                                style="font-family: var(--reg); font-size: clamp(0.85rem, 2vw, 1rem);">
                                {!! $item->features() !!}
                            </ul>
                            <button class="btn btn-outline-{{ $color }} mt-3 rounded-pill px-4 selectPlan"
                                style="font-family: var(--semibold);" data-id="{{ $item->id }}"
                                data-amount="{{ format_amount($item->price) }}" data-plan="{{ $item->name ?? '' }}">
                                Select
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="subscription-form p-4 p-md-5 shadow-sm" id="payForm">
                    @csrf
                    <input type="hidden" name="plan_id" value="" id="plan_id">
                    <div class="row g-4 align-items-center">
                        <div class="col-12 text-center">
                            <p class="mb-1" style="font-family: var(--semibold); font-size: clamp(16px,3vw,22px);">
                                Selected Plan</p>
                            <h5 class="plan-name text-secondary mb-0"
                                style="font-family: var(--bold); font-size: clamp(1.5rem, 3vw, 2rem);" id="planName">
                                -
                            </h5>
                        </div>

                        <div class="col-12 text-center">
                            <p class="mb-1" style="font-family: var(--semibold); font-size: clamp(16px,3vw,22px);">
                                Amount to Pay
                            </p>
                            <h5 class="plan-amount text-secondary mb-0"
                                style="font-family: var(--bold); font-size: clamp(1.5rem, 3vw, 2rem);" id="payingAmount">
                                -
                            </h5>
                        </div>

                        <div class="col-12">
                            <label for="card-element" class="form-label fw-semibold mb-2 text-muted"
                                style="font-family: var(--semibold);">Enter Card Details</label>
                            <div id="card-element" class="form-control bg-white rounded-3 border border-2">

                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="button"
                            class="btn btn-warning text-dark px-5 py-2 rounded-pill fs-6 fw-bold shadow-sm"
                            style="font-family: var(--bold); letter-spacing: 0.5px;" id="card-button">
                            Pay Now <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.selectPlan').on('click', function() {
                let id = $(this).data('id');
                let amount = $(this).data('amount');
                let plan = $(this).data('plan');
                $('.plan-card').removeClass('active');
                $('.plan_' + id).addClass('active');
                $('#payingAmount').text(amount);
                $('#planName').text(plan);
                $('#plan_id').val(id);
            });
            $('.selectPlan')[1].click();

            // {{-- STRIPE PAYMENT --}}
            let csrf = $('meta[name="csrf-token"]').attr('content'),
                options = {
                    headers: {
                        'X-CSRF-Token': csrf
                    },
                    method: "POST"
                }
            const stripe = Stripe('{{ env('STRIPE_KEY') }}');
            const cardButton = document.getElementById('card-button');
            const elements = stripe.elements({});
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');

            cardButton.addEventListener('click', async (e) => {
                $('#card-button').addClass('disabled');
                const {
                    paymentMethod,
                    error
                } = await stripe.createPaymentMethod({
                    type: 'card',
                    card: cardElement,
                });

                if (error) {
                    resetButton()
                } else {
                    let formData = new FormData(document.getElementById('payForm'));
                    let response = await fetch("{{ route('subscription.create.payment') }}", {
                        method: 'POST',
                        body: formData
                    });
                    let res = await response.json();

                    if (res.success == 0) {
                        showToast('', res.msg, 'error');
                        resetButton()
                    } else {
                        const {
                            paymentIntent,
                            error
                        } = await stripe.confirmCardPayment(res.data.client_secret, {
                            payment_method: {
                                card: cardElement,
                                billing_details: {
                                    name: res.data.user.name,
                                    email: res.data.user.email
                                }
                            },
                        })

                        if (error) {
                            resetButton()
                            showToast('', error.message, 'error')
                        } else {
                            if (paymentIntent.status == "succeeded") {
                                window.location.href = res.data.url;
                            } else {
                                showAlert('', 'Payment Unsuccessful', 'error')
                                resetButton()
                            }
                        }
                    }
                }
            });

            function resetButton() {
                $('#card-button').removeClass('disabled');
            }
        })
    </script>
@endpush
