<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
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
      'title' =>
      'required',
      'company' => 'required',
      'description' => 'required|max:50',
      'salary' => 'required|max:50',
    ];
  }

  public function messages(): array
  {
    return [
      'title.required' => 'El título es requerido',
      'company.required' => 'La compañia es requerido',
      'description.required' => 'La descripción es requerido',
      'salary.required' => 'El salario es requerido',
    ];
  }
}
