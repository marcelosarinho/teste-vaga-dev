<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
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
            'nomeProduto' => 'required',
            'descricaoProduto' => 'required',
            'precoProduto' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nomeProduto.required' => "O nome do produto é obrigatório!",
            'descricaoProduto.required' => "A descrição do produto é obrigatória!",
            'precoProduto.required' => "O preço do produto é obrigatório!",
        ];
    }
}
