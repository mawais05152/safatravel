@extends('layouts.app')
@section('title')
    <title>Safe Travel - Home</title>

@endsection
@section('content')
    @include('partials.home.banner')
    @include('partials.home.flights')
    @include('partials.home.packages')
    @include('partials.home.faqs')
@endsection
