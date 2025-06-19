@extends('frontend.layout.app')

@section('content')
    <section class="faq-section py-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div class="accordion custom-faq-accordion" id="faqAccordion">
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                    aria-expanded="false" aria-controls="collapse1">
                                    <span>There are many variations of passages of Lorem Ipsum?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 2 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                    aria-expanded="false" aria-controls="collapse2">
                                    <span>It is a long established fact: that a reader will be distracted?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 3 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                                    aria-expanded="false" aria-controls="collapse3">
                                    <span>Various versions have evolved over the years, sometimes by accident?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 4 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                                    aria-expanded="false" aria-controls="collapse4">
                                    <span>All the Lorem Ipsum generators on the Internet?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 5 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse5"
                                    aria-expanded="false" aria-controls="collapse5">
                                    <span>It uses a dictionary of over 200 Latin words?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 6 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse6"
                                    aria-expanded="false" aria-controls="collapse6">
                                    <span>Contrary to popular belief, Lorem Ipsum is not simply random text?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 7 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse7"
                                    aria-expanded="false" aria-controls="collapse7">
                                    <span>Many desktop publishing packages and web page editors?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 8 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading8">
                                <button
                                    class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse8"
                                    aria-expanded="false" aria-controls="collapse8">
                                    <span>They vary in complexity?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 9 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading9">
                                <button
                                    class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse9"
                                    aria-expanded="false" aria-controls="collapse9">
                                    <span>It avoids repetition and awkward phrases?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 10 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading10">
                                <button
                                    class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse10"
                                    aria-expanded="false" aria-controls="collapse10">
                                    <span>Right. It’s based on a 1st-century BC Latin text?</span>
                                    <i class="fa-solid fa-angle-right ms-auto faq-arrow-icon"></i>
                                </button>
                            </h2>
                            <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum odio
                                    ligula, at dapibus dolor placerat quis. Sed congue efficitur libero, sit amet
                                    tristique ipsum. Vivamus consectetur mauris nec sodales feugiat. Ut tempor tristique
                                    nisi a placerat. Curabitur massa felis, posuere et placerat vel, ultricies nec
                                    sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Sed vehicula turpis at tortor auctor blandit. Vestibulum mollis
                                    imperdiet justo eleifend consequat. Vestibulum eget dapibus metus, eu elementum
                                    neque. Etiam ut sem et metus vestibulum ornare. Duis in nunc nulla. In vestibulum
                                    congue nunc, sed ornare nulla tincidunt eget. Vivamus imperdiet magna nec arcu
                                    ornare, eget vulputate metus porta. Donec rhoncus pharetra elementum. Morbi
                                    condimentum velit nec enim pellentesque, et mollis arcu volutpat. Cras lacus tortor,
                                    mattis at elit non, maximus maximus lacus.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sidebar Ads -->
                <div class="col-lg-4">
                    <div class="faq-sidebar px-4">
                        <div class="add-banner mb-4">
                            <img src="{{ asset('assets/frontend/images/300-600.png') }}" class="img-fluid shadow-sm"
                                alt="Ad 300x600">
                        </div>
                        <div class="add-banner">
                            <img src="{{ asset('assets/frontend/images/300-250.png') }}" class="img-fluid shadow-sm"
                                alt="Ad 300x250">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
