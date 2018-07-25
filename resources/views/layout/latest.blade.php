@php
    $post_model = new App\Post;
    $latest_posts = $post_model->take(3)->latest()->withCount('comments')->get();
@endphp

<div class="widget latest-posts">
    <header>
        <h3 class="h6">Últimos posts</h3>
    </header>
    <div class="blog-posts">
        @foreach ($latest_posts as $post)
        <a href="{{ route('post', $post->slug) }}">
            <div class="item d-flex align-items-center">
                <div class="image">
                    <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                </div>
                <div class="title"><strong>{{ $post->title }}</strong>
                <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> {{ $post->visualizacoes }}</div>
                    <div class="comments"><i class="icon-comment"></i> {{ $post->comments_count }}</div>
                </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
