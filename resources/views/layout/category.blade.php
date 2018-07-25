@php
    $category_model = new App\Category;
    $categories = $category_model->has('post')->get();
@endphp
<div class="widget categories">
    <header>
        <h3 class="h6">Categorias</h3>
    </header>
    @foreach ($categories as $category)
    <div class="item d-flex justify-content-between">
        <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
        <span>{{ $category->post()->count() }}</span>
    </div>
    @endforeach
</div>
