<form id="searchForm" class="row g-2 justify-content-center justify-content-xxl-evenly search-bar" autocomplete="off">
    <div class="col-6 col-md-auto">
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
    <div class="col-6 col-md-auto">
        <input type="text" class="form-control" placeholder="Enter city" name="city"
            value="{{ request()->city ?? '' }}">
    </div>
    <div class="col-6 col-md-auto">
        <input type="text" class="form-control" placeholder="Zip" name="zip" value="{{ request()->zip ?? '' }}">
    </div>
    <div class="col-6 col-md-auto">
        @php
            $requestedResidental = request()->residence_type ?? '';
        @endphp
        <select class="form-select" name="residence_type">
            <option value="">Residence Type</option>
            {!! show_residence_type_dropdown($requestedResidental) !!}
        </select>
    </div>
    <div class="col-6 col-md-auto">
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
    <div class="col-6 col-md-auto">
        <input type="number" class="form-control" placeholder="Min. Price /month" name="min_price"
            value="{{ request()->min_price ?? '' }}">
    </div>
    <div class="col-6 col-md-auto">
        <input type="number" class="form-control" placeholder="Max. Price /month" name="max_price"
            value="{{ request()->max_price ?? '' }}">
    </div>
    <div class="col-12 col-md-auto text-center d-flex gap-2 justify-content-center">
        @if (empty($requestCountry) &&
                empty(request()->city) &&
                empty(request()->zip) &&
                empty($requestedResidental) &&
                empty($requestedBuyOrRent) &&
                blank(request()->min_price) &&
                blank(request()->max_price))
            <button class="button2"><i class="fas fa-search me-1"></i>Search</button>
        @else
            <button class="button2"><i class="fas fa-search me-1"></i></button>
            <a class="button2 d-inline-block" class="clear" href="{{ route('index') }}">
                <i class="fas fa-x me-1"></i>
            </a>
        @endif
    </div>
</form>