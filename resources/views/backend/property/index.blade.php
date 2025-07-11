@extends('backend.layout.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 15%;">Owner</th>
                    <th style="width: 25%">Address</th>
                    <th style="width: 20%;">Published At</th>
                    <th style="width: 20%;" class="text-center">Action</th>
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
                        <td class="d-flex gap-2 justify-content-center align-items-center border-0">
                            <a href="{{ route('property.details', ['slug' => $item->slug]) }}" class="btn btn-primary"
                                target="_blank">
                                View
                            </a>
                            <button class="btn btn-danger blockProperty" data-action="block"
                                data-url="{{ route('admin.property.do.block', ['id' => $item->id]) }}">
                                Block
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No records found</td>
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
