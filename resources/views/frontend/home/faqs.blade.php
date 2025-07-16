@extends('frontend.layout.app')

@section('content')
    <section class="faq-section py-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div class="accordion custom-faq-accordion" id="faqAccordion">
                        @forelse ($faq as $key => $item)
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="heading{{ $key + 1 }}">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $key + 1 }}" aria-expanded="false"
                                        aria-controls="collapse{{ $key + 1 }}">
                                        <span>
                                            {{ $item->question ?? '' }}
                                        </span>
                                        <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                    </button>
                                </h2>
                                <div id="collapse{{ $key + 1 }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $key + 1 }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $item->answer ?? '' }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            {!! norecords() !!}
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="faq-sidebar px-4">
                        <div class="add-banner mb-4">
                            {{-- FAQ Page First Ad --}}
                            {!! get_ad_module(4) !!}
                            {{-- FAQ Page First Ad --}}
                        </div>
                        <div class="add-banner">
                            {{-- FAQ Page Second Ad --}}
                            {!! get_ad_module(5) !!}
                            {{-- FAQ Page Second Ad --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
