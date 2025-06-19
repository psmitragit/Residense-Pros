@extends('frontend.layout.app')

@section('content')
    <section class="featured_property py-md-5 px-3 px-md-0">
        <!-- Card container -->
        <div class="container-fluid pt-5 card-container">
            <div class="row g-5 px-2 px-md-5">

                <!-- Left: Blog Posts (4 Max) -->
                <div class="col-lg-9">
                    <div class="row g-4">
                        <div
                            class="prop_heading_section pb-md-5 px-3 px-md-5 d-flex justify-content-between align-items-center">
                            <div class="about_heading weavy-text">Residences Pros Blog</div>
                        </div>
                        <!-- Post 1 -->
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post1.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="./Blog-inner.html" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Post 2 -->

                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post2.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Post 3 -->

                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post3.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Post 4 -->

                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post4.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
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


                        <!-- Post 1 -->
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post1.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">
                                        Read More <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post2.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post3.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post4.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="container ">
                            <div class="row d-flex justify-content-center my-60px">
                                <div class="add-banner adv1 my-4 text-center">
                                    <a href="#" target="_blank" rel="noopener">
                                        <img src="{{ asset('assets/frontend/images/728-90.png') }}" alt="Ad Banner" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post1.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post2.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post3.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 col-12">
                            <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
                                <div class="custom-card-image">
                                    <img src="{{ asset('assets/frontend/images/post4.jpg') }}" alt="Card Image"
                                        class="img-fluid w-100 card-img">
                                </div>
                                <div class="custom-card-body p-3">
                                    <div class="custom-card-date mb-2">
                                        <i class="fa-solid fa-calendar-days"></i> May 09, 2025
                                    </div>
                                    <h5 class="custom-card-title mb-2">All the Lorem Ipsum generators on the...</h5>
                                    <p class="custom-card-text mb-3">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium...</p>
                                    <a href="#" class="custom-card-link">Read More <i
                                            class="fa-solid fa-arrow-right"></i></a>
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
                <div class="col-lg-3">
                    <div class="mb-4 p-3 search_box">
                        <form role="search" method="get" class="search-wrapper" action="#">
                            <input type="search" class="form-control search-input" placeholder="Search…" value=""
                                name="s" aria-label="Search">
                            <button type="submit" class="search_icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    <div class="mb-4 p-3 post_box">
                        <h4 class="mb-5 recent_posts">Recent Posts</h4>
                        <ul class="">
                            <li class="mb-2">
                                <a href="#" class="each_post text-decoration-none">All the Lorem Ipsum generators on
                                    the...</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="each_post text-decoration-none">All the Lorem Ipsum generators on
                                    the...</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="each_post text-decoration-none">How to Use This
                                    Feature</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="each_post text-decoration-none">All the Lorem Ipsum generators on
                                    the...</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="each_post text-decoration-none">All the Lorem Ipsum generators on
                                    the...</a>
                            </li>
                        </ul>
                    </div>
                    <div class="add-banner text-center my-5">
                        <img src="{{ asset('assets/frontend/images/300-250.png') }}" class="img-fluid shadow-sm"
                            alt="Ad 300x250">
                    </div>
                    <div class="mb-4 p-5 archive_section select-wrapper">
                        <h4 class="mb-5 archive_heading">Archive</h4>
                        <form action="#" method="get">
                            <select name="m" class="form-select" onchange="this.form.submit()">
                                <option value="">Select Month</option>
                                <option value="202506">June 2025</option>
                                <option value="202505">May 2025</option>
                                <option value="202504">April 2025</option>
                                <option value="202503">March 2025</option>
                                <option value="202502">February 2025</option>
                                <option value="202501">January 2025</option>
                                <option value="202412">December 2024</option>
                                <option value="202411">November 2024</option>
                                <option value="202410">October 2024</option>
                                <option value="202409">September 2024</option>
                                <option value="202408">August 2024</option>
                                <option value="202407">July 2024</option>
                            </select>
                        </form>
                    </div>
                    <div class="mb-4 p-5 category_section select-wrapper">
                        <h4 class="mb-5 archive_heading">Categories</h4>
                        <select name="cat_dropdown" class="form-select category-dropdown">
                            <option value="">Select Category</option>
                            <option value="1">News</option>
                            <option value="2">Updates</option>
                            <option value="3">Tips & Tricks</option>
                            <option value="4">Events</option>
                            <option value="5">Guides</option>
                            <option value="6">Tutorials</option>
                            <option value="7">Announcements</option>
                            <option value="8">Legal Advice</option>
                            <option value="9">Real Estate</option>
                            <option value="10">Personal Injury</option>
                        </select>
                    </div>
                    <div class="add-banner text-center my-5">
                        <img src="{{ asset('assets/frontend/images/300-250.png') }}" class="img-fluid shadow-sm"
                            alt="Ad 300x250">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
