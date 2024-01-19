<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StorecompanyRequest extends FormRequest
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
            'companyname'=>'required|max:255',
            'email'=>'nullable|email|unique:companies',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
        ];
    }
}
