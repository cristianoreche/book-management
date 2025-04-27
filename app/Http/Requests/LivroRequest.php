<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->has('valor')) {
            $valor = str_replace(['R$', '.', ','], ['', '', '.'], $this->valor);
            $this->merge([
                'valor' => $valor,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'valor' => ['required', 'numeric'],
            'assunto_id' => ['required', 'exists:assuntos,id'],
            'autores' => ['required', 'array', 'min:1'],
            'autores.*' => ['exists:autores,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.numeric' => 'O campo valor deve ser um número válido.',
            'assunto_id.required' => 'Selecione um assunto.',
            'assunto_id.exists' => 'O assunto selecionado é inválido.',
            'autores.required' => 'Selecione pelo menos um autor.',
            'autores.*.exists' => 'Um dos autores selecionados é inválido.',
        ];
    }
}

