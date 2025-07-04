@extends('agent.layout.app')

@section('content')
    <p>
        <strong>
            @if (empty($curentSubscription))
                You don't have any subscription
            @else
                {!! $curentSubscription?->getEndDateMessage() !!}
            @endif
        </strong>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Subscription Name</th>
                    <th style="width: 15%;">Amount</th>
                    <th style="width: 15%;">Limit</th>
                    <th style="width: 30%;" class="text-center">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subscriptions as $item)
                    <tr>
                        <td style="width: 20%;">
                            {{ $item->plan->name ?? '-' }}
                        </td>
                        <td style="width: 15%;">
                            {{ format_amount($item->amount) ?? '-' }}
                        </td>
                        <td style="width: 15%;">
                            {{ $item->plan->getLimit() }}
                        </td>
                        <td style="width: 30%;" class="text-center">
                            {{ format_date($item->payment_completed, 'jS F, Y \a\t h:i A') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            No records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
