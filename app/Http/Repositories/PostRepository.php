<?php 

namespace App\Http\Repositories;

use App\Http\Requests\PostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepository implements PostRepositoryInterface {
    private $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        $post = $this->model->create($data);
        $post->categories()->attach($data["categories"]);
        return $post;

    }
    public function update(int $id, array $data)
    {
        $post = $this->model->findOrFail($id);
        $post->update($data);
        $post->categories()->sync($data["categories"]);
        return $post;
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image && Storage::exists('public/' . $post->image)) {
        Storage::delete('public/' . $post->image);
    }

    return $post->destroy($id);
    }
    public function find($id): Post
    {
        $post = $this->model->findOrFail($id);
        return $post;
    }
    public function all()
    {
        return $this->model->all();
    }
    // public function categoriesForPostExist($id)
    // {
    //     $categories = Category::all();
    //     foreach ($categories as $category)
    //     {
    //         if($this->model->categories()->where('category_id', $category->id)->exists())
    //             return true;
    //     }
    // }
    public function uploadImage(PostRequest $request, ?string $originalImage = null)
    {
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $url = Storage::disk('public')->putFileAs('posts', $image, Str::random(10).'.'.$image->extension());
            //original image => existing picture path ($post->image -> posts/default.jpg)
            if($originalImage && $originalImage != 'posts/default.jpg')
            {
                Storage::disk('public')->delete($originalImage);
            }
            return $url;
        }
        return $originalImage ?? 'posts/default.jpg';
    }
}