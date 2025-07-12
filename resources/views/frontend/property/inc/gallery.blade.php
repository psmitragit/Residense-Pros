<div class="property-main-image position-relative">
    <div class="slider-for position-relative">
        @foreach ($property->getImages() as $key => $item)
            <div>
                <img src="{{ $item }}" alt="Property Image {{ $key + 1 }}" />
                <div class="property-badges-wrapper">
                    @if ($property->property_type == 'rent')
                        <span class="property-badge-custom" data-badge-type="rent">
                            Rent
                        </span>
                    @endif
                    @if (format_date($property->published_at, 'Y-m-d') == date('Y-m-d'))
                        <span class="property-badge-custom" data-badge-type="new">
                            New
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="mt-2">
    <div class="slider-nav">
        @foreach ($property->getImages() as $key => $item)
            <div>
                <img src="{{ $item }}" alt="Property Image {{ $key + 1 }}" />
            </div>
        @endforeach
    </div>
</div>
