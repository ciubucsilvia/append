<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create project');
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
            'description' => 'max:125',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'project_category_id' => 'required|integer|exists:project_categories,id',
            'client_id' => 'required|integer|exists:clients,id',
            'content' => 'required|max:4000',
        ];
    }
}
