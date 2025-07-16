@if (!empty($activeAds))
    <div class="container ad_module_4 ad_module">
        <div class="row d-flex justify-content-center my-60px">
            @if (count($activeAds) == 1)
                <a href="{{ $activeAds[0]->ad_url }}" target="_blank" rel="noopener">
                    <img src="{{ $activeAds[0]->image() }}" class="img-fluid shadow-sm"
                        alt="Ad 300x600">
                </a>
            @else
                <div class="single-item">
                    @foreach ($activeAds as $key => $item)
                        <a href="{{ $item->ad_url }}" target="_blank" rel="noopener">
                            <img src="{{ $item->image() }}" class="img-fluid shadow-sm"
                                alt="Ad 300x600">
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endif
