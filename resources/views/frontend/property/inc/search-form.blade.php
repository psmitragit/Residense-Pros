<form id="searchForm" class="prop-search-bar text-center px-4 px-lg-0">
    <div class="row g-3 justify-content-evenly">
        <div class="col-12 col-md-6 col-lg-2">
            @php
                $requestCountry = request()->country ?? '';
            @endphp
            <select class="form-select" name="country">
                <option value="">Select Country</option>
                @foreach (all_active_countries(activeProperty: 1) as $item)
                    <option value="{{ $item->id }}" {{ $requestCountry == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            <input type="text" class="form-control" placeholder="Enter city" name="city"
                value="{{ request()->city ?? '' }}">
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            <input type="text" class="form-control" placeholder="Zip" name="zip"
                value="{{ request()->zip ?? '' }}">
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            @php
                $requestedResidental = request()->residence_type ?? '';
            @endphp
            <select class="form-select" name="residence_type">
                <option value="">Residence Type</option>
                {!! show_residence_type_dropdown($requestedResidental) !!}
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            @php
                $requestedBuyOrRent = request()->buy_or_rent ?? '';
            @endphp
            <select class="form-select" name="buy_or_rent">
                <option value="">Buy or Rent</option>
                <option {{ $requestedBuyOrRent == 'buy' ? 'selected' : '' }} value="buy">
                    Buy
                </option>
                <option {{ $requestedBuyOrRent == 'rent' ? 'selected' : '' }} value="rent">
                    Rent
                </option>
            </select>
        </div>
    </div>

    <div class="row g-3 justify-content-evenly mt-1">
        <!-- Row 2 -->
        <div class="col-12 col-md-6 col-lg-2">
            <input type="number" class="form-control" placeholder="Min. Price /month" name="min_price"
                value="{{ request()->min_price ?? '' }}">
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            <input type="number" class="form-control" placeholder="Max. Price /month" name="max_price"
                value="{{ request()->max_price ?? '' }}">
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            <input type="number" class="form-control" placeholder="Bedrooms" name="bedrooms"
                value="{{ request()->bedrooms ?? '' }}">
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            <input type="number" class="form-control" placeholder="Bathrooms" name="bathrooms"
                value="{{ request()->bathrooms ?? '' }}">
        </div>
        <div class="col-12 col-md-6 col-lg-2">
            <div class="d-flex gap-2 justify-content-center">
                @if (empty($requestCountry) &&
                        empty(request()->city) &&
                        empty(request()->zip) &&
                        empty($requestedResidental) &&
                        empty($requestedBuyOrRent) &&
                        blank(request()->min_price) &&
                        blank(request()->max_price) &&
                        empty(request()->bedrooms) &&
                        empty(request()->bathrooms))
                    <button class="button2"><i class="fas fa-search me-1"></i>Search</button>
                @else
                    <button class="button2 btn-cross-style"><i class="fas fa-search me-1"></i></button>
                    <a class="button2 d-inline-block btn-cross-style" class="clear" href="{{ route('properties') }}">
                        <i class="fas fa-x me-1"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</form>
