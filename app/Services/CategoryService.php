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
        return Validator::make($data, [
            'name'    => 'required|max:255',
            'comment' => 'required',
            'parent'  => 'numeric'
        ]);
    }

    /**
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

}
