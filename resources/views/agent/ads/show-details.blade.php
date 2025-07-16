<div class="container my-4">
    @if (!$ads)
        <p class="text-center">No Records Found</p>
    @else
        <div class="card p-4 shadow-sm">

            <h5 class="mb-3">Ad Information</h5>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <strong>Position:</strong> {{ $ads?->position?->name ?? '-' }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Status:</strong> {!! $ads?->formatted_status ?? '-' !!}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Start Date:</strong> {{ $ads?->formatted_date('start_date') }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>End Date:</strong> {{ $ads?->formatted_date('end_date') }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Duration:</strong> {{ $ads?->formatted_total_days  }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Ad URL:</strong> <a href="{{ $ads?->ad_url ?? '-' }}"
                        target="_blank">{{ string_limit($ads?->ad_url ?? '-', 50) }}</a>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Uploaded Image:</strong>
                    <a href="javascript:void(0);" data-url="{{ $ads?->image() }}" class="ad_image">
                        View
                    </a>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Applied On:</strong> {{ $ads?->formatted_date('applied_on') }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Approved On:</strong> {{ $ads?->formatted_date('approved_on') }}
                </div>
            </div>
        </div>

        <div class="card p-4 shadow-sm mt-4">
            <h5 class="mb-3">Payment Details</h5>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <strong>Transaction ID:</strong> {{ $ads?->payment?->txn_id ?? '-' }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Payment Status:</strong>
                    {{ empty($ads?->payment?->txn_id) ? '-' : $ads?->payment?->payment_status }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Payment Amount:</strong> 
                    {{ format_amount($ads?->payment?->amount ?? 0) }}
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Rate Per Day:</strong> 
                    {{ format_amount($ads?->payment?->rate ?? 0) }}/day
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Payment Completed:</strong> 
                    {{ $ads?->formatted_date('payment_completed') }}
                </div>
            </div>
        </div>
    @endif

</div>
