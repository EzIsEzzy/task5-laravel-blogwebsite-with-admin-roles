<x-admin.admin-layout pageName="Show Categories" brandName="Blog Website" icon="{{asset('admin/assets/img/favicon/favicon.ico')}}">
    <x-slot:content>
        <x-session-notifier />
    <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">All Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add Category</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $category)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this category?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No categories found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
    </x-slot:content>
    <x-slot:footer>

    </x-slot:footer>
</x-admin.admin-layout>