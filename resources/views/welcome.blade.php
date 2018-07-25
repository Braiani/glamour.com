@extends('layout.master')

@section('content')
    <!-- Latest Posts -->
    <main class="posts-listing col-lg-8">
        <div class="container">
            <div class="row">
                <!-- post -->
                @foreach ($posts as $post)
                <div class="post col-xl-6">
                    <div class="post-thumbnail">
                        <a href="{{ route('post', $post->slug) }}">
                            <img src="{{ Voyager::image($post->image) }}" alt="..." class="img-fluid">
                        </a>
                    </div>
                    <div class="post-details">
                        <div class="post-meta d-flex justify-content-between">
                            <div class="date meta-last">{{ $post->created_at->format('j F | Y') }}</div>
                            <div class="category">
                                <a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
                            </div>
                        </div>
                        <a href="{{ route('post', $post->slug) }}">
                            <h3 class="h4">{{ $post->title }}</h3>
                        </a>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        <footer class="post-footer d-flex align-items-center">
                            <a href="{{ route('autor', $post->authorId->id) }}" class="author d-flex align-items-center flex-wrap">
                                <div class="title">
                                    <span>{{ $post->authorId->name }}</span>
                                </div>
                            </a>
                            <div class="date"><i class="icon-clock"></i> {{ $post->created_at->diffForHumans() }}</div>
                            <div class="comments meta-last"><i class="icon-comment"></i>{{ $post->comments_count }}</div>
                        </footer>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                {{ $posts->links() }}
            </nav>
        </div>
    </main>
@endsection
