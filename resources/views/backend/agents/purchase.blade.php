@extends('backend.layout.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 15%;">Plan</th>
                    <th style="width: 15%;" class="text-center">Price</th>
                    <th style="width: 20%" class="text-center">Subscription Start</th>
                    <th style="width: 25%;" class="text-center">Subscription End</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchased as $item)
                    <tr>
                        <td style="width: 15%;">
                            {{ $item->plan?->name ?? '' }}
                        </td>
                        <td style="width: 15%;" class="text-center">
                            {{ format_amount($item->amount) }}
                        </td>
                        <td style="width: 20%;" class="text-center">
                            {{ format_date($item->payment_completed) }}
                        </td>
                        <td style="width: 25%;" class="text-center">
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
        @if ($purchased->lastPage() > 1)
            @include('backend.layout.inc.paginate', ['item' => $purchased])
        @endif
    </div>
@endsection
