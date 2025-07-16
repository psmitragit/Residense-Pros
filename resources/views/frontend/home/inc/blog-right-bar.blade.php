<form action="{{ route('blogs') }}" id="blogCategoryForm" autocomplete="off" class="col-lg-3">
    <div class="mb-4 p-3 search_box">
        <div class="search-wrapper">
            <input type="search" class="form-control search-input" placeholder="Search…" name="keyword" aria-label="Search"
                value="{{ request()->keyword ?? '' }}">
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
    {{-- Blog Page Right Bar --}}
    {!! get_ad_module(6) !!}
    {{-- Blog Page Right Bar --}}
    <div class="mb-4 p-5 archive_section select-wrapper">
        <h4 class="mb-5 archive_heading">Archive</h4>
        <select name="m" class="form-select" onchange="this.form.submit()">
            <option value="">Select Month</option>
            @foreach ($dates as $key => $item)
                <option value="{{ $key }}" {{ $selectedDate == $key ? 'selected' : '' }}>{{ $item }}
                </option>
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
    {{-- Blog Page Right Bar --}}
    {!! get_ad_module(6) !!}
    {{-- Blog Page Right Bar --}}
</form>
