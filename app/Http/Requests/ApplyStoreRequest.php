<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyStoreRequest extends FormRequest
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
      'cv' => 'required|file|mimes:pdf|max:2048',
      'comment' => 'required',
    ];
  }

  public function messages(): array
  {
    return [
      'cv.required' => 'El cv es requerido',
      'cv.mimes' => 'El tipo de archivo debe ser pdf',
      'comment.required' => 'El comentario es requerido',

    ];
  }
}
