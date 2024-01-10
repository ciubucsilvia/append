<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('edit post');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:125',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'post_category_id' => 'required|integer|exists:post_categories,id',
            'tags.*' => 'integer|exists:tags,id',
            'content' => 'required|max:5000',
        ];
    }
}
