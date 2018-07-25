@extends('layout.master')

@section('title', 'Sobre mim')

@section('content')
<!-- Intro Section-->
<main class="post blog-post col-lg-8">
    <h1>Sobre mim</h1>
    <div class="container">
        <p class="text-big">{{ setting('site.about') }}</p>
    </div>
</main>
@endsection
