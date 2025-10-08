<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\Traits\ResponseCode;

class ToDoListRequest extends FormRequest
{
    use ResponseCode;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'assignee' => ['nullable', 'string', 'max:255'],
            'due_date' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
            'time_tracked' => ['nullable', 'numeric', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required.',
            'due_date.required' => 'Due date is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->jsonResponse(422, "Data yang dikirimkan tidak sesuai!", [ 'errors' => $validator->errors() ]));
    }
}
