<section class="property-map-section py-5">
    <div class="container-fluid">
        <div class="row g-5">
            <div class="col-md-6 card-side p-5">
                <div class="row g-4" id="map_property_list_{{$country}}">
                    @include('frontend.home.inc.map_property_list', [
                        'properties' => $properties
                    ])
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-wrapper">
                    <div id="map_{{$country}}" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>