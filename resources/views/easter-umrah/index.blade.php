@extends('layouts.app')
@section('title')
    <title>2026 Easter Umrah All Inclusive Packages and Deals...</title>
    <meta name="description"
        content="Safa Travel offers the best and most affordable Easter Umrah Packages from UK. Get the best last minute Easter Umrah deals covering Flights, Visa, Hotels, Transport & Ziyarats">
@endsection
@section('content')
@include('easter-umrah.partials.easter-banner')
@include('easter-umrah.partials.packages')
@include('easter-umrah.partials.content')
@include('easter-umrah.partials.faqs')
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
