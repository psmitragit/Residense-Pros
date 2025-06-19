@extends('backend.layout.app')

@section('content')
    <div class="d-flex my-3">
        <a href="{{ route('admin.blog.add') }}" class="btn btn-secondary">Add</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 15%;">Author</th>
                    <th style="width: 25%">Categories</th>
                    <th style="width: 20%;">Published At</th>
                    <th style="width: 20%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $item)
                    <tr>
                        <td style="width: 20%;">{{ $item->name ?? '-' }}</td>
                        <td style="width: 15%;">{{ $item->author ?? '-' }}</td>
                        <td style="width: 20%;">
                            @forelse ($item->categories as $index => $category)
                                {{ $category->name }}@if (!$loop->last)
                                    ,
                                @endif
                            @empty
                                -
                            @endforelse
                        </td>
                        <td style="width: 20%;">
                            {{ format_date($item->published_at) }}
                        </td>
                        <td class="d-flex gap-2 justify-content-center align-items-center">
                            <a href="{{ route('admin.blog.edit', ['id' => $item->id]) }}" class="btn btn-success px-3 py-1">
                                Edit
                            </a>
                            <button data-url="{{ route('admin.blog.delete', ['id' => $item->id]) }}"
                                class="btn btn-danger px-3 py-1 delete">
                                Delete
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
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete').on('click', function() {
                let url = $(this).data('url');
                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete this post?",
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
