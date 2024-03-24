@extends('layouts.app')

@section('title', 'Crea Post')

@section('content')
    <header>
        <h1>Nuovo Post</h1>
    </header>

@include('includes.posts.form')
@endsection

@section('scripts')
    <script>
        const placeholder = 'https://';
        const input = document.getElementById('image');
        const preview = document.getElementById('preview');
                        
        input.addEventListener('input', () => {
            preview.src = input.value || placeholder;
        });
    </script>
@endsection
