@extends('backend.layout.app')
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

        .bg-gradient-purple {
            background: linear-gradient(to right, #6f42c1, #563d7c);
        }
    </style>
@endpush
@section('content')
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-3">
                <a href="{{ route('admin.ads.pending') }}" class="text-decoration-none">
                    <div class="card dashboard-card bg-gradient-blue text-center">
                        <div class="card-body">
                            <div class="dashboard-icon"><i class="fas fa-hourglass-half"></i></div>
                            <h6>Pending Approval Ads</h6>
                            <h3>{{ get_pending_approval_ads() }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.property.index') }}" class="text-decoration-none">
                    <div class="card dashboard-card bg-gradient-green text-center">
                        <div class="card-body">
                            <div class="dashboard-icon"><i class="fas fa-home"></i></div>
                            <h6>Active Properties</h6>
                            <h3>{{ $activeProperties ?? 0 }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.agent.index') }}" class="text-decoration-none">
                    <div class="card dashboard-card bg-gradient-orange text-center">
                        <div class="card-body">
                            <div class="dashboard-icon"><i class="fas fa-user-tie"></i></div>
                            <h6>Total Agents</h6>
                            <h3>{{ $totalAgents ?? 0 }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.subscription.history') }}" class="text-decoration-none">
                    <div class="card dashboard-card bg-gradient-red text-center">
                        <div class="card-body">
                            <div class="dashboard-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
                            <h6>Subscription Revenue</h6>
                            <h3>{{ $subscriptionRevenue ?? "$0" }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.ads.revenue') }}" class="text-decoration-none">
                    <div class="card dashboard-card bg-gradient-purple text-center">
                        <div class="card-body">
                            <div class="dashboard-icon"><i class="fa-solid fa-audio-description"></i></div>
                            <h6>Ads Revenue</h6>
                            <h3>{{ $adsRevenue ?? "$0" }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
