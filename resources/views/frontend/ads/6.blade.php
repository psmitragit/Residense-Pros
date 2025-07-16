@if (!empty($activeAds))
    <div class="add-banner text-center my-5 ad_module_6">
        @if (count($activeAds) == 1)
            <a href="{{ $activeAds[0]->ad_url }}" target="_blank" rel="noopener">
                <img src="{{ $activeAds[0]->image() }}" class="img-fluid shadow-sm" alt="Ad 300x250">
            </a>
        @else
            <div class="single-item">
                @foreach ($activeAds as $key => $item)
                    <a href="{{ $item->ad_url }}" target="_blank" rel="noopener">
                        <img src="{{ $item->image() }}" class="img-fluid shadow-sm" alt="Ad 300x250">
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endif
