@extends('backend.layout.app')

@section('content')
    <div class="row pb-4">
        <strong>Total Earning: <span class="text-success">{{ $totalRevenue }}</span></strong>
    </div>
    <div class="container filter-wrapper">
        <form action="" method="GET" class="row g-3 align-items-end" autocomplete="off">
            <div class="col-md-2">
                <label for="agent" class="form-label">Agent</label>
                <select class="form-select" name="agent" id="agent">
                    <option value="">All</option>
                    @foreach ($agents as $item)
                        <option value="{{ $item->id }}" {{ $selectedAgent == $item->id ? 'selected' : '' }}>
                            {{ $item->first_name }} {{ $item->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="plan" class="form-label">Plan</label>
                <select class="form-select" name="plan" id="plan">
                    <option value="">All</option>
                    @foreach ($plans as $item)
                        <option value="{{ $item->id }}" {{ $selectedPlan == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="start_date" class="form-label">Payment From</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                    value="{{ request()->start_date ?? '' }}">
            </div>
            <div class="col-md-2">
                <label for="end_date" class="form-label">Payment To</label>
                <input type="date" name="end_date" id="end_date" class="form-control"
                    value="{{ request()->end_date ?? '' }}">
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                @if (
                    !empty(request()->position) ||
                        !empty(request()->agent) ||
                        !empty(request()->plan) ||
                        !empty(request()->start_date) ||
                        !empty(request()->end_date))
                    <a href="{{ route('admin.subscription.history') }}" class="btn btn-danger">Clear</a>
                @endif
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 15%;">Subscription</th>
                    <th style="width: 20%;">Amount</th>
                    <th style="width: 20%;">Payment Date</th>
                    <th style="width: 20%;">Subscription End Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($histories as $item)
                    <tr>
                        <td style="width: 20px;">
                            {{ $item?->user?->name ?? '' }}
                        </td>
                        <td style="width: 15%;">
                            {{ $item?->plan?->name ?? '' }}
                        </td>
                        <td style="width: 20%;">
                            {{ format_amount($item->amount) }}
                        </td>
                        <td style="width: 20%;">
                            {{ format_date($item->payment_completed) }}
                        </td>
                        <td style="width: 20%;">
                            {{ format_date($item->subscription_end_date) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($histories->lastPage() > 1)
            @include('backend.layout.inc.paginate', ['item' => $histories])
        @endif
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.blockProperty').on('click', function() {
                let url = $(this).data('url');
                Swal.fire({
                    title: "Confirmation!",
                    text: "Are you sure you want to block this property?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

        })
    </script>
@endpush
