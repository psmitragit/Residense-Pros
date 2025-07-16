@extends('agent.layout.app')
@push('css')
    <style>
        .loader-wrapper {
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .swal2-image-custom {
            max-width: 90%;
            height: auto !important;
        }

        .swal2-popup.swal2-modal.swal2-show {
            width: 80%
        }

        .swal2-icon-warning.swal2-popup.swal2-modal.swal2-show{
            width: auto !important;
        }
    </style>
@endpush
@section('content')
    <div class="container filter-wrapper">
        <form action="" method="GET" class="row g-3 align-items-end" autocomplete="off">
            <div class="col-md-2">
                <label for="position" class="form-label">Position</label>
                <select class="form-select" name="position" id="position">
                    <option value="">All</option>
                    @foreach ($positions as $item)
                        <option value="{{ $item->id }}" {{ $selectedPostion == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="">All</option>
                    @foreach ($statuses as $key => $item)
                        <option value="{{ $key }}" {{ $selectedStatus == $key ? 'selected' : '' }}>
                            {{ $item }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                @if (!empty(request()->position) || !empty(request()->status))
                    <a href="{{ route('agent.ads.all') }}" class="btn btn-danger">Clear</a>
                @endif
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 25%;">Name</th>
                    <th style="width: 20%;" class="text-center">Status</th>
                    <th style="width: 10%;" class="text-center">Start</th>
                    <th style="width: 10%;" class="text-center">End</th>
                    <th style="width: 10%;" class="text-center">Price</th>
                    <th style="width: 25%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ads as $item)
                    <tr>
                        <td>
                            <a href="javascript:void(0);"
                                data-url="{{ route('agent.ads.preview.details', ['id' => $item->id]) }}"
                                class="show_details">
                                {{ $item?->position?->name ?? '' }}
                            </a>
                        </td>
                        <td class="text-center">
                            {!! $item?->formatted_status ?? '' !!}
                        </td>
                        <td class="text-center">
                            {{ $item->formatted_date('start_date') }}
                        </td>
                        <td class="text-center">
                            {{ $item->formatted_date('end_date') }}
                        </td>
                        <td class="text-center">
                            {{ format_amount($item?->payment?->amount ?? '') }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                @if ($item?->status == 'pending_payment')
                                    <a href="{{ route('agent.ads.pay', ['id' => $item->id]) }}" class="btn btn-secondary">
                                        Make Payment
                                    </a>
                                @endif
                                @if ($item?->status == 'pending_approval')
                                    <button class="btn btn-danger confirmation"
                                        data-url="{{ route('agent.ads.withdrawal', ['id' => $item->id]) }}"
                                        data-msg="Are you sure you want to remove this ad?">
                                        Remove
                                    </button>
                                @endif
                                @if ($item?->status == 'active' && is_expired($item->end_date) == 0)
                                    <a href="{{ $item->liveUrl() }}" class="btn btn-primary" target="_blank">
                                        View
                                    </a>
                                @endif
                                @if ($item?->status == 'active' && is_expired($item->end_date) == 1)
                                    {{-- <a href="{{ $item->liveUrl() }}" class="btn btn-warning" target="_blank">
                                        Renew Ad
                                    </a> --}}
                                    -
                                @endif
                                @if ($item?->status == 'reject')
                                    {{-- <a href="{{ $item->liveUrl() }}" class="btn btn-warning" target="_blank">
                                        Reapply
                                    </a> --}}
                                    -
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No records found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        @if ($ads->lastPage() > 1)
            @include('backend.layout.inc.paginate', ['item' => $ads])
        @endif
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="viewAdDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewAdDetailsModal"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewAdDetailsModalLabel">Ad Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        data-modal="viewAdDetailsModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        data-modal="viewAdDetailsModal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.table-responsive').on('click', '.confirmation', function() {
                let url = $(this).data('url');
                let msg = $(this).data('msg');
                Swal.fire({
                    title: '',
                    text: msg,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            $('.table-responsive').on('click', '.show_details', function() {
                let url = $(this).data('url');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(res) {
                        $('#viewAdDetailsModal .modal-body').html(res);
                    },
                    beforeSend: function() {
                        $('#viewAdDetailsModal .modal-body').html(
                            '<div class="loader-wrapper"><i class="fas fa-circle-notch fa-spin"></i></div>'
                        );
                        $('#viewAdDetailsModal').modal('show');
                    }
                });
            });

            $('#viewAdDetailsModal').on('click', '.ad_image', function() {
                let img = $(this).data('url');
                Swal.fire({
                    imageUrl: img,
                    confirmButtonText: 'Close',
                    customClass: {
                        image: 'swal2-image-custom'
                    }
                });
            });
        })
    </script>
@endpush
