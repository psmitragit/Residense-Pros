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

                @include('frontend.home.inc.blog-right-bar', compact('latestBlogs', 'dates', 'categories', 'selectedCategory', 'selectedDate'))
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
