@extends('agent.layout.app')

@section('content')
    <style>
        .mw-450 {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
        }

        .status-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 36px;
        }

        .status-success {
            background-color: #d4edda;
            color: #28a745;
        }

        .status-fail {
            background-color: #f8d7da;
            color: #dc3545;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 mw-450 text-center">
                @if ($payment->payment_status == 'success')
                    <div id="payment-success">
                        <div class="status-icon status-success">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <h3 class="fw-bold">Thank You!</h3>
                        <p class="text-muted">Your payment was successful and your ad is now live.</p>
                        <div class="alert alert-success small mt-3">
                            Your ad is now live and will remain active until {{ $ad->formatted_date('end_date') }}. After
                            this date, it will automatically expire. No further action is required from your side until
                            then.
                        </div>
                        <a href="{{ route('agent.ads.all') }}" class="btn btn-secondary rounded-pill px-4 mt-3">
                            Go Back
                        </a>
                        <a href="{{ $ad->liveUrl() }}" target="_blank" class="btn btn-primary rounded-pill px-4 mt-3">
                            View Ad
                        </a>
                    </div>
                @else
                    <div id="payment-failed">
                        <div class="status-icon status-fail">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <h3 class="fw-bold text-danger">Payment Failed!</h3>
                        <p class="text-muted">Unfortunately, your payment could not be processed.</p>
                        <div class="alert alert-danger small mt-3">
                            Please try again or contact support if the issue persists.
                        </div>
                        <a href="{{ route('agent.ads.pay', ['id' => $ad->id]) }}"
                            class="btn btn-danger rounded-pill px-4 mt-3">
                            Try Again
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
