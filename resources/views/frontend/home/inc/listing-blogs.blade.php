@forelse ($blogs as $item)
    <div class="col-lg-4 col-sm-6 col-12 col-5cards">
        <div class="custom-card h-100 shadow-sm rounded-4 overflow-hidden">
            <div class="custom-card-image">
                <a href="{{ route('blog.details', ['slug' => $item->slug]) }}">
                    <img src="{{ $item->image() }}" alt="Card Image" class="img-fluid w-100 card-img">
                </a>
            </div>
            <div class="custom-card-body p-3">
                <div class="custom-card-date mb-2">
                    <i class="fa-solid fa-calendar-days"></i>
                    {{ format_date($item->published_at, 'F d, Y') }}
                </div>
                <h5 class="custom-card-title mb-2">
                    <a href="{{ route('blog.details', ['slug' => $item->slug]) }}">
                        {{ string_limit($item->name, 33) }}
                    </a>
                </h5>
                <p class="custom-card-text mb-3">
                    {{ string_limit($item->short_description, 150) }}
                </p>
                <a href="{{ route('blog.details', ['slug' => $item->slug]) }}" class="custom-card-link">
                    Read More <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
@empty
    {!! norecords() !!}
@endforelse

@if ($blogs->lastPage() > 1)
    @include('frontend.home.inc.paginate', [
        'item' => $blogs,
        'params' => [],
    ])
@endif
