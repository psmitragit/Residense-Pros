@extends('backend.layout.app')

@section('content')
    <div class="p-4">
        <h4>Customize Subscription Plans</h4>
        <form action="{{ route('admin.subscription.save') }}" method="POST" id="subscriptionForm" autocomplete="OFF" class="mt-3">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 20%;">Tier</th>
                            <th style="width: 25%;">Name</th>
                            <th style="width: 25%;">Price</th>
                            <th style="width: 25%;">Limit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $key => $item)
                            <tr>
                                <td>
                                    <strong>Tier {{ $key + 1 }}</strong>
                                </td>
                                <td>
                                    <input type="text" name="subscriptions[{{ $key }}][name]"
                                        value="{{ $item->name }}" class="form-control">
                                    <span class="error name_{{ $key }}_error text-danger"></span>
                                </td>
                                <td>
                                    <input type="number" step="0.01" name="subscriptions[{{ $key }}][price]"
                                        value="{{ $item->price }}" class="form-control">
                                    <span class="error price_{{ $key }}_error text-danger"></span>
                                </td>
                                <td>
                                    <input type="number" name="subscriptions[{{ $key }}][limit]"
                                        value="{{ $item->limit }}" class="form-control">
                                    <span class="error limit_{{ $key }}_error text-danger"></span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>
                    <strong>Note:</strong> If you want to allow unlimited property listings, set the limit to <strong>0</strong>.
                </p>
                <div class="d-flex justify-content-start">
                    <button class="btn btn-primary" id="saveBtn">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('#subscriptionForm').on('submit', function(e) {
                e.preventDefault();
                $('.error').empty()
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
                                showToast('', res.msg || 'Something went wrong', 'warning');
                            }
                        } else {
                            showToast('', res.msg || 'Successfully updated', 'success');
                        }
                    },
                    beforeSend: function() {
                        $('#saveBtn').addClass('btn_disabled');
                    },
                    complete: function() {
                        $('#saveBtn').removeClass('btn_disabled');
                    }
                });

            });
        });
    </script>
@endpush
