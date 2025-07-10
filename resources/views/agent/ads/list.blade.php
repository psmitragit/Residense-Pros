@extends('agent.layout.app')

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
                <tr>
                    <td colspan="4" class="text-center">No records found</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

        })
    </script>
@endpush
