@extends('layouts.app')
@section('title')
    <title>2025 December Umrah Packages |  Special Prices for Umrah in December - Safa Travel</title>
    <meta name="description"
        content="Book affordable December Umrah packages from the UK with flights, visa & hotels included. Experience a peaceful Umrah in December with Safa Travel.">
@endsection
@section('content')
@include('december-umrah.partials.banner')
@include('december-umrah.partials.december-umrah-packages')
@include('december-umrah.partials.december-umrah-content')
@include('december-umrah.partials.december-umrah-content')
@include('december-umrah.partials.december-umrah-faqs')
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
