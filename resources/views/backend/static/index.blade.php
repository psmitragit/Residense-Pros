@extends('backend.layout.app')

@push('cdn')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
@endpush

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">ID</th>
                    <th style="width: 30%;">Name</th>
                    <th style="width: 30%;">Slug</th>
                    <th style="width: 35%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $item)
                    <tr>
                        <td style="width: 20%;">
                            {{ $item->id }}
                        </td>
                        <td style="width: 30%;">
                            {{ $item->name }}
                        </td>
                        <td style="width: 15%;" class="text-center">
                            {{ url($item->slug) }}
                        </td>
                        <td class="d-flex gap-2 justify-content-center align-items-center">
                            <a href="{{ url($item->slug) }}" target="_blank" class="btn btn-primary px-3 py-1">
                                View
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success px-3 py-1 editBtn"
                                data-url="{{ route('admin.static.edit', $item->id) }}">
                                Edit
                            </a>
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

@push('modal')
    <div class="modal fade" id="staticAddEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <form action="{{ route('admin.static.update') }}" method="POST" id="staticForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryAddEditLabel">Update Static Page Content</h5>
                        <button type="button" class="close" data-dismiss="modal" data-modal="staticAddEdit"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="static_id">
                        <div class="form-group">
                            <textarea name="content" id="summernote" cols="30" rows="10">

                            </textarea>
                            <span class="error content_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-modal="staticAddEdit">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // INITIALIZE SUMMERNOTE  
            $('#summernote').summernote({
                height: 450
            });
            //** INITIALIZE SUMMERNOTE  

            $('.editBtn').on('click', function() {
                let url = $(this).data('url');
                let btn = $(this);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(res) {
                        if (res.success == 1) {
                            $('#static_id').val(res.data.id);
                            $('#summernote').summernote('code', res.data.content);
                            $('#staticAddEdit').modal('show');
                        } else {
                            showToast('Something went wrong!');
                        }
                    },
                    beforeSend: function() {
                        btn.addClass('btn_disabled');
                        $('#summernote').summernote('reset');
                    },
                    complete: function() {
                        btn.removeClass('btn_disabled');
                    }
                });
            });

            $('#staticForm').on('submit', function(e) {
                e.preventDefault()
                $('.error').empty()
                let data = new FormData(e.target)
                let btn = $(this).find('button[type="submit"]');
                let oldText = btn.html();
                $.ajax({
                    url: e.target.action,
                    type: e.target.method,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data,
                    success: function(response) {
                        if (response.success == 0) {
                            if (response.errors) {
                                showValidationError(response.errors);
                            } else {
                                showToast(response.msg || 'Something Went Wrong.', '', 'error');
                            }
                        } else {
                            window.location.reload();
                        }
                    },
                    beforeSend: function() {
                        btn.css({
                            'opacity': '.5'
                        });
                        btn.html('Please wait...');
                        btn.addClass('disabled');
                    },
                    complete: function() {
                        btn.removeClass('disabled');
                        btn.css({
                            'opacity': ''
                        });
                        btn.html(oldText);
                    }
                })
            })

            $('.deleteCategory').on('click', function() {
                let url = $(this).data('url');
                Swal.fire({
                    title: "Are you sure?",
                    text: "Deleting this category will remove all links between this category and the blogs associated with it.",
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
