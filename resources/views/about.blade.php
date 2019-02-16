@extends('layout.master')

@section('title', 'Sobre mim')

@push('css')
    <style>
        .profile {
            padding-top: 15px;
            padding-bottom: 25px;
            margin-bottom: 15px;
        }

        .img-profile {
            width: 100%;
        }

        .img-circle {
            max-width: 100%;
            border-radius: 50%;
        }

        .nome {
            font-weight: bold;
            font-size: 25px;
            /*text-transform: uppercase;*/
            color: black;
            margin-bottom: 15px;
        }

        .text-desc {
            font-size: 14px;
        }

        .text-desc p {
            color: black !important;
            text-align: justify;
        }
    </style>
@endpush

@section('content')
    <!-- Intro Section-->
    <main class="post blog-post col-lg-8">
        <h1>Sobre nós</h1>
        <div class="row">
            @foreach($abouts as $about)
                {{--<h2 class="title">{{ $about->nome }}</h2>--}}
                {{--{!! $about->texto !!}--}}
                {{--<img alt="" src="{{ Voyager::image($about->imagem) }}">--}}
                <div class="col-sm-12">
                    <div class="profile row">
                        <div class="col-sm-4">
                            <div class="img-profile">
                                <img class="img-circle" src="{{ Voyager::image($about->imagem) }}">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-profile">
                                <div class="nome text-center">{{ $about->nome }}</div>
                                <div class="text-desc blockquote">{!! $about->texto !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
