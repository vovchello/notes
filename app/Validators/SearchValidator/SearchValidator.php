<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 30.11.18
 * Time: 14:58
 */

namespace App\Validators\SearchValidator;


use Illuminate\Foundation\Http\FormRequest;

class SearchValidator extends FormRequest
{
    public function rules()
    {
        return[
            'search' => 'required'
        ];
    }
}
