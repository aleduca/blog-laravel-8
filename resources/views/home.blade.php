@extends('master')

@section('header-intro')

<h2>Buscar post</h2>
<form action="{{ route('home') }}" method="get">
  <input type="text" name="s" placeholder="O que deseja buscar?" value="{{ request()->input('s') ?? '' }}">
  <button type="submit">Buscar</button>
</form>

@endsection


@section('main')

<div class="container">
    <!--Section: Content-->
    <section class="text-center">
      @if (request()->input('s'))
      <h4 class="mb-5"><strong>Busca por: {{ request()->input('s') }} ({{ $posts->total() }}) </strong></h4>
      @else  
      <h4 class="mb-5"><strong>Últimos Posts</strong></h4>
      @endif
      
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

      @if (request()->input('s'))
        {{ $posts->appends(['s' => request()->input('s')])->links() }}
      @endif

    </section>
  </div>

@endsection


