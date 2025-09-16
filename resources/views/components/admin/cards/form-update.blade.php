@props(['formTitle', 'formDesc', 'buttonTitle', 'action', 'method'])
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">{{ $formTitle }}</h5>
                      <small class="text-muted float-end">{{ $formDesc }}</small>
                    </div>
                    <div class="card-body">
                      <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($method)
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Title</label>
                          <input type="text" name="title" class="form-control" id="basic-default-fullname" value="{{ $post->title }}" placeholder="Post Title">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Content</label>
                          <textarea class="form-control" name="content" placeholder="Enter the content">{{ $post->content }}</textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Image</label>
                          <img src="/storage/{{ $post->image }}" height="300" width="300" />
                          <div class="input-group input-group-merge">
                            <input type="file" id="basic-default-email" type="image" class="form-control" name="image">
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-phone">Categories</label>
                          @forelse ($categories as $category)
                            <div class="form-check mt-3">
                            <label class="form-check-label" for="defaultCheck1"> {{ $category->name }} </label>
                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="defaultCheck1"
                            {{ $post->categories()->where('category_id', $category->id)->exists() ? 'checked' : '' }}>
                          </div>
                            @empty
                            <br> No Categories Added
                          @endforelse
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $buttonTitle }}</button>
                      </form>
                    </div>
                  </div>
        </div>
    </div>
</div>