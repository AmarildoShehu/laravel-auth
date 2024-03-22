@extends('layouts.app')

@section('title', 'Home')
@section('content')

    <header>
        <h1>My Blog</h1>
        <h3>i nostri post</h3>

        @if ($posts->hasPages())
            {{ $posts->links() }}
        @endif
    </header>

    @forelse($posts as $post)
    <div class="card my-5" >
        <div class="card-header">
            {{$post->title}}
        </div>
        <div class="card-body">
            <div class="row">
                @if($post->image)
                <div class="col-3">
                    <img src="{{ $post->image}}" alt="{{ $post->title}}">
                </div>
                @endif
                
                <div class="col">
    
                    <h5 class="card-title mb-3">{{ $post->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->created_at }}</h6>
                    <p class="card-text">{{ $post->content }}</p>
                    
                </div>
            </div>

        </div>
    </div>
    @empty
        <h3 class="text-center">Non ci sono post</h3>
    @endforelse
@endsection