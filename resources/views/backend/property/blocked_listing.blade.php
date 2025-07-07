@extends('backend.layout.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 15%;">Name</th>
                    <th style="width: 15%;">Owner</th>
                    <th style="width: 20%">Address</th>
                    <th style="width: 20%;">Published At</th>
                    <th style="width: 15%;">Blocked At</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($properties as $item)
                    <tr>
                        <td style="width: 20%;">
                            {{ $item->name }}
                        </td>
                        <td style="width: 15%;">
                            {{ $item?->user?->name ?? '' }}
                        </td>
                        <td style="width: 20%;">
                            {{ $item?->address ?? '' }}
                        </td>
                        <td style="width: 20%;">
                            {{ format_date($item->published_at) }}
                        </td>
                        <td style="width: 20%;">
                            {{ format_date($item->blocked_at) }}
                        </td>
                        <td class="d-flex gap-2 justify-content-center align-items-center border-0">
                            <button class="btn btn-primary unblockProperty" data-action="block"
                                data-url="{{ route('admin.property.do.unblock', ['id' => $item->id]) }}">
                                Unblock
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($properties->lastPage() > 1)
            @include('backend.layout.inc.paginate', ['item' => $properties])
        @endif
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.unblockProperty').on('click', function() {
                let url = $(this).data('url');
                Swal.fire({
                    title: "Confirmation!",
                    text: "Are you sure you want to unblock this property?",
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
