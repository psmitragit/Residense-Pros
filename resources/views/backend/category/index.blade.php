@extends('backend.layout.app')

@section('content')
    <div class="d-flex my-3">
        <a href="javascript:void(0);" class="btn btn-secondary" id="addCategory">Add</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">ID</th>
                    <th style="width: 30%;">Name</th>
                    <th style="width: 15%;" class="text-center">Post Count</th>
                    <th style="width: 35%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $item)
                    <tr>
                        <td style="width: 20%;">
                            {{ $item->id }}
                        </td>
                        <td style="width: 30%;">
                            {{ $item->name }}
                        </td>
                        <td style="width: 15%;" class="text-center">
                            {{ $item->blogs?->count() ?? 0 }}
                        </td>
                        <td class="d-flex gap-2 justify-content-center align-items-center">
                            <a href="javascript:void(0);" class="btn btn-success px-3 py-1 editCategory"
                                data-id="{{ $item->id }}" data-name="{{ $item->name }}">Edit</a>
                            <button data-url="{{ route('admin.categories.delete', ['id' => $item->id]) }}"
                                class="btn btn-danger px-3 py-1 deleteCategory">Delete</button>
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
    <div class="modal fade" id="categoryAddEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.categories.add-edit') }}" method="POST" id="categoryForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryAddEditLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" data-modal="categoryAddEdit"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="category_id">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Category Name">
                            <span class="error name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            data-modal="categoryAddEdit">Close</button>
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
            $('#addCategory').on('click', function() {
                $('#categoryAddEditLabel').html('Add Category');
                $('#category_id').val('');
                $('#name').val('');
                $('#categoryAddEdit').modal('show');
            });

            $('.editCategory').on('click', function() {
                $('#categoryAddEditLabel').html('Edit Category');
                $('#category_id').val($(this).data('id'));
                $('#name').val($(this).data('name'));
                $('#categoryAddEdit').modal('show');
            });

            $('#categoryForm').on('submit', function(e) {
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
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                showToast(response.msg || 'Success', '', 'success');
                            }
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
