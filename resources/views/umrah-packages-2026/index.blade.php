@extends('layouts.app')
@section('title')
    <title>Umrah Packages 2026 from UK | Trusted, Budget-Friendly & All-Star Options</title>
    <meta name="description"
        content="Plan Umrah 2026 with a trusted UK travel agency. Secure affordable or luxury packages with hotels near Haram, ATOL flights & visa services. Book early for peace of mind.">
@endsection
@section('content')
@include('umrah-packages-2026.partials.umrah-banner-2026')
@include('umrah-packages-2026.partials.packages')
@include('umrah-packages-2026.partials.content')
@include('umrah-packages-2026.partials.faqs')
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
