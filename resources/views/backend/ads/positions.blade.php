@extends('backend.layout.app')
@push('css')
    <style>
        #showAdsPosition {
            height: 100%;
            width: 100%;
            object-fit: 'contain';
        }
    </style>
@endpush
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-center">ID</th>
                    <th style="width: 50%;">Name</th>
                    <th style="width: 15%;" class="text-center">Price</th>
                    <th style="width: 25%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ads as $item)
                    <tr>
                        <td style="width: 10%;" class="text-center">
                            {{ $item->id }}
                        </td>
                        <td style="width: 50%;">
                            {{ $item->name }}
                        </td>
                        <td style="width: 15%;" class="text-center">
                            {{ format_amount($item->price) }}/day
                        </td>
                        <td style="width: 100%;" class="d-flex border-0 justify-content-center gap-2">
                            <button class="btn btn-success viewBtn" data-img="{{ $item->image() }}"
                                data-name="{{ $item->name }}">
                                View
                            </button>
                            <button class="btn btn-primary editBtn" data-name="{{ $item->name }}"
                                data-price="{{ $item->price }}" data-id="{{ $item->id }}">
                                Edit
                            </button>
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
    <div class="modal fade" id="viewPositionModal" tabindex="-1" role="dialog" aria-labelledby="viewPositionModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPositionModalLabel"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        data-modal="viewPositionModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Ads Position" id="showAdsPosition">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        data-modal="viewPositionModal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editPositionModal" tabindex="-1" role="dialog" aria-labelledby="editPositionModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Position</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.ads.update') }}" method="POST" autocomplete="off" id="adsPositionForm">
                        <input type="hidden" value="" name="banner_id" id="banner_id">
                        <span class="error banner_id_error"></span>
                        <div class="form-group">
                            <label for="name">Banner Name</label>
                            <input type="text" name="name" value="" id="name"
                                placeholder="Enter banner name" class="form-control">
                            <span class="error name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="text" name="price" value="" id="price" placeholder="Enter price"
                                    class="form-control" style="width: 90%;">
                                <label class="m-0">
                                    / day
                                </label>
                            </div>
                            <span class="error price_error"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.viewBtn').on('click', function() {
                $('#viewPositionModalLabel').html($(this).data('name'));
                $('#showAdsPosition').attr('src', $(this).data('img'));
                $('#viewPositionModal').modal('show');
            });

            $('.editBtn').on('click', function() {
                $('#name').val($(this).data('name'));
                $('#banner_id').val($(this).data('id'));
                $('#price').val($(this).data('price'));
                $('#editPositionModal').modal('show');
            });

            $('#updateBtn').on('click', function() {
                $('#adsPositionForm').submit();
            });

            $('#adsPositionForm').on('submit', function(e) {
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
                    beforeSend: function(){
                        $('#updateBtn').html('...');
                    },
                    complete: function(){
                        $('#updateBtn').html('Update');
                    }
                });
            });
        })
    </script>
@endpush
