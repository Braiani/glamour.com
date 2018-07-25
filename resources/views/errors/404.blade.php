@extends('layout.master')

@section('title', 'Oops...')

@section('content')
<!-- Intro Section-->
<main class="post blog-post col-lg-8">
    <h1>Oopss....</h1>
    <div class="container">
        <p class="text-big">Alguma coisa deu errado! A página que você tentou acessar não foi encontrada.</p>
        <p class="text-big"><a href="{{ route('home') }}">Clique aqui</a> para retornar para a página inicial!</p>
    </div>
</main>
@endsection
