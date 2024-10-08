<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:8|max:255',
            'description' => 'required|string|min:8|max:255',
            'surface' => 'required|integer|min:9',
            'rooms' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:0',
            'floors' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'city' => 'required|string|min:8|max:255',
            'address' => 'required|string|min:8|max:255',
            'postal_code' => 'required|min:4|max:255',
            'sold' => 'nullable|boolean',
            'options' => 'array|exists:options,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => ['array', 'max:5']
        ];
    }

    public function messages(): array
    {
        return [
            'images.max' => 'Vous ne pouvez pas upload plus de 5 images',
            'images.*.image' => 'Les fichiers doivent être des images',
            'images.*.mimes' => 'Les images doivent être au format : jpeg, png, jpg ou gif',
            'images.*.max' => 'Les images ne doivent pas dépasser 2Mo'
        ];
    }
}
