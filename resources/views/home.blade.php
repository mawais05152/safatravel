@extends('layouts.app')
@section('title')
    <title>Safa Travel | Leading islamic tours agency in UK</title>
    <meta name="description"
        content="Join Safa Travel for islamic tours from the UK. Our packages are simple, affordable, and made to fit your needs, with full support every step.">
@endsection
@section('styles')
    @verbatim
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "TravelAgency",
                "@id": "https://www.safatravel.co.uk/#travelagency",
                "name": "Safa Travel",
                "url": "https://www.safatravel.co.uk/",
                "logo": "https://www.safatravel.co.uk/images/logo.png",
                "image": [
                    "https://www.safatravel.co.uk/images/umrah-package.jpg",
                    "https://www.safatravel.co.uk/images/logo.png"
                ],
                "description": "Join Safa Travel for Islamic tours from the UK. Our packages are simple, affordable, and made to fit your needs, with full support every step.",
                "telephone": "+44-20-3286-7666",
                "email": "info@safatravel.co.uk",
                "priceRange": "££",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "13 Station Rd",
                    "addressLocality": "London",
                    "addressRegion": "England",
                    "postalCode": "SE25 5AH",
                    "addressCountry": "United Kingdom"
                },
                "areaServed": {
                    "@type": "Country",
                    "name": "United Kingdom"
                },
                "knowsAbout": [
                    "Hajj packages UK",
                    "Umrah packages UK",
                    "Islamic travel agency",
                    "Pilgrimage tours UK",
                    "London travel agency"
                ],
                "sameAs": [
                    "https://www.facebook.com/safatravel.co.uk",
                    "https://www.instagram.com/safatraveluk/",
                    "https://x.com/safatravel_uk",
                    "https://uk.pinterest.com/safatraveluk/",
                    "https://www.linkedin.com/company/safa-travel-tours"
                ],
                "openingHours": "Mon-Sat 10:00-18:00"
            }
        </script>
    @endverbatim
@endsection
@section('content')
    @include('partials.home.banner')
    @include('partials.home.flights')
    @include('partials.home.packages')
    @include('partials.home.faqs')
@endsection
@section('scripts')
    <script>
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                let answer = item.nextElementSibling;
                let toggle = item.querySelector('.faq-toggle');

                if (answer.style.display === "block") {
                    answer.style.display = "none";
                    toggle.textContent = "+";
                }
                else {
                    // Close all others
                    document.querySelectorAll('.faq-answer').forEach(ans => ans.style.display = "none");
                    document.querySelectorAll('.faq-toggle').forEach(tgl => tgl.textContent = "+");

                    // Open this one
                    answer.style.display = "block";
                    toggle.textContent = "-";
                }
            });
        });
    </script>
@endsection
