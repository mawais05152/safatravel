@extends('layouts.app')
@section('title')
    <title>Ramadan Umrah Packages 2026 | Best Ramadan Umrah Deals - Safa Travel</title>
    <meta name="description"
        content="Safa Travel offers the best Ramadan Umrah Packages 2026 from UK. Get the best last Ashra Umrah deals covering Flights, Visa, Hotels, Transport & Ziyarats">
@endsection
@section('content')
@include('ramadan-umrah.partials.ramadan-banner')
@include('ramadan-umrah.partials.ramadan-packages')
@include('ramadan-umrah.partials.ramadan-content')
@include('ramadan-umrah.partials.ramadan-faqs')
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
