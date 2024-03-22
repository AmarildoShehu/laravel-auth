@extends('layouts.app')

  @section('title', 'Posts')

  @section('content')
   
    <header class="mt-3">
        <h1>Posts</h1>
    </header>
    
    <!-- Table -->
  <table class="table table-dark table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>

    </tr>
  </thead>
  <tbody>
    @forelse($posts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->slug }}</td>
      <td>{{ $post->created_at }}</td>
      <td>{{ $post->updated_at }}</td>
      <td>
        <div class="d-flex justify-content-end g-3">
            <a href="{{ route('admin.posts.show', $post)}}" class="btn btn-sm btn-primary">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-sm btn-warning"> 
              <i class="fas fa-pencil"></i>
            </a>
        
        <form action="{{ route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')        
            <button type="submit" class="btn btn-sm btn-danger">
              <i class="fas fa-trash-can"></i>
            </button>
        </form>
    
    </div>
        </div>
      </td>
    </tr>

    @empty
    <tr>
        <td colspan="6">
            <h3 class="text-center">Non ci sono post</h3>
        </td>
    </tr>
    @endforelse
    
   
  </tbody>
</table>


<!-- questa genera errore  -->

@endsection

@section('scripts')
  @vite('resources/js/delete_confirmation.js')
@endsection
