@extends('frontend.layout.app')

@section('content')
    <div class="container pt-4 pb-5 py-md-5 px-3 px-md-0 add-property-page text-center">
        <div class="card shadow-lg border-0 rounded-4 bg-light">
            <div class="card-body py-5 px-4">
                @if (!empty($plan))
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
                    </div>
                    <h2 class="fw-bold mb-3" style="font-family: var(--bold); font-size: clamp(1.75rem, 4vw, 2.5rem);">
                        Thank you for subscribing to the
                        <span class="text-primary">
                            {{ $plan?->plan?->name ?? '' }}
                            Plan
                        </span>!
                    </h2>
                    <p class="text-muted mb-4" style="font-family: var(--reg); font-size: clamp(1rem, 2vw, 1.125rem);">
                        Your subscription is now active. Here's a summary of your plan:
                    </p>
                    <div class="row justify-content-center text-start mb-4">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent">
                                    <strong style="font-family: var(--semibold);">Plan Name:</strong>
                                    <span style="font-family: var(--reg);">{{ $plan?->plan?->name ?? '' }}</span>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <strong style="font-family: var(--semibold);">Plan Duration:</strong>
                                    <span style="font-family: var(--reg);"> 1 Month</span>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <strong style="font-family: var(--semibold);">Plan Expiry:</strong>
                                    <span style="font-family: var(--reg);">{{format_date($plan?->subscription_end_date),}}</span>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <strong style="font-family: var(--semibold);">Plan Benefits:</strong>
                                    <ul class="mt-2 list-unstyled" style="font-family: var(--reg);">
                                        {!! $plan?->plan?->features() ?? '' !!}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('property.add') }}" class="btn btn-success px-4 py-2 rounded-pill"
                        style="font-family: var(--semibold); font-size: 1rem;">
                        Add Your First Property
                    </a>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-times-circle text-danger mb-3" style="font-size: 3rem;"></i>
                        <h2 class="fw-bold mb-3" style="font-family: var(--bold); font-size: clamp(1.75rem, 4vw, 2.25rem);">
                            Payment Cancelled
                        </h2>
                        <p class="text-muted mb-4" style="font-family: var(--reg); font-size: clamp(1rem, 2vw, 1.125rem);">
                            Your subscription could not be processed or was cancelled. Please try again or contact support.
                        </p>
                        <a href="{{ route('agent.subscription') }}" class="btn btn-outline-danger px-4 py-2 rounded-pill"
                            style="font-family: var(--semibold); font-size: 1rem;">
                            View Pricing Plans
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
