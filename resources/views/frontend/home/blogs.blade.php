@extends('frontend.layout.app')

@section('content')
    <section class="featured_property py-md-5 px-3 px-md-0">
        <div class="container-fluid pt-5 card-container">
            <div class="row g-5 px-2 px-md-5">
                <div class="col-lg-9">
                    <div class="row g-4 blogs_wrapper">
                        <div
                            class="prop_heading_section pb-md-5 px-3 px-md-5 d-flex justify-content-between align-items-center">
                            <div class="about_heading weavy-text">Residences Pros Blog</div>
                        </div>
                        <div id="blog_list_wrapper" class="row g-4">
                            @include('frontend.home.inc.listing-blogs', [
                                'blogs' => $blogs,
                                'page' => 'blog',
                                'params' => $params,
                            ])
                        </div>
                    </div>
                </div>

                <form action="" id="blogCategoryForm" autocomplete="off" class="col-lg-3">
                    <div class="mb-4 p-3 search_box">
                        <div class="search-wrapper">
                            <input type="search" class="form-control search-input" placeholder="Search…" name="keyword"
                                aria-label="Search" value="{{ request()->keyword ?? '' }}">
                            <button type="submit" class="search_icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                    @if (!empty($latestBlogs))
                        <div class="mb-4 p-3 post_box">
                            <h4 class="mb-5 recent_posts">Recent Posts</h4>
                            <ul class="">
                                @foreach ($latestBlogs as $key => $item)
                                    <li class="mb-2">
                                        <a href="{{ route('blog.details', ['slug' => $item->slug]) }}"
                                            class="each_post text-decoration-none">
                                            {{ string_limit($item->name, 33) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="add-banner text-center my-5">
                        <img src="{{ asset('assets/frontend/images/300-250.png') }}" class="img-fluid shadow-sm"
                            alt="Ad 300x250">
                    </div>
                    <div class="mb-4 p-5 archive_section select-wrapper">
                        <h4 class="mb-5 archive_heading">Archive</h4>
                        <select name="m" class="form-select" onchange="this.form.submit()">
                            <option value="">Select Month</option>
                            @foreach ($dates as $key => $item)
                                <option value="{{ $key }}" {{ $selectedDate == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 p-5 category_section select-wrapper">
                        <h4 class="mb-5 archive_heading">Categories</h4>
                        <select name="category" class="form-select category-dropdown" onchange="this.form.submit()">
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $selectedCategory == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="add-banner text-center my-5">
                        <img src="{{ asset('assets/frontend/images/300-250.png') }}" class="img-fluid shadow-sm"
                            alt="Ad 300x250">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('.blogs_wrapper').on('click', '.custom-pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        type: 'blog'
                    },
                    success: function(res) {
                        if (res.success == 0) {
                            showToast('', res.msg, 'error');
                        } else {
                            $(`#blog_list_wrapper`).html(res.html);
                            setTimeout(() => {
                                $('html, body').animate({
                                    scrollTop: $(`#blog_list_wrapper`).offset()
                                        .top - 200
                                }, 500);
                            }, 1);
                        }
                    },
                    beforeSend: function() {
                        $(`#blogs_wrapper .loader-wrapper`).removeClass(
                            'd-none');
                    },
                    complete: function() {
                        $(`#blogs_wrapper .loader-wrapper`).addClass(
                            'd-none');
                    }
                });
            });
        })
    </script>
@endpush
