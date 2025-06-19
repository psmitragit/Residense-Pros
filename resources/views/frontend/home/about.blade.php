@extends('frontend.layout.app')

@section('content')
    <section class="about_us py-5 px-2 px-md-0">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <h2 class="about_heading mb-5 mb-md-4">About Residences Pros</h2>
                    <p class="about_subheading mb-2">ResidencesPros.com was born from a simple vision:</p>
                    <p class="bio mb-3">Make real estate easier, fairer, and more accessible — for everyone.</p>
                    <div class="about_details my-3">
                        <p class="mb-3">
                            Make real estate easier, fairer, and more accessible — for everyone.
                            Founded and inspired by the experiences of immigrants, families, and agents navigating two
                            continents, ResidencesPros is more than just a listing site. We connect renters, buyers,
                            landlords, and agents across the United States and Africa — starting with South Africa —
                            offering clean design, verified listings, agent support, and a human approach to property
                            discovery.</p>

                        <p>Our mission is to build a trusted, culturally aware space where people can confidently list,
                            search, and transact without being overwhelmed or ignored. Whether you’re searching for your
                            first apartment in Johannesburg or listing a home for sale in Atlanta, we’re here to make it
                            simple, honest, and empowering. This platform is built on service, integrity, and community.
                            We’re proud to serve — and even prouder to help you find where you belong.</p>
                        <h4>ResidencesPros — Real estate, reimagined.</h4>
                    </div>
                    <a href="{{ route('contact') }}">
                        <button class="button2">Contact Us
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </a>
                </div>
                <div class="col-md-6">
                    <img src="{{ 'assets/frontend/images/About-us.jpg' }}" alt="About us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Why choose us section -->

    <section class="why_choose_us px-2 px-md-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 why_choose_us_card p-5">
                    <h2 class="about_heading mb-5 mb-md-4">Why Choose Us</h2>
                    <ul class="why_choose_us_list">
                        <li>
                            <strong>We Bridge Continents:</strong> From Atlanta to Johannesburg, our platform helps
                            users connect across markets — ideal for expats, immigrants, and global investors.
                        </li>
                        <li>
                            <strong>We’re Built for Real People:</strong> Affordable plans, honest listings, and no tech
                            headaches — we’re here for the everyday renter, the small landlord, and the growing agent.
                        </li>
                        <li>
                            <strong>We Protect and Empower:</strong> Every listing is verified, every ad reviewed, and
                            every inquiry tracked — helping reduce fraud and create a safer user experience.
                        </li>
                        <li>
                            <strong>We Serve With Purpose:</strong> ResidencesPros stands on values: service, trust, and
                            community impact.
                        </li>
                        <li>
                            <strong>We’re Building More Than a Platform:</strong> Our mission is to be the go-to space
                            for real estate education, fair housing, and meaningful connections — not just
                            transactions..
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="about_us py-5 px-2 px-md-0">
        <div class="container py-md-5">
            <div class="row g-5 text-center">
                <div class="col-md-12">
                    <h2 class="about_below_heading mb-3 mb-md-4 text-center">Residences Pros</h2>
                    <p class="about_subheading mb-2">Find, Rent, or Sell Homes — Across Borders, Without the Hassle.</p>
                    <div class="about_details my-3">
                        <p class="mb-3">
                            ResidencesPros is a people-first real estate platform connecting buyers, renters, and agents
                            across the USA and Africa — starting with South Africa. We simplify property discovery,
                            empower small landlords and agents, and ensure every listing is trusted, verified, and easy
                            to navigate.</p>

                        <p>Whether you're relocating, investing, or renting your first apartment, ResidencesPros gives
                            you the tools to move confidently — with clean design, transparent pricing, and responsive
                            support that big platforms simply don’t offer.</p>
                    </div>
                    <a href="{{ route('properties') }}">
                        <button class="button2">
                            View Our Properties
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
