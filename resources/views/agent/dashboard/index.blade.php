@extends('agent.layout.app')

@push('css')
<style>
    .dashboard-card {
        transition: transform 0.3s;
        cursor: pointer;
        color: #fff;
        border: none;
        border-radius: 0.5rem;
    }

    .dashboard-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    .dashboard-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        transition: transform 0.3s;
        display: inline-block;
    }

    .dashboard-card:hover .dashboard-icon {
        transform: scale(1.2);
    }

    .bg-gradient-blue {
        background: linear-gradient(to right, #4e73df, #224abe);
    }

    .bg-gradient-green {
        background: linear-gradient(to right, #1cc88a, #17a673);
    }

    .bg-gradient-orange {
        background: linear-gradient(to right, #f6c23e, #dda20a);
    }

    .bg-gradient-red {
        background: linear-gradient(to right, #e74a3b, #be2617);
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <div class="col-md-3">
            <a href="{{ route('agent.ads.all', ['status' => 'pending_payment']) }}" class="text-decoration-none">
                <div class="card dashboard-card bg-gradient-blue text-center">
                    <div class="card-body">
                        <div class="dashboard-icon"><i class="fas fa-credit-card"></i></div>
                        <h6>Pending Ads Payment</h6>
                        <h3>{{ $pendingAdsPayment ?? 0 }}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('agent.property.published') }}" class="text-decoration-none">
                <div class="card dashboard-card bg-gradient-green text-center">
                    <div class="card-body">
                        <div class="dashboard-icon"><i class="fas fa-home"></i></div>
                        <h6>Listed Properties</h6>
                        <h3>{{ $listedProperties ?? 0 }}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('agent.enquiry.index') }}" class="text-decoration-none">
                <div class="card dashboard-card bg-gradient-orange text-center">
                    <div class="card-body">
                        <div class="dashboard-icon"><i class="fas fa-question-circle"></i></div>
                        <h6>Total Enquiries</h6>
                        <h3>{{ $totalEnquiry ?? 0 }}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('agent.ads.all', ['status' => 'completed']) }}" class="text-decoration-none">
                <div class="card dashboard-card bg-gradient-red text-center">
                    <div class="card-body">
                        <div class="dashboard-icon"><i class="fas fa-check-circle"></i></div>
                        <h6>Completed Ads</h6>
                        <h3>{{ $completedAds ?? 0 }}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
