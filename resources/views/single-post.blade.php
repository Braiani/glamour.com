@extends('layout.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
<!-- Latest Posts -->
<main class="post blog-post col-lg-8">
    <div class="container">
        <div class="post-single">
            <div class="post-thumbnail">
                <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
            </div>
            <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                <div class="category">
                    <a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
                </div>
                </div>
                <h1>
                    {{ $post->title }}
                    {{-- <a href="#"><i class="fa fa-bookmark-o"></i></a> --}}
                </h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                    <a href="#" class="author d-flex align-items-center flex-wrap">
                        <div class="title">
                            <span>{{ $post->authorId->name }}</span>
                        </div>
                    </a>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="date"><i class="icon-clock"></i> {{ $post->created_at->diffForHumans() }}</div>
                        <div class="views"><i class="icon-eye"></i> {{ $post->visualizacoes }}</div>
                        <div class="comments meta-last"><i class="icon-comment"></i>{{ $post->comments_count }}</div>
                    </div>
                </div>
                <div class="post-body">
                    <p class="lead">{{ $post->excerpt }}</p>
                    {!! $post->body !!}
                </div>
                <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                    @php
                        $prev_post = $post->where('id', ($post->id - 1))->first();
                        $next_post = $post->where('id', ($post->id + 1))->first();
                    @endphp
                    @if(isset($prev_post))
                    <a href="{{ route('post', $prev_post->slug) }}" class="prev-post text-left d-flex align-items-center">
                        <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                        <div class="text">
                            <strong class="text-primary">Post anterior</strong>
                            <h6>{{ $prev_post->title }}</h6>
                        </div>
                    </a>
                    @else
                        <div class="prev-post text-left d-flex align-items-center"></div>
                    @endif
                    @isset($next_post)
                    <a href="{{ route('post', $next_post->slug) }}" class="next-post text-right d-flex align-items-center justify-content-end">
                        <div class="text">
                            <strong class="text-primary">Próximo post </strong>
                            <h6>{{ $next_post->title }}</h6>
                        </div>
                        <div class="icon next"><i class="fa fa-angle-right"></i></div>
                    </a>
                    @endisset
                </div>
                <div class="post-comments">
                    <header>
                        <h3 class="h6">Comentários<span class="no-of-comments">({{ $post->comments()->where('approved', 1)->count() }})</span></h3>
                    </header>
                    @foreach ($post->comments as $comment)
                    @if ($comment->isApproved)
                    <div class="comment">
                        <div class="comment-header d-flex justify-content-between">
                        <div class="user d-flex align-items-center">
                            <div class="image">
                                <img src="{{ asset('/img/user.svg') }}" alt="usuario" class="img-fluid rounded-circle">
                            </div>
                            <div class="title">
                                <strong>{{ $comment->name }}</strong><span class="date">{{ $comment->updated_at->format('F Y') }}</span>
                            </div>
                        </div>
                        </div>
                        <div class="comment-body">
                        <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="add-comment">
                    <header>
                        <h3 class="h6">Deixe seu comentário</h3>
                    </header>
                    <form action="{{ route('comment', Request::path()) }}" method="POST" class="commenting-form">
                        <div class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <input type="text" name="name" id="username" placeholder="Nome" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" id="useremail" placeholder="Endereço de e-mail (Não será publicado)" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="comment" id="usercomment" placeholder="Escreva seu comentário" class="form-control" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-secondary">Enviar comentário</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($errors->any())
                    @php
                        $mensagem = '';
                        foreach ($errors->all() as $error) {
                            $mensagem .= $error . '<br>';
                        }
                        toastr()->error($mensagem, 'Erro!');
                    @endphp
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
