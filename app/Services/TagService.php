<?php namespace App\Services;

use App\Tag;
use Validator;

class TagService {

    /**
     * Get a validator for an incoming tag creation request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'    => 'required|max:255',
            'comment' => 'required',
        ]);
    }

    /**
     * @param  array $data
     */
    public function create(array $data)
    {
        Tag::create([
            'name'    => $data['name'],
            'comment' => $data['comment'],
        ]);

    }

}
