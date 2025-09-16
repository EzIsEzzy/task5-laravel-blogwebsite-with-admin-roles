<x-admin.admin-layout pageName="Create Post" brandName="Blog Website" icon="{{asset('admin/assets/img/favicon/favicon.ico')}}">
    <x-slot:content>
        <x-session-notifier />
    <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">{{ $post->title }}</h2>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Back to Posts</a>
    </div>

    <div class="card shadow-sm">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" 
                 alt="{{ $post->title }}" 
                 class="card-img-top" 
                 style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h5 class="card-title mb-2">By {{ $post->user->name ?? 'Unknown Author' }}</h5>
            <p class="card-subtitle text-muted mb-3">
                Posted on {{ $post->created_at->format('d M Y, h:i A') }}
            </p>

            <div class="mb-3">
                @if($post->categories && count($post->categories) > 0)
                    @foreach($post->categories as $category)
                        <span class="badge bg-info text-dark">{{ $category->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">No Categories</span>
                @endif
            </div>

            <div class="card-text mb-4">
                {!! nl2br(e($post->content)) !!}
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary me-2">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        class="btn btn-danger" 
                        onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
    </x-slot:content>
    <x-slot:footer>

    </x-slot:footer>
</x-admin.admin-layout>