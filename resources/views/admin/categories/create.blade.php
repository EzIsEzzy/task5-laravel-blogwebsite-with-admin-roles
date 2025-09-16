<x-admin.admin-layout pageName="Create Category" brandName="Blog Website" icon="{{asset('admin/assets/img/favicon/favicon.ico')}}">
    <x-slot:content>
        <x-session-notifier />
   <div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Create New Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" 
                           placeholder="Enter category name" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div> 
    </x-slot:content>
    <x-slot:footer>

    </x-slot:footer>
</x-admin.admin-layout>