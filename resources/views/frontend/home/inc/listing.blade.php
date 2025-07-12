@forelse ($properties as $item)
    <div class="col-lg-4 col-sm-6 col-12 col-5cards">
        <div class="card custom-card h-100 shadow-sm">
            <div class="property-image-wrapper position-relative">
                <a href="{{ route('property.details', ['slug' => $item->slug]) }}">
                    <img src="{{ $item->getFeaturedImage() }}" class="card-img-top card-img" alt="Warehouse Image">
                </a>
                <div class="property-badges-wrapper">
                    @if ($item->property_type == 'rent')
                        <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                    @endif
                    @if (format_date($item->published_at, 'Y-m-d') == date('Y-m-d'))
                        <span class="property-badge-custom" data-badge-type="new">New</span>
                    @endif
                </div>
                <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav"
                    data-url="{{ route('property.add-remove-fev') }}" data-id="{{ $item->id }}">
                    <i class="{{ is_property_favorite($item->id) ? 'fa-solid' : 'fa-regular'}} fa-heart"></i>
                </button>
                <div class="property-image-overlay">
                    <p class="property-location mb-0">
                        <i class="fa-solid fa-location-dot"></i>
                        {{ empty($item->city) ? '' : $item->city . ', ' }}{{ $item->state ?? '' }}
                    </p>
                    {!! $item->getCountryFlag() !!}
                </div>
            </div>

            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="property-price mb-1">
                    {{ format_amount($item->price, 2, $item->country?->currency_symbol ?? '$', true) }}
                    @if ($item->property_type == 'rent')
                        <span>/{{ $item->price_type }}</span>
                    @endif
                </h5>
                @if (!empty($item->residence_type))
                    <span class="property-type">
                        {{ $item->residence_type }}
                    </span>
                @endif
                <p class="property-address my-3">
                    {{ $item->full_address }}
                </p>


                <ul class="list-inline small mb-3">
                    @if (!empty($item->surface))
                        <li class="list-inline-item">
                            Area : <span>{{ $item->surface }} {{ $item->surface_type }}</span>
                        </li>
                    @endif
                    @if (!empty($item->plot))
                        <li class="list-inline-item">
                            Plot Size : <span>{{ $item->plot }} {{ $item->plot_type }}</span>
                        </li>
                    @endif
                </ul>

                <div class="d-flex justify-content-between">
                    @if (!empty($item?->user?->phone ?? ''))
                        <a href="tel: {{ $item->user->phone }}" class="button1 property-call">
                            <i class="fa-solid fa-phone"></i>
                            CALL
                        </a>
                    @endif
                    @if (!empty($item?->user?->email ?? ''))
                        <a href="mailto: {{ $item?->user?->email }}" class="button1 property-email">
                            <i class="fa-solid fa-envelope"></i>
                            EMAIL
                        </a>
                    @endif
                    @if (!empty($item?->user?->phone ?? ''))
                        <a href="{{ $item->whatsapp_url }}" class="button1 property-wp" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@empty
    {!! norecords() !!}
@endforelse

@if ($properties->lastPage() > 1)
    @include('frontend.home.inc.paginate', [
        'item' => $properties,
        'params' => [
            'country' => $country,
            'city' => $filter['city'] ?? '',
            'zip' => $filter['zip'] ?? '',
            'residence_type' => $filter['residence_type'] ?? '',
            'buy_or_rent' => $filter['buy_or_rent'] ?? '',
            'min_price' => $filter['min_price'] ?? '',
            'max_price' => $filter['max_price'] ?? '',
            'sort_by' => $filter['sort_by'] ?? '',
        ],
    ])
@endif
