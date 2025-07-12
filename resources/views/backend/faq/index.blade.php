@extends('backend.layout.app')

@push('css')
    <style>
        #sortable-faq tr {
            cursor: grab;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex my-3">
        <button class="btn btn-secondary" id="addFaq">
            Add
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 30%;">Question</th>
                    <th style="width: 30%;">Answer</th>
                    <th style="width: 25%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sortable-faq">
                @forelse ($faq as $item)
                    <tr data-id="{{ $item->id }}" style="width: 100%;">
                        <td>
                            {{ $item->question }}
                        </td>
                        <td>
                            {{ $item->answer }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-item-center gap-2">
                                <button class="btn btn-success editBtn"
                                    data-url="{{ route('admin.faq.get', ['id' => $item->id]) }}">
                                    Edit
                                </button>
                                <button class="btn btn-danger deletebtn"
                                    data-url="{{ route('admin.faq.delete', ['id' => $item->id]) }}">
                                    Delete
                                </button>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="addEditFaqModal" tabindex="-1" role="dialog" aria-labelledby="addEditFaq"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEditFaq"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        data-modal="addEditFaqModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.faq.add.edit') }}" autocomplete="off" method="POST" id="addEditFaqForm">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" name="question">
                            <span class="error question_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="question">Answer</label>
                            <textarea name="answer" id="answer" cols="30" rows="10" class="form-control"></textarea>
                            <span class="error answer_error"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        data-modal="viewPositionModal">Close</button>
                    <button class="btn btn-primary" id="submitBtn">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#addFaq').on('click', function() {
                $('#addEditFaq').html('Add new FAQ');
                $('#addEditFaqForm')[0].reset();
                $('#addEditFaqForm input[name="id"]').val('');
                $('#addEditFaqForm input[name="question"]').val('');
                $('#addEditFaqForm textarea[name="answer"]').val('');
                $('#addEditFaqModal').modal('show');
            });

            $('.editBtn').on('click', function() {
                let url = $(this).data('url');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(res) {
                        $('#addEditFaq').html('Edit FAQ');
                        $('#addEditFaqForm')[0].reset();
                        $('#addEditFaqForm input[name="id"]').val(res.data.id);
                        $('#addEditFaqForm input[name="question"]').val(res.data.question);
                        $('#addEditFaqForm textarea[name="answer"]').val(res.data.answer);
                        $('#addEditFaqModal').modal('show');
                    }
                });
            });

            $('#submitBtn').on('click', function() {
                $('#addEditFaqForm').submit();
            });

            $('#addEditFaqForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(e.target);
                $.ajax({
                    type: e.target.method,
                    url: e.target.action,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.errors) {
                                showValidationError(res.errors);
                            } else {
                                showToast(res.msg, '', 'error');
                            }
                        } else {
                            window.location.reload();
                        }
                    },
                    beforeSend: function() {
                        $('.error').empty();
                        $('#submitBtn').html('...');
                    },
                    complete: function() {
                        $('#submitBtn').html('Submit');
                    }
                });
            });

            $('#sortable-faq').sortable({
                placeholder: "ui-state-highlight",
                update: function(event, ui) {
                    let sortedIDs = $(this).children('tr').map(function() {
                        return $(this).data('id');
                    }).get();
                    console.log(sortedIDs);
                    $.ajax({
                        url: '{{ route('admin.faq.sort') }}',
                        method: 'POST',
                        data: {
                            order: sortedIDs
                        },
                        success: function(res) {
                            console.log(res);
                        }
                    });
                }
            });
            $('#sortable-faq').disableSelection();

            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                let deleteUrl = $(this).data('url');

                Swal.fire({
                    title: '',
                    text: "Are you sure you want to delete this FAQ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        })
    </script>
@endpush
