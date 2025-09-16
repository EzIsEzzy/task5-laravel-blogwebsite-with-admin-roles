<?php 

namespace App\Http\Repositories;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface {
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        $category = $this->model->create($data);
    }
    public function update( $id, array $data)
    {
        return $this->model->update($data,$id);
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    public function find($id): Category
    {
        return $this->model->findOrFail($id);
    }
    public function all()
    {
        return $this->model->all();
    }
    public function uploadImage(CategoryRequest $request, ?string $originalImage = null)
    {
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $url = Storage::disk('public')->putFileAs('categories', $image, Str::random(10).'.'.$image->extension());
            //original image => existing picture path ($category->image -> categories/default.jpg)
            if($originalImage && $originalImage != 'categories/default.jpg')
            {
                Storage::disk('public')->delete($originalImage);
            }
            return $url;
        }
        return $originalImage ?? 'categories/default.jpg';
    }
}