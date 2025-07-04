@extends('frontend.layout.app')

@section('content')
    <section class="Property_banner py-4">
        <div class="container">
            <div class="hero-content bg-lightblue rounded-5 p-3 p-md-4">
                <form id="searchForm" class="prop-search-bar text-center px-4 px-lg-0">
                    <div class="row g-3 justify-content-evenly">
                        <!-- Row 1 -->
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Select Country</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Select City</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <input type="text" class="form-control rounded-pill w-100" placeholder="Zip">
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Residence Type</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Buy or Rent</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 justify-content-evenly mt-1">
                        <!-- Row 2 -->
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Min. Price ($)</option>
                                <option>$500.00</option>
                                <option>$1,000.00</option>
                                <option>$5,000.00</option>
                                <option>$10,000.00</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Max. Price ($)</option>
                                <option>$500.00</option>
                                <option>$1,000.00</option>
                                <option>$5,000.00</option>
                                <option>$10,000.00</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Bedrooms</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <select class="form-select rounded-pill">
                                <option>Bathrooms</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <button class="button2 w-100">
                                <i class="fas fa-search me-1"></i> SEARCH
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <!-- Property list section -->

    <section class="featured_property">
        <div class="container-fluid">
            <div class="row">
                <div class="px-3 px-md-5 d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="prop_heading_section text-center text-md-start mb-3 mb-md-0 col-md-6">
                        <div class="property_heading weavy-text">Rent Properties in California</div>
                        <p class="prop_found weavy-text mb-0">25 properties found</p>
                    </div>

                    <div
                        class="togglesection d-flex align-items-center gap-3 flex-wrap justify-content-md-end justify-content-center col-md-6">
                        <div class="d-flex align-items-center gap-2">
                            <label for="sortSelect" class="sortBy">Sort by:</label>
                            <select id="sortSelect" class="form-select rounded-pill px-4 py-2">
                                <option value="">Select</option>
                                <option value="price_low">Price: Low to High</option>
                                <option value="price_high">Price: High to Low</option>
                                <option value="newest">Newest</option>
                                <option value="popularity">Popularity</option>
                            </select>
                        </div>

                        <div class="custom-toggle-container">
                            <div class="toggle-highlight"></div>
                            <button type="button" class="toggle-button active" id="listBtn">List</button>
                            <button type="button" class="toggle-button" id="mapBtn">Map</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <!-- Card container -->
        <div class="container-fluid pt-5 card-container">
            <div class="row g-4 px-2 px-md-5">

                <!-- 1st Property -->
                <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                    <a href="{{ route('property.details', ['slug' => 'test-proepr']) }}">
                        <div class="card custom-card h-100 shadow-sm">
                            <div class="property-image-wrapper position-relative">
                                <img src="{{ asset('assets/frontend/images/prop1.jpg') }}" class="card-img-top card-img"
                                    alt="Warehouse Image">

                                <!-- Custom Badge -->
                                <div class="property-badges-wrapper">
                                    <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                                </div>

                                <!-- Favorite Button -->
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                                    <i class="fa-regular fa-heart"></i>
                                </button>

                                <!-- Gradient Overlay with Location -->
                                <div class="property-image-overlay">
                                    <p class="property-location mb-0">
                                        <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                                    </p>
                                    <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                        alt="USA Flag">
                                </div>
                            </div>
                    </a>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 540.00 <span>/ month</span>
                        </h5>
                        <span class="property-type">Warehouse</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2nd Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop2.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 39870.00
                        </h5>
                        <span class="property-type">Bedrooms</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo,Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3rd Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop3.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Bohemia, New York
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 245670.00
                        </h5>
                        <span class="property-type">Townhome</span>
                        <p class="property-address my-3">1722 Church St, Bohemia, New York(NY), 11716</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop4.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                            <span class="property-badge-custom" data-badge-type="new">New</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 1540.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">Office</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop2.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 3870.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">House</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo, Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop5.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 540.00 <span>/ month</span>
                        </h5>
                        <span class="property-type">Apartment</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 7th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop6.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                            <span class="property-badge-custom" data-badge-type="new">New</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 39870.00
                        </h5>
                        <span class="property-type">Condo</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo,Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 8th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop7.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Bohemia, New York
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 245670.00
                        </h5>
                        <span class="property-type">House</span>
                        <p class="property-address my-3">1722 Church St, Bohemia, New York(NY), 11716</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop8.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 1540.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">Party room</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 10th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop9.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                            <span class="property-badge-custom" data-badge-type="new">New</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 3870.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">Bedrooms</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo, Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 11st Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop11.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 540.00 <span>/ month</span>
                        </h5>
                        <span class="property-type">Warehouse</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 12nd Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop12.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 39870.00
                        </h5>
                        <span class="property-type">Bedrooms</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo,Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 13rd Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop13.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Bohemia, New York
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 245670.00
                        </h5>
                        <span class="property-type">Townhome</span>
                        <p class="property-address my-3">1722 Church St, Bohemia, New York(NY), 11716</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 14th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop14.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                            <span class="property-badge-custom" data-badge-type="new">New</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 1540.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">Office</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 15th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop15.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 3870.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">House</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo, Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advertisment section -->
            <div class="container ">
                <div class="row d-flex justify-content-center my-60px">
                    <div class="add-banner adv1 my-4 text-center">
                        <a href="#" target="_blank" rel="noopener">
                            <img src="{{ asset('assets/frontend/images/728-90.png') }}" alt="Ad Banner"
                                class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>


            <!-- 1st Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop1.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 540.00 <span>/ month</span>
                        </h5>
                        <span class="property-type">Warehouse</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2nd Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop2.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 39870.00
                        </h5>
                        <span class="property-type">Bedrooms</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo,Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3rd Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop3.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Bohemia, New York
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 245670.00
                        </h5>
                        <span class="property-type">Townhome</span>
                        <p class="property-address my-3">1722 Church St, Bohemia, New York(NY), 11716</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop4.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                            <span class="property-badge-custom" data-badge-type="new">New</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 1540.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">Office</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop2.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 3870.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">House</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo, Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop5.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 540.00 <span>/ month</span>
                        </h5>
                        <span class="property-type">Apartment</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 7th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop6.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                            <span class="property-badge-custom" data-badge-type="new">New</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 39870.00
                        </h5>
                        <span class="property-type">Condo</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo,Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 8th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop7.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Bohemia, New York
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 245670.00
                        </h5>
                        <span class="property-type">House</span>
                        <p class="property-address my-3">1722 Church St, Bohemia, New York(NY), 11716</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item">3 Bedroom(s)</li>
                            <li class="list-inline-item">2 Bath(s)</li>
                            <li class="list-inline-item">2300 sqft : Area</li>
                            <li class="list-inline-item">1000 acres : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9th Property -->
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop8.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">

                        <!-- Custom Badge -->
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                        </div>

                        <!-- Favorite Button -->
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Los Angeles, California
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 1540.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">Party room</span>
                        <p class="property-address my-3">4600 Rodeo Ln, Los Angeles, California(CA), 90016</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="property-image-wrapper position-relative">
                        <img src="{{ asset('assets/frontend/images/prop9.jpg') }}" class="card-img-top card-img"
                            alt="Warehouse Image">
                        <div class="property-badges-wrapper">
                            <span class="property-badge-custom" data-badge-type="sale">Sale</span>
                            <span class="property-badge-custom" data-badge-type="new">New</span>
                        </div>
                        <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <!-- Gradient Overlay with Location -->
                        <div class="property-image-overlay">
                            <p class="property-location mb-0">
                                <i class="fa-solid fa-location-dot"></i> Amarillo, Texas
                            </p>
                            <img src="{{ asset('assets/frontend/images/usa-flag.png') }}" class="flag-icon ms-1"
                                alt="USA Flag">
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="property-price mb-1">$ 3870.00 <span>/ Year</span>
                        </h5>
                        <span class="property-type">Bedrooms</span>
                        <p class="property-address my-3">2428 NW 13th Ave, Amarillo, Texas(TX), 79107</p>
                        <ul class="list-inline small mb-3">
                            <li class="list-inline-item"><span>2300 sqft</span> : Area</li>
                            <li class="list-inline-item"><span>1000 acres</span> : Plot Size</li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i> CALL</a>
                            <a href="#" class="button1 property-email"><i class="fa-solid fa-envelope"></i>
                                EMAIL</a>
                            <a href="#" class="button1 property-wp"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="custom-pagination my-5">
                <ul>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><span>....</span></li>
                    <li><a href="#">9</a></li>
                    <li class="next"><a href="#">Next &raquo;</a></li>
                </ul>
            </nav>
        </div>
        </div>
    </section>
@endsection
