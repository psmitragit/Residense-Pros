@extends('agent.layout.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Property</th>
                    <th style="width: 15%;">Name</th>
                    <th style="width: 10%;">Email</th>
                    <th style="width: 10%;">Phone</th>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 30%;">Message</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($enquiries as $item)
                    <tr>
                        <td style="width: 20%;">
                            {{ $item?->property?->name ?? '-' }}
                        </td>
                        <td style="width: 15%;">
                            {{ $item->name ?? '-' }}
                        </td>
                        <td style="width: 10%;">
                            {{ $item->email }}
                        </td>
                        <td style="width: 10%;">
                            {{ $item->phone }}
                        </td>
                        <td style="width: 15%;">
                            {{ format_date($item->created_at, 'jS F, Y') }}
                        </td>
                        <td style="width: 30%;">
                            {{ $item->message }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            No records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($enquiries->lastPage() > 1)
            @include('backend.layout.inc.paginate', ['item' => $enquiries])
        @endif
    </div>
@endsection
