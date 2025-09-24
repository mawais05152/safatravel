@extends('layouts.app')
@section('title')
    <title>Umrah Packages 2025 | All Inclusive Cheap Packages - Safa Travel</title>
    <meta name="description"
        content="Safa Travel offers affordable Umrah packages from the UK for families, groups, and individuals. Our all-inclusive deals cover flights, hotels, visas, and transport, with trusted service every step of your journey.">
@endsection
@section('content')
@include('umrah.partials.umrah-banner')
@include('umrah.partials.packages')
@include('umrah.partials.content')
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
                    document.querySelectorAll('.faq-answer').forEach(ans => ans.style.display = "none");
                    document.querySelectorAll('.faq-toggle').forEach(tgl => tgl.textContent = "+");

                    answer.style.display = "block";
                    toggle.textContent = "-";
                }
            });
        });
    </script>
@endsection
