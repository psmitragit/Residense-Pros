@if (!empty($activeAds))
    <div class="container ad_module_1 ad_module">
        <div class="row d-flex justify-content-center my-60px">
            @if (count($activeAds) == 1)
                <div class="add-banner adv1 my-4 text-center">
                    <a href="{{ $activeAds[0]->ad_url }}" target="_blank" rel="noopener">
                        <img src="{{ $activeAds[0]->image() }}" alt="Ad Banner" class="img-fluid">
                    </a>
                </div>
            @else
                <div class="single-item">
                    @foreach ($activeAds as $key => $item)
                            <a href="{{ $item->ad_url }}" target="_blank" rel="noopener">
                                <img src="{{ $item->image() }}" alt="Ads Image" />
                            </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@else
    <div class="py-3"></div>
@endif
