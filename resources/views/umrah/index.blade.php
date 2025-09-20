@extends('layouts.app')
@section('title')
    <title>Umrah </title>
@endsection
@section('content')
@include('umrah.partials.umrah-banner')
@include('umrah.partials.packages')
@include('umrah.partials.content')
@include('partials.home.faqs')
@endsection
