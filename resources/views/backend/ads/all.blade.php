@extends('backend.layout.app')
@push('css')
    <style>
        #showAdsPosition {
            height: 100%;
            width: 100%;
            object-fit: 'contain';
        }

        .loader-wrapper {
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .ads_image {
            display: flex;
            justify-content: center;
            padding: 15px 0px;
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
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="">All</option>
                    @foreach ($statuses as $key => $item)
                        <option value="{{ $key }}" {{ $selectedStatus == $key ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Approved Date From</label>
                <input type="date" name="approved_date_from" id="approved_date_from" class="form-control"
                    value="{{ request()->approved_date_from ?? '' }}">
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Approved Date To</label>
                <input type="date" name="approved_date_to" id="approved_date_to" class="form-control"
                    value="{{ request()->approved_date_to ?? '' }}">
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                @if (
                    !empty(request()->position) ||
                        !empty(request()->agent) ||
                        !empty(request()->status) ||
                        !empty(request()->approved_date_from) ||
                        !empty(request()->approved_date_to))
                    <a href="{{ route('admin.ads.all') }}" class="btn btn-danger">Clear</a>
                @endif
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 20%;">Agent</th>
                    <th style="width: 20%;">Status</th>
                    <th style="width: 15%;" class="text-center">Approved On</th>
                    <th style="width: 5%;" class="text-center">Duration</th>
                    <th style="width: 10%;" class="text-center">Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ads as $item)
                    <tr>
                        <td style="width: 20%;">
                            <a href="javascript:void(0);" class="show_details"
                                data-url="{{ route('admin.ads.show.details', ['id' => $item->id]) }}">
                                {{ $item?->position?->name ?? '' }}
                            </a>
                        </td>
                        <td style="width: 20%;">
                            {{ $item?->user?->name ?? '' }}
                        </td>
                        <td style="width: 5%;">
                            {!! $item->formatted_status !!}
                        </td>
                        <td style="width: 10%;" class="text-center">
                            {{ $item->formatted_date('approved_on') }}
                        </td>
                        <td style="width: 10%;" class="text-center">
                            {{ $item->formatted_total_days }}
                        </td>
                        <td style="width: 30%;" class="text-center">
                            {{ format_amount($item?->payment?->amount ?? 0) }}
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

            $(document).on('click', '.confirmation', function() {
                let url = $(this).data('url');
                let btn = $(this);
                let text = $(this).data('text');
                Swal.fire({
                    title: '',
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: url,
                            success: function(res) {
                                console.log(res);
                                if (res.success == 0) {
                                    showToast('', res.msg, 'error');
                                } else {
                                    window.location.href =
                                        '{{ route('admin.ads.pending') }}';
                                }
                            },
                            beforeSend: function() {
                                btn.addClass('btn_disabled');
                            },
                            complete: function() {
                                btn.removeClass('btn_disabled');
                            },
                        });
                    }
                });
            });
        })
    </script>
@endpush
