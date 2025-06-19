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
                <a href="#" target="_blank" rel="noopener">
                    <img src="{{ asset('assets/frontend/images/728-90.png') }}" alt="Ad Banner" class="img-fluid">
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
                <a href="#" target="_blank" rel="noopener">
                    <img src="{{ asset('assets/frontend/images/728-90.png') }}" alt="Ad Banner" class="img-fluid">
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Prop in South Africa Section -->

    <section class="featured_property">
        <div class="container-fluid">
            <div class="row">
                <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                    <div class="prop_heading weavy-text">Featured Properties in South Africa</div>
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
                            <img src="{{ asset('assets/frontend/images/prop10.jpg') }}" class="card-img-top card-img"
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
                                    <i class="fa-solid fa-location-dot"></i> St David Rd, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 2140.00 <span>/ month</span>
                            </h5>
                            <span class="property-type">Apartment</span>
                            <p class="property-address my-3">St David Rd, Gauteng, 2001 Johannesburg, South Africa</p>
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
                            <img src="{{ asset('assets/frontend/images/prop11.jpg') }}" class="card-img-top card-img"
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
                                    <i class="fa-solid fa-location-dot"></i> Richmond Estate, Cape...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 39870.00
                            </h5>
                            <span class="property-type">Bedrooms</span>
                            <p class="property-address my-3">130 Tygerberg St, Richmond Estate Cape Town 7460</p>
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
                            <img src="{{ asset('assets/frontend/images/prop12.jpg') }}" class="card-img-top card-img"
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
                                    <i class="fa-solid fa-location-dot"></i> Parktown, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 245670.00
                            </h5>
                            <span class="property-type">Condo</span>
                            <p class="property-address my-3">21 Junction Ave, Parktown, Johannesburg 2193</p>
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
                            <img src="{{ asset('assets/frontend/images/prop13.jpg') }}" class="card-img-top card-img"
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
                                    <i class="fa-solid fa-location-dot"></i> St David Rd, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 1540.00 <span>/ Year</span>
                            </h5>
                            <span class="property-type">Office</span>
                            <p class="property-address my-3">St David Rd, Gauteng, 2001 Johannesburg, South Africa</p>
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

                <!-- 5th Property -->
                <div class=" col-lg-4 col-sm-6 col-12 col-5cards">
                    <div class="card custom-card h-100 shadow-sm">
                        <div class="property-image-wrapper position-relative">
                            <img src="{{ asset('assets/frontend/images/prop14.jpg') }}" class="card-img-top card-img"
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
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
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
                            <img src="{{ asset('assets/frontend/images/prop15.jpg') }}" class="card-img-top card-img"
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
                                    <i class="fa-solid fa-location-dot"></i> St David Rd, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 540.00 <span>/ month</span>
                            </h5>
                            <span class="property-type">Apartment</span>
                            <p class="property-address my-3">St David Rd, Gauteng, 2001 Johannesburg, South Africa</p>
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
                            <img src="{{ asset('assets/frontend/images/prop16.jpg') }}" class="card-img-top card-img"
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
                                    <i class="fa-solid fa-location-dot"></i> St David Rd, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 39870.00
                            </h5>
                            <span class="property-type">Condo</span>
                            <p class="property-address my-3">St David Rd, Gauteng, 2001 Johannesburg, South Africa</p>
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
                            <img src="{{ asset('assets/frontend/images/prop17.jpg') }}" class="card-img-top card-img"
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
                                    <i class="fa-solid fa-location-dot"></i> St David Rd, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 245670.00
                            </h5>
                            <span class="property-type">House</span>
                            <p class="property-address my-3">St David Rd, Gauteng, 2001 Johannesburg, South Africa</p>
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
                            <img src="{{ asset('assets/frontend/images/prop18.jpg') }}" class="card-img-top card-img"
                                alt="Warehouse Image">

                            <!-- Custom Badge -->
                            <div class="property-badges-wrapper">
                                <span class="property-badge-custom" data-badge-type="rent">Rent</span>
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
                                    <i class="fa-solid fa-location-dot"></i> St David Rd, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 1540.00 <span>/ Year</span>
                            </h5>
                            <span class="property-type">Party room</span>
                            <p class="property-address my-3">St David Rd, Gauteng, 2001 Johannesburg, South Africa</p>
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
                            <img src="{{ asset('assets/frontend/images/prop16.jpg') }}" class="card-img-top card-img"
                                alt="Warehouse Image">

                            <!-- Custom Badge -->
                            <div class="property-badges-wrapper">

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
                                    <i class="fa-solid fa-location-dot"></i> St David Rd, Johanne...
                                </p>
                                <img src="{{ asset('assets/frontend/images/southaf-flag.png') }}" class="flag-icon ms-1"
                                    alt="USA Flag">
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="property-price mb-1">$ 3870.00 <span>/ Year</span>
                            </h5>
                            <span class="property-type">Bedrooms</span>
                            <p class="property-address my-3">St David Rd, Gauteng, 2001 Johannesburg, South Africa</p>
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
                <a href="#" target="_blank" rel="noopener">
                    <img src="{{ asset('assets/frontend/images/728-90.png') }}" alt="Ad Banner" class="img-fluid">
                </a>
            </div>
        </div>
    </div>

    <!-- Related post section -->

    <section class="featured_property">
        <div class="container-fluid">
            <div class="row">
                <div class="prop_heading_section px-3 px-md-5 d-flex justify-content-between align-items-center">
                    <div class="prop_heading weavy-text">Latest Blog Posts</div>
                    <button class="button3">View all <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="custom_border mx-3 mx-md-5"></div>
        </div>

        <!-- Card container -->
        <div class="container-fluid pt-5 card-container">
            <div class="row g-4 px-2 px-md-5">

                <!-- 1st Post -->

                <div class="col-lg-4 col-sm-6 col-12 col-5cards">
                    <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">

                        <!-- Image -->
                        <div class="custom-card-image">
                            <img src="{{ asset('assets/frontend/images/post1.jpg') }}" alt="Card Image"
                                class="img-fluid w-100 card-img">
                        </div>

                        <!-- Content -->
                        <div class="custom-card-body p-3">
                            <!-- Date -->
                            <div class="custom-card-date mb-2">
                                <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                            </div>
                            <!-- Title -->
                            <h5 class="custom-card-title mb-2">
                                All the Lorem Ipsum generators on the...
                            </h5>
                            <!-- Excerpt -->
                            <p class="custom-card-text mb-3">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam...
                            </p>

                            <!-- Read More -->
                            <a href="#" class="custom-card-link">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 2nd Post -->
                <div class="col-lg-4 col-sm-6 col-12 col-5cards">
                    <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">

                        <!-- Image -->
                        <div class="custom-card-image">
                            <img src="{{ asset('assets/frontend/images/post2.jpg') }}" alt="Card Image"
                                class="img-fluid w-100 card-img">
                        </div>

                        <!-- Content -->
                        <div class="custom-card-body p-3">
                            <!-- Date -->
                            <div class="custom-card-date mb-2">
                                <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                            </div>
                            <!-- Title -->
                            <h5 class="custom-card-title mb-2">
                                All the Lorem Ipsum generators on the...
                            </h5>
                            <!-- Excerpt -->
                            <p class="custom-card-text mb-3">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam...
                            </p>

                            <!-- Read More -->
                            <a href="#" class="custom-card-link">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3rd Post -->
                <div class="col-lg-4 col-sm-6 col-12 col-5cards">
                    <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">

                        <!-- Image -->
                        <div class="custom-card-image">
                            <img src="{{ asset('assets/frontend/images/post3.jpg') }}" alt="Card Image"
                                class="img-fluid w-100 card-img">
                        </div>

                        <!-- Content -->
                        <div class="custom-card-body p-3">
                            <!-- Date -->
                            <div class="custom-card-date mb-2">
                                <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                            </div>
                            <!-- Title -->
                            <h5 class="custom-card-title mb-2">
                                All the Lorem Ipsum generators on the...
                            </h5>
                            <!-- Excerpt -->
                            <p class="custom-card-text mb-3">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam...
                            </p>

                            <!-- Read More -->
                            <a href="#" class="custom-card-link">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4th Post -->

                <div class="col-lg-4 col-sm-6 col-12 col-5cards">
                    <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">

                        <!-- Image -->
                        <div class="custom-card-image">
                            <img src="{{ asset('assets/frontend/images/post4.jpg') }}" alt="Card Image"
                                class="img-fluid w-100 card-img">
                        </div>

                        <!-- Content -->
                        <div class="custom-card-body p-3">
                            <!-- Date -->
                            <div class="custom-card-date mb-2">
                                <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                            </div>
                            <!-- Title -->
                            <h5 class="custom-card-title mb-2">
                                All the Lorem Ipsum generators on the...
                            </h5>
                            <!-- Excerpt -->
                            <p class="custom-card-text mb-3">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam...
                            </p>

                            <!-- Read More -->
                            <a href="#" class="custom-card-link">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 5th Post -->

                <div class="col-lg-4 col-sm-6 col-12 col-5cards">
                    <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">

                        <!-- Image -->
                        <div class="custom-card-image">
                            <img src="{{ asset('assets/frontend/images/post5.jpg') }}" alt="Card Image"
                                class="img-fluid w-100 card-img">
                        </div>

                        <!-- Content -->
                        <div class="custom-card-body p-3">
                            <!-- Date -->
                            <div class="custom-card-date mb-2">
                                <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                            </div>
                            <!-- Title -->
                            <h5 class="custom-card-title mb-2">
                                All the Lorem Ipsum generators on the...
                            </h5>
                            <!-- Excerpt -->
                            <p class="custom-card-text mb-3">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam...
                            </p>

                            <!-- Read More -->
                            <a href="#" class="custom-card-link">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
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
