<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:255',
            'content' => 'required|min:2|max:50',
            'due_date' => 'required|date|after:01-01-1900|before:tomorrow'
        ];
    }

    public function messages()
    {
        $message = [
            'title.required' => 'Title size must be between 2 and 255',
            'title.min' => 'Title size min 2 characters',
            'title.max' => 'Title size max 255 characters',
            'content.required' => 'Title size must be between 2 and 255',
            'content.min' => 'Title size min 2 characters',
            'content.max' => 'Title size max 255 characters',
            'due_date.required' => 'Due Date between year 1900 and today',
            'due_date.after' => 'Due Date not after year 1900',
            'due_date.tomorrow' => 'Due Date not input tomorrow',

        ];
        return $message;
    }
}
