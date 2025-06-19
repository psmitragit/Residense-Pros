@extends('frontend.layout.app')

@section('content')
    <section class="map_property my-4 ">
        <div class="container">
            <div class="row">
                <div
                    class="px-3 px-md-0 py-3 d-flex flex-column flex-md-row justify-content-between align-items-center prop_details_top_section">
                    <div class="prop_heading_section text-center text-md-start mb-3 mb-md-0 col-md-6">
                        <div class="property_heading weavy-text">4600 Rodeo Ln, Los Angeles, California(CA), 90016</div>
                        <p class="prop_found weavy-text mb-0">3 BHK fully furnished indipendent house</p>
                    </div>

                    <div
                        class=" d-flex align-items-center gap-5 flex-wrap justify-content-md-end justify-content-center col-md-6">
                        <div class="share_btn"><i class="fa-solid fa-share-nodes"></i></div>
                        <div class="like_btn"><i class="fa-regular fa-heart"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Prop details section -->


    <div class="container py-4 px-4 px-md-0 my-lg-5 my-3">
        <div class="row g-3 g-lg-5">
            <!-- ---------- Main Content ---------- -->
            <div class="col-lg-8">
                <!-- Main Slider -->

                <!-- Main Slider -->
                <div class="property-main-image position-relative">
                    <div class="slider-for position-relative">

                        <div>
                            <img src="{{ asset('assets/frontend/images/prop19.jpg') }}" alt="Property Image 1" />
                            <div class="property-badges-wrapper">
                                <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                                <span class="property-badge-custom" data-badge-type="new">New</span>
                            </div>
                        </div>
                        <div><img src="{{ asset('assets/frontend/images/prop20.jpg') }}" alt="Property Image 2" />
                            <div class="property-badges-wrapper">
                                <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                                <span class="property-badge-custom" data-badge-type="new">New</span>
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset('assets/frontend/images/prop21.jpg') }}" alt="Property Image 3" />
                            <div class="property-badges-wrapper">
                                <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                                <span class="property-badge-custom" data-badge-type="new">New</span>
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset('assets/frontend/images/prop22.jpg') }}" alt="Property Image 4" />
                            <div class="property-badges-wrapper">
                                <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                                <span class="property-badge-custom" data-badge-type="new">New</span>
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset('assets/frontend/images/prop23.jpg') }}" alt="Property Image 5" />
                            <div class="property-badges-wrapper">
                                <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                                <span class="property-badge-custom" data-badge-type="new">New</span>
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset('assets/frontend/images/prop24.jpg') }}" alt="Property Image 6" />
                            <div class="property-badges-wrapper">
                                <span class="property-badge-custom" data-badge-type="rent">Rent</span>
                                <span class="property-badge-custom" data-badge-type="new">New</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thumbnail Slider -->
                <div class="mt-2">
                    <div class="slider-nav">
                        <div><img src="{{ asset('assets/frontend/images/prop19.jpg') }}" alt="Property Image 1" /></div>
                        <div><img src="{{ asset('assets/frontend/images/prop20.jpg') }}" alt="Property Image 2" /></div>
                        <div><img src="{{ asset('assets/frontend/images/prop21.jpg') }}" alt="Property Image 3" /></div>
                        <div><img src="{{ asset('assets/frontend/images/prop22.jpg') }}" alt="Property Image 4" /></div>
                        <div><img src="{{ asset('assets/frontend/images/prop23.jpg') }}" alt="Property Image 5" /></div>
                        <div><img src="{{ asset('assets/frontend/images/prop24.jpg') }}" alt="Property Image 6" /></div>
                    </div>
                </div>



                <!-- Property Facts -->
                <div class="row g-3 mt-4 Prop_fact">
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Residence Type</p>
                            <h6 class="prop_facts_details">House</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Bedrooms</p>
                            <h6 class="prop_facts_details">3</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Bathrooms</p>
                            <h6 class="prop_facts_details">2</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Land Area</p>
                            <h6 class="prop_facts_details">200 m²</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Plot Size</p>
                            <h6 class="prop_facts_details">100 Acers</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Property Age</p>
                            <h6 class="prop_facts_details">0-5 Years</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Property Condition</p>
                            <h6 class="prop_facts_details">Furnished</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Posted by and On</p>
                            <h6 class="prop_facts_details">Owner on Apr 15, 2025</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="sidebar-box h-100">
                            <p class="prop_facts mb-2">Available From</p>
                            <h6 class="prop_facts_details">June 2025</h6>
                        </div>
                    </div>

                </div>


                <!-- Amenities -->
                <h5 class="mt-5 mb-3 amenities_heading">Amenities</h5>
                <ul class="row list-unstyled amenities p-4">
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Electric
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Water Supply
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Alarm System
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>CCTV
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Parking
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Swimming Pool
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Natural Ventilation
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Smart Home
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Fire Safety
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Basement
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Gym
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Wi-Fi
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Elevator
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Fireplace
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Security Guard
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Garden
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Solar Panels
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Sauna
                    </li>
                    <li class="col-6 col-md-4 enabled">
                        <i class="fa fa-check-circle text-success me-2"></i>Air Conditioning
                    </li>
                    <li class="col-6 col-md-4 disabled">
                        <i class="fa fa-times-circle text-danger me-2"></i>Playground
                    </li>
                </ul>



                <!-- Nearby Places -->
                <h5 class="mt-5 mb-3 amenities_heading">Nearby Places</h5>
                <div class="container nearby_places p-4">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="nearby-tag w-100">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <div class="nearby_heading">Hospital</div>
                                    <div class="nearby-distance">1.5 km</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="nearby-tag w-100">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <div class="nearby_heading">Railway Station</div>
                                    <div class="nearby-distance">2 km</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="nearby-tag w-100">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <div class="nearby_heading">Metro Station</div>
                                    <div class="nearby-distance">2.5 km</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="nearby-tag w-100">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <div class="nearby_heading">Market</div>
                                    <div class="nearby-distance">500 m</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="nearby-tag w-100">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <div class="nearby_heading">Kids School</div>
                                    <div class="nearby-distance">1 km</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="nearby-tag w-100">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <div class="nearby_heading">University</div>
                                    <div class="nearby-distance">2 km</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






                <!-- Tabs -->
                <ul class="nav nav-tabs mt-5" id="propertyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab">
                            Description
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="neighborhood-tab" data-bs-toggle="tab"
                            data-bs-target="#neighborhood" type="button" role="tab">
                            Map and Street View
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="floorplan-tab" data-bs-toggle="tab"
                            data-bs-target="#floorplan" type="button" role="tab">
                            Floorplan
                        </button>
                    </li>
                </ul>
                <div class="tab-content border border-top-0 rounded-bottom" id="propertyTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't look
                            even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be
                            sure there isn't anything embarrassing hidden in the middle of text.

                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                            necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over 200 Latin words, combined with a handful of model sentence structures, to generate
                            Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from
                            repetition, injected humour, or non-characteristic words etc. There are many variations of
                            passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                            by injected humour, or randomised words which don't look even slightly believable. If you
                            are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                            embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet
                            tend to repeat predefined chunks as necessary, making this the first true generator on the
                            Internet ...<span>Read More</span>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="neighborhood" role="tabpanel">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d206253.53243336047!2d-115.33980655863442!3d36.12488712853696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80beb782a4f57dd1%3A0x3accd5e6d5b379a3!2sLas%20Vegas%2C%20NV%2C%20USA!5e0!3m2!1sen!2sin!4v1749818614932!5m2!1sen!2sin"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="tab-pane fade" id="floorplan" role="tabpanel">
                        <img src="{{ asset('assets/frontend/images/floor-plan.jpg') }}" class="img-fluid rounded"
                            alt="Floorplan" />
                    </div>
                </div>
            </div>

            <!-- ---------- Sidebar ---------- -->

            <div class="col"></div>
            <div class="col-lg-3">
                <div class="sticky-top top-0">
                    <!-- Price -->
                    <div class="sidebar-box price-box text-center mb-4 mb-md-5">
                        <div class=" price_heading mb-2">Price</div>
                        <h3 class="price_amount">$1,249,000 <p>Per Year</p>
                        </h3>

                    </div>

                    <!-- Set Alert -->
                    <div class="sidebar-box alert_box text-center mb-4 mb-md-5">
                        <p class="alert_heading py-4">Receive Email Notifications for Similar Properties</p>
                        <button class="button2 text-uppercase"><i class="fa-solid fa-bell"></i> Notify Me</button>
                    </div>

                    <!-- Notification -->
                    <div class="row gx-3 gy-3 text-center my-4 my-lg-5">
                        <div class="col-6">
                            <a href="#" class="custom-btn w-100">
                                <i class="fa-solid fa-phone"></i> CALL
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="custom-btn w-100">
                                <i class="fa-solid fa-envelope"></i> EMAIL
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="custom-btn w-100">
                                <i class="fa-brands fa-whatsapp"></i> WHATSAPP
                            </a>
                        </div>
                    </div>




                    <!-- advertisment section -->

                    <div class="add-banner text-center my-4">
                        <img src="{{ asset('assets/frontend/images/300-250.png') }}" class="img-fluid shadow-sm"
                            alt="Ad 300x250">
                    </div>

                    <!-- Enquire Form -->
                    <div class="sidebar-box enquire-form py-5 px-4 my-lg-5 my-4">
                        <h5 class="enquiry_heading mb-4">Enquire Now</h5>
                        <form action="#" method="post">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name*"
                                    required />
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email*"
                                    required />
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone" class="form-control" placeholder="Phone*"
                                    required />
                            </div>
                            <div class="mb-3">
                                <textarea name="message" rows="4" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="button2 text-center px-5">SEND</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
