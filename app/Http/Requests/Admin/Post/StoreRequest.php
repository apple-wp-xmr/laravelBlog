<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'string|required',
            'content' => 'string|required',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения.', // 'This field is required.'
            'title.string' => 'Данные должны быть строкой.', // 'The data must be a string.'
            'content.required' => 'Поле content обязательно.', // 'The content field is required.'
            'content.string' => 'Поле content должно быть строкой.', // 'The content field must be a string.'
            'preview_image.required' => 'Поле preview_image обязательно.', // 'The preview_image field is required.'
            'preview_image.file' => 'Поле preview_image должно быть файлом.', // 'The preview_image must be a file.'
            'main_image.required' => 'Поле main_image обязательно.', // 'The main_image field is required.'
            'main_image.file' => 'Поле main_image должно быть файлом.', // 'The main_image must be a file.'
            'category_id.required' => 'Поле category_id обязательно.', // 'The category_id field is required.'
            'category_id.exists' => 'Выбранное значение для category_id некорректно.', // 'The selected category_id is invalid.'
            'tag_ids.array' => 'Поле tag_ids должно быть массивом.', // 'The tag_ids must be an array.'
            'tag_ids.*.exists' => 'Выбранное значение для tag_ids некорректно.', // 'The selected tag_ids is invalid.'
        ];
    }
}
