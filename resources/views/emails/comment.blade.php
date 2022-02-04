@component('mail::message')

Olá, {{ $post->user->fullName }} o usuário {{ $user->fullName}} comentou em seu post <b>{{ $post->title }}</b>

@component('mail::button', ['url' => $url])
    Visitar post
@endcomponent

@endcomponent