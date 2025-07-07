@extends('backend.layout.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 15%;">Name</th>
                    <th style="width: 15%;" class="text-center">Total listing</th>
                    <th style="width: 20%" class="text-center">Active subscription</th>
                    <th style="width: 25%;">Subscription end on</th>
                    <th style="width: 25%;" class="text-center">History</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agents as $item)
                    <tr>
                        <td style="width: 15%;">
                            {{ $item->name }}
                        </td>
                        <td style="width: 15%;" class="text-center">
                            {{ $item?->getTotalListing() ?? '0' }}
                        </td>
                        <td style="width: 20%;" class="text-center">
                            {!! $item?->active_subscription()?->name ?? '<span class="text-danger">No subscription</span>' !!}
                        </td>
                        <td style="width: 25%;">
                            {{ format_date($item?->subscription?->subscription_end_date ?? '') }}
                        </td>
                        <td style="width: 100%;" class="d-flex border-0 justify-content-center">
                            <a href="{{route('admin.agent.purchase.history', ['id'=> $item->id])}}" class="btn btn-primary">
                                Subscription History
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($agents->lastPage() > 1)
            @include('backend.layout.inc.paginate', ['item' => $agents])
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
