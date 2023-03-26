<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return $this->method() == 'POST' ? $this->storeRules() : $this->updateRules();
    }

    public function storeRules()
    {
        return [
            'name'       => ['required'],
            'sex'        => ['required'],
            'job'        => ['required'],
            'birth_date' => ['required'],
            'username'   => ['required', 'unique:users,id,' . $this->id],
            'email'      => ['required', 'email', 'unique:users,id,' . $this->id],
            'phone'      => ['required', 'numeric', 'unique:users,id,' . $this->id],
            'password'   => ['required', 'min:6'],
            'address'    => ['required'],
            'avatar'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function updateRules()
    {
        return [
            'name'       => ['required'],
            'sex'        => ['required'],
            'job'        => ['required'],
            'birth_date' => ['required'],
            'username'   => ['nullable', 'unique:users,id,' . $this->id],
            'email'      => ['nullable', 'email', 'unique:users,id,' . $this->id],
            'phone'      => ['required', 'numeric', 'unique:users,id,' . $this->id],
            'password'   => ['nullable', 'min:6'],
            'address'    => ['required'],
            'avatar'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
