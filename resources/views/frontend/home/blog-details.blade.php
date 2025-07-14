@extends('frontend.layout.app')

@section('content')
    <section class="featured_property py-md-5 px-3 px-md-0">
        <div class="container-fluid pt-5 card-container">
            <div class="row g-5 px-2 px-md-5">
                <div class="blog_breadcrumbs pb-md-5 px-md-5 d-flex align-items-center">
                    <div class="blog_breadcrumbs">
                        <a href="{{ route('index') }}">Home</a> | <a
                            href="{{ route('blogs', ['keyword' => request()->keyword ?? '', 'm' => request()->m ?? '', 'category' => request()->category ?? '']) }}">Blog</a>
                        |
                        <a>{{ $blog->name ?? '' }}</a>
                    </div>
                </div>
                <div class="col-lg-9 px-2">

                    <div class="prop_heading_section pb-5 px-md-5 d-flex justify-content-between align-items-center">
                        <div class="blog_heading">
                            {{ $blog->name ?? '' }}
                        </div>
                    </div>
                    <div class="post1 pb-md-5 px-md-5 m-0">
                        <div class="post-meta d-flex align-items-center gap-3 mb-4">
                            <span>
                                <i class="fa-solid fa-calendar-days me-1"></i>
                                {{ format_date($blog->published_at, 'F d, Y') }}
                            </span>
                            |
                            <span>
                                Posted by: {{ $blog->author ?? 'Admin' }}
                            </span>
                        </div>
                        <div class="blog_inner_img mb-4 overflow-hidden">
                            <img src="{{ $blog->image() }}" alt="Post Banner" class="img-fluid w-100">
                        </div>
                        @if ($blog->categories->count() > 0)
                            <div class="post-categories d-flex align-items-center gap-2 gap-lg-3 mb-4 flex-wrap">
                                @foreach ($blog->categories as $item)
                                    <span>{{ $item->name }}</span>
                                @endforeach
                            </div>
                        @endif
                        <h1 class="post-title mb-4">
                            {{ $item->name ?? '' }}
                        </h1>

                        <div class="post-content">
                            {!! $blog->content !!}
                        </div>
                        <div class="share_like_section d-flex align-items-center gap-3 py-3">
                            <div class="icon_box share_btn" data-toggle="tooltip" data-placement="left" title="Share"
                                data-url="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                                <i class="fa-solid fa-share-nodes" style="color: #1585e3;"></i>
                            </div>
                            <div class="icon_box like_btn likeBtn"
                                data-url="{{ route('blog.like', ['id' => $blog->id]) }}">
                                <i class="fa-{{ is_user_like_this_blog($blog->id) ? 'solid' : 'regular' }} fa-thumbs-up"
                                    style="color: #1585e3;"></i>
                                <span class="like_count">{{ $blog->likes->count() }}</span>
                            </div>
                            <div class="icon_box like_btn loadinDiv d-none" data-toggle="tooltip" data-placement="right"
                                title="Like" data-url="{{ route('blog.like', ['id' => $blog->id]) }}">
                                <i class="fas fa-circle-notch fa-spin" style="color: #1585e3;"></i>
                                <span class="like_count">{{ $blog->likes->count() }}</span>
                            </div>
                        </div>
                        <div class="prev_next_section d-flex justify-content-between align-items-center gap-3 py-3 mb-3">
                            <div class="row w-100">
                                <div class="col-6 d-flex justify-content-start">
                                    @if (!empty($prevBlogUrl))
                                        <a href="{{ $prevBlogUrl }}">
                                            <span><i class="fa-solid fa-angle-left"></i> PREV POST</span>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    @if (!empty($nextBlogUrl))
                                        <a href="{{ $nextBlogUrl }}">
                                            <span>NEXT POST <i class="fa-solid fa-angle-right"></i></span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card p-5 my-lg-5 comment_box" id="comment_box">
                            <div class="d-flex justify-content-between">
                                <h4 class="comment_heading mb-4">Add a Comment</h4>
                                <a href="javascript:void(0);" class="cancle_reply d-none">Cancle Reply</a>
                            </div>
                            <form class="comment_form" method="POST" action="{{ route('blog.comment') }}"
                                autocomplete="off">
                                <input type="hidden" name="parent_id">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <div class="row mb-3 g-4">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Name*"
                                            value="{{ auth()?->user()?->name ?? '' }}" name="name">
                                        <span class="error name_error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Email*" name="email"
                                            value="{{ auth()?->user()?->email ?? '' }}">
                                        <span class="error email_error"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="4" placeholder="Write your comments here..." name="comment"></textarea>
                                    <span class="error comment_error"></span>
                                </div>
                                <span class="error parent_id_error"></span>
                                <span class="error blog_id_error"></span>
                                <button type="submit" class="button2 submit_btn">Submit</button>
                            </form>
                        </div>
                        <div id="comment-section">
                            @if (!empty($blogComments))
                                {!! $blogComments !!}
                            @endif
                        </div>
                    </div>
                </div>
                @include(
                    'frontend.home.inc.blog-right-bar',
                    compact('latestBlogs', 'dates', 'categories', 'selectedCategory', 'selectedDate'))
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('.share_btn').on('click', function() {
                const url = $(this).data('url');
                const btn = $(this);
                navigator.clipboard.writeText(url).then(function() {
                    btn.find('i').removeClass('fa-share-nodes');
                    btn.find('i').addClass('fa-check');
                    setTimeout(() => {
                        btn.find('i').removeClass('fa-check');
                        btn.find('i').addClass('fa-share-nodes');
                    }, 3000);
                    showSweetAlert('Link copied to clipboard!', '', 'success');
                }).catch(function(err) {
                    showSweetAlert('Failed to copy text', '', 'error');
                });
            });

            $('.likeBtn').on('click', function() {
                let url = $(this).data('url');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: "{{ $blog->id }}",
                        currentUrl: "{{ $currentUrl }}"
                    },
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.open_auth_modal == 1) {
                                $('#authModal').modal('show');
                            }
                            showToast('', res.msg, 'warning');
                        } else {
                            if (res.data.type == 'like') {
                                $('.like_btn i').removeClass('fa-regular');
                                $('.like_btn i').addClass('fa-solid');
                            } else {
                                $('.like_btn i').addClass('fa-regular');
                                $('.like_btn i').removeClass('fa-solid');
                            }
                            $('.like_count').html(res.data.count);
                        }
                    },
                    beforeSend: function() {
                        $('.loadinDiv').removeClass('d-none');
                        $('.likeBtn').addClass('d-none');
                    },
                    complete: function() {
                        $('.loadinDiv').addClass('d-none');
                        $('.likeBtn').removeClass('d-none');
                    }
                });
            });

            $(document).on('submit', '.comment_form', function(e) {
                e.preventDefault();
                let formData = new FormData(e.target);
                $.ajax({
                    type: e.target.method,
                    url: e.target.action,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.errors) {
                                showValidationError(res.errors, false);
                            } else {
                                showToast('', res.msg, 'error');
                            }
                        } else {
                            window.location.reload();
                        }
                    },
                    beforeSend: function() {
                        $('.comment_form button[type="submit"]').addClass('disabled');
                        $('.comment_form button[type="submit"]').html('...');
                    },
                    complete: function() {
                        $('.comment_form button[type="submit"]').removeClass('disabled');
                        $('.comment_form button[type="submit"]').html('Submit');
                    }
                });
            });

            $('#comment-section').on('click', '.cancle_reply', function() {
                $('.comment_heading').html(`Add a Comment`);
                $('.cancle_reply').addClass('d-none');
                $('.reply-div').empty();
                $('#comment_box').removeClass('d-none');
                $('input[name="parent_id"]').attr('value', '');
            })

            $('.reply-btn').on('click', function() {
                let id = $(this).data('id');
                let author = $(this).data('name');
                let parentReplyDiv = $(`#comment-${id}`).find('.reply-div');
                $('.reply-div').empty();
                $('.comment_heading').html(`Reply to ${author}`);
                $('#comment_box').addClass('d-none');
                $('.cancle_reply').removeClass('d-none');
                $('input[name="parent_id"]').attr('value', id);
                let html = $('#comment_box').html();
                parentReplyDiv.html(html);
            })
        })
    </script>
@endpush
