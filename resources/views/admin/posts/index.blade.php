<x-admin.admin-layout pageName="Show Posts" brandName="Blog Website" icon="{{asset('admin/assets/img/favicon/favicon.ico')}}">
    <x-slot:content>
        <x-session-notifier />
   <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card mb-4">
                <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Created At</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $index => $post)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td><img src="{{ asset('storage/' . $post->image) }}" height="100" width="100"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name ?? 'N/A' }}</td>
                            <td>
                                @if($post->categories && count($post->categories) > 0)
                                    @foreach($post->categories as $category)
                                        <span class="badge bg-info text-dark">{{ $category->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">No Categories</span>
                                @endif
                            </td>
                            <td>{{ $post->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="btn btn-sm btn-outline-danger" 
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No posts found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
        </div>
   </div>
    </x-slot:content>
    <x-slot:footer>

    </x-slot:footer>
</x-admin.admin-layout>
