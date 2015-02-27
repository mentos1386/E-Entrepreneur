<?php namespace App\Services;

use App\Categories;
use Validator;

class CategoryService {

    /**
     * Get a validator for an incoming category creation request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {

        //dd($data);
        return Validator::make($data, [
            'name'    => 'required|max:255',
            'comment' => 'required',
            'parent' => 'sometimes|exists:categories,id'
        ]);
    }

    /**
     *  Create Category
     *
     * @param  array $data
     */
    public function create(array $data)
    {
        Categories::create([
            'name'    => $data['name'],
            'comment' => $data['comment'],
            'parent'  => $data['parent']
        ]);

    }


    /**
     *  Update category
     *
     * @param array $data
     * @param int $id
     */
    public function update(array $data, $id)
    {

        $category = Categories::findOrNew($id);

        $category->name = $data['name'];
        $category->comment = $data['comment'];
        $category->parent = $data['parent'];

        $category->save();
    }

}
