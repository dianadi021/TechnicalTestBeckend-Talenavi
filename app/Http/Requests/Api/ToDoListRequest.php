<?php

namespace App\Http\Requests\Api;

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
            'time_tracked' => ['nullable', 'numeric', 'max:255'],
            'due_date' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title wajib diisi.',
            'due_date.required' => 'Due date wajib diisi.',
            'due_date.date_format' => 'Format tanggal harus "Y-m-d H:i:s", contoh: 2025-10-10 13:00:00.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->jsonResponse(422, "Data yang dikirimkan tidak sesuai!", ['errors' => $validator->errors()]));
    }
}
