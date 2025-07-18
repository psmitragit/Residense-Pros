@extends('agent.layout.app')

@section('content')
    @if ($showAdd ?? false)
        <div class="d-flex my-3 justify-content-between">
            <h5>Properties</h5>
            <a href="{{ route('property.add') }}" class="btn btn-secondary" target="_blank">Add</a>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 10%;" class="text-center">Views</th>
                    <th style="width: 10%;">Type</th>
                    <th style="width: 20%;">Price</th>
                    <th style="width: 30%;">Address</th>
                    <th style="width: 20%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($properties as $item)
                    <tr>
                        <td>
                            {{ $item->name ?? '-' }}
                        </td>
                        <td class="text-center">
                            {{ $item->total_views ?? '-' }}
                        </td>
                        <td>
                            {{ empty($item->property_type) ? '-' : ucfirst($item->property_type) }}
                        </td>
                        <td>
                            {{ empty($item->price) ? '-' : format_amount($item->price) . '/' . $item->price_type }}
                        </td>
                        <td>
                            {{ $item->address ?? '-' }}
                        </td>
                        <td class="d-flex justify-content-center align-items-center gap-2 border-0">
                            @if (in_array('view', $btnAction))
                                <a href="{{ route('property.details', ['slug' => $item->slug]) }}" class="btn btn-primary"
                                    target="_blank">
                                    View
                                </a>
                            @endif
                            @if (in_array('update', $btnAction))
                                <a href="{{ route('property.update', ['id' => $item->id]) }}" class="btn btn-success"
                                    target="_blank">
                                    Update
                                </a>
                            @endif
                            @if (in_array('archive', $btnAction))
                                <button class="btn btn-danger archiveUnarchiveProp" data-action="archive"
                                    data-url="{{ route('agent.property.do.archive', ['id' => $item->id]) }}">
                                    Archive
                                </button>
                            @endif
                            @if (in_array('unarchive', $btnAction))
                                <button class="btn btn-success archiveUnarchiveProp" data-action="unarchive"
                                    data-url="{{ route('agent.property.do.unarchive', ['id' => $item->id]) }}">
                                    Unarchive
                                </button>
                            @endif
                        @empty($btnAction)
                            -
                        @endempty
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        No records found.
                    </td>
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
    window.addEventListener('DOMContentLoaded', function() {
        $('.archiveUnarchiveProp').click(function() {
            let action = $(this).data('action');
            Swal.fire({
                title: '',
                text: "Are you sure you want to " + (action == 'archive' ? 'archive' :
                    'unarchive') + " this property?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = $(this).data('url');
                }
            });
        });
    });
</script>
@endpush
