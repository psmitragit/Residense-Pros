@extends('backend.layout.app')

@section('content')
    <div class="container filter-wrapper">
        <form action="" method="GET" class="row g-3 align-items-end" autocomplete="off">
            <div class="col-md-2">
                <label for="keyword" class="form-label">Keyword</label>
                <input type="text" class="form-control" value="{{ request()->keyword ?? '' }}" name="keyword">
            </div>
            <div class="col-md-2">
                <label for="author" class="form-label">Author</label>
                <select class="form-select" name="author" id="author">
                    <option value="">All</option>
                    @foreach ($authors as $item)
                        <option value="{{ $item }}" {{ $selectedAuthor == $item ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category" id="category">
                    <option value="">All</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $selectedCategory == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="date_from" class="form-label">Date From</label>
                <input type="date" name="date_from" id="date_from" class="form-control"
                    value="{{ request()->date_from ?? '' }}">
            </div>
            <div class="col-md-2">
                <label for="date_to" class="form-label">Date To</label>
                <input type="date" name="date_to" id="date_to" class="form-control"
                    value="{{ request()->date_to ?? '' }}">
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                @if (
                    !empty(request()->author) ||
                        !empty(request()->category) ||
                        !empty(request()->keyword) ||
                        !empty(request()->date_from) ||
                        !empty(request()->date_to))
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-danger">Clear</a>
                @endif
            </div>
        </form>
    </div>
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
                        <td class="d-flex gap-2 justify-content-center align-items-center border-0">
                            <a href="{{ route('admin.blog.edit', ['id' => $item->id]) }}"
                                class="btn btn-success px-3 py-1">
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
        @if ($blogs->lastPage() > 1)
            @include('backend.layout.inc.paginate', ['item' => $blogs])
        @endif
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
