@extends('master')

@section('header-intro')

<h2>Buscar post</h2>
<form action="{{ route('home') }}" method="get">
  <input type="text" name="s" placeholder="O que deseja buscar?">
  <button type="submit">Buscar</button>
</form>

@endsection


@section('main')

<div class="container">
    <!--Section: Content-->
    <section class="text-center">
      <h4 class="mb-5"><strong>Posts ({{ $posts->total() }})</strong></h4>

      
      <div class="posts">
      @forelse ($posts as $post)
        <div class="post">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="{{ $post->thumb }}" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <p class="card-text">
                {{ Str::limit($post->content, 60, '...') }}
              </p>
              <p>Autor: {{ $post->user->fullName }} - {{ $post->comments->count() }} comentários</p>
              <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Leia mais</a>
            </div>
          </div>
        </div>
        @empty
        <h2>Nenhum post encontrado</h2>
        @endforelse
    </div>
    
    {{ $posts->links() }}

    </section>
  </div>

@endsection


