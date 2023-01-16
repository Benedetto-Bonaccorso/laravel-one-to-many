<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|unique:projects,title|min:5|max:100",
            "cover_image" => "nullable|image|max:300",
            "author" => "nullable|max:255",
            "deadline" => "nullable",
        ];
    }

    public function messages()
    {
        return[
            "title.required" => "A title is required",
            "title.unique" => "This title is already present in your portfolio",
            "title.min" => "A title must contain at least 5 characters",
            "title.max" => "titles have a max of 100 characters",
            "author.max" => "titles have a max of 255 characters",
        ];
    }
}
