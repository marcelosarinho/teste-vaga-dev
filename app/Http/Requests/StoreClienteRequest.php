<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nomeCliente' => 'required',
            'cpfCliente' => 'required|unique:clientes,cpf|min:11|max:11',
        ];
    }

    public function messages(): array
    {
        return [
            'nomeCliente.required' => "O nome do cliente é obrigatório!",
            'cpfCliente.required' => "O CPF do cliente é obrigatório!",
            'cpfCliente.unique' => "CPF já cadastrado!",
            'cpfCliente.min' => "O CPF deve ter 11 caracteres!",
            'cpfCliente.max' => "O CPF deve ter 11 caracteres!",
        ];
    }
}
