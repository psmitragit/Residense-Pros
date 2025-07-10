@extends('frontend.layout.app')
@section('banner')
    <section class="home_banner">
        <div class="container px-3 px-md-0">
            <div class="hero-content">
                <h1 class="banner_heading weavy-text">Find Your Best Residence</h1>
                <p class="mb-5 banner_subheading weavy-word-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore
                </p>
                <form id="searchForm" class="row g-2 justify-content-center justify-content-xxl-evenly search-bar">
                    <div class="col-6 col-md-auto">
                        <select class="form-select">
                            <option>Select Country</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-auto">
                        <select class="form-select">
                            <option>Select City</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-auto">
                        <input type="text" class="form-control" placeholder="Zip">
                    </div>
                    <div class="col-6 col-md-auto">
                        <select class="form-select">
                            <option>Residence Type</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-auto">
                        <select class="form-select">
                            <option>Buy or Rent</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-auto">
                        <input type="text" class="form-control" placeholder="Min. Price ($)">
                    </div>
                    <div class="col-6 col-md-auto">
                        <input type="text" class="form-control" placeholder="Max. Price ($)">
                    </div>
                    <div class="col-12 col-md-auto text-center">
                        <button class="button2"><i class="fas fa-search me-1"></i>SEARCH</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <div class="container">
        <div class="row d-flex justify-content-center my-60px">
            <div class="add-banner adv1 my-4 text-center">
                <a href="{{$tempData->url}}" target="_blank" rel="noopener" class="ad-image">
                    <img src="{{ $tempData->image }}" alt="Ad Banner" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="featured_property">
        <div class="container-fluid">
            <div class="row">
                <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                    <div class="prop_heading weavy-text">Featured Properties in USA</div>
                    <button class="button3">View all <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="custom_border mx-3 mx-md-5"></div>
        </div>

        <!-- Card container -->
        <div class="container-fluid pt-5 card-container">
            <div class="row g-4 px-2 px-md-5">

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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                            <button
                                class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                            <button
                                class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                                <a href="#" class="button1 property-call">
                                    <i class="fa-solid fa-phone"></i> CALL
                                </a>
                                <a href="#" class="button1 property-email">
                                    <i class="fa-solid fa-envelope"></i> EMAIL
                                </a>
                                <a href="#" class="button1 property-wp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
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
                            <button
                                class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                            <button
                                class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                            <button
                                class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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
                            <button
                                class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-2 property-fav">
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
                                <a href="#" class="button1 property-call"><i class="fa-solid fa-phone"></i>
                                    CALL</a>
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

    <!-- Advertisment section -->
    <div class="container ">
        <div class="row d-flex justify-content-center my-60px">
            <div class="add-banner adv1 my-4 text-center">
                <a href="{{$tempData->url}}" target="_blank" rel="noopener" class="ad-image">
                    <img src="{{ $tempData->image }}" alt="Ad Banner" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
    </section>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('.ad-image').on('click', function(){
                window.open($(this).attr('href'), '_blank');
            });

            $('a').on('click', function(e) {
                e.preventDefault();
            });

            $('#logoutBtn').remove();

            $('form').on('submit', function(e) {
                e.preventDefault();
            });           
        });
    </script>
@endpush
