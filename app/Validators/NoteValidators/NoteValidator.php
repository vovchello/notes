<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 30.11.18
 * Time: 10:51
 */

namespace App\Validators\NoteValidators;


use Illuminate\Foundation\Http\FormRequest;

class NoteValidator extends FormRequest
{
    public function rules()
    {
        return[
            'title' => 'required',
            'description' => 'required'

        ];
    }
}
