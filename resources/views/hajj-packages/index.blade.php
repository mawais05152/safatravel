@extends('layouts.app')
@section('title')
    <title>Cheap Hajj Packages 2026 from UK | Flights, Visa & 5 Star Hotels</title>
    <meta name="description"
        content="Safa Travel offers Cheap Hajj Packages 2026 with flights, visa, Qurbani, transport, shuttle, Ziyarat, daily lectures, guided tours & meals. Choose from 5 Star and 4 Star hotels near Haram. Book group & family Hajj packages from London, Manchester & Birmingham with customizable options.">
@endsection
@section('content')
@include('partials.home.banner')
    @include('hajj-packages.partials.packages')
    @include('hajj-packages.partials.content')
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
