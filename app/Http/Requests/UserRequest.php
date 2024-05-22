<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if (request()->routeIs('user.login')){
            return [
                'emailaddress'=>'required|string|max:255',
                'password'=>'required|min:5',       
            ];
        
        }
        else if (request()->routeIs('user.register')) {
            return [
                'crn' => 'required|string|max:255',
                'lastname' => 'required', 'string', 'max:255',
                'firstname' => 'required', 'string', 'max:255',
                'middlename' => 'nullable', 'string', 'max:255', 
                'suffix' => 'nullable', 'string', 'max:10',
                'dateofbirth' => 'required|date',
                'emailaddress' => 'required|email|max:255',
                'password' => 'required|string|min:8|',
                'buildingname' => 'nullable|string|max:255',
                'street' => 'nullable|string|max:255',
                'lot_and_blockno' => 'nullable|string|max:255',
                'subdivision' => 'nullable|string|max:255',
                'city_municipality' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'postalcode' => 'required|string|max:20',
                'faddress' => 'nullable|string|max:255',
                'fcity' => 'nullable|string|max:255',
                'fcountry' => 'nullable|string|max:255',
                'fzip' => 'nullable|string|max:20',
                'registrationpreference' => 'required|string|max:255',
            ];
        }
        else if (request()->routeIs('user.update')) {
            return [
                'crn' => 'required|string|max:255',
                'lastname' => 'required', 'string', 'max:255',
                'firstname' => 'required', 'string', 'max:255',
                'middlename' => 'nullable', 'string', 'max:255', 
                'suffix' => 'nullable', 'string', 'max:10',
                'dateofbirth' => 'required|date',
                'emailaddress' => 'required|email|max:255',
                'password' => 'nullable|string|min:8|',
                'buildingname' => 'nullable|string|max:255',
                'street' => 'nullable|string|max:255',
                'lot_and_blockno' => 'nullable|string|max:255',
                'subdivision' => 'nullable|string|max:255',
                'city_municipality' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'postalcode' => 'required|string|max:20',
                'faddress' => 'nullable|string|max:255',
                'fcity' => 'nullable|string|max:255',
                'fcountry' => 'nullable|string|max:255',
                'fzip' => 'nullable|string|max:20',
                'registrationpreference' => 'required|string|max:255',
            ];
        }
        
        return [
            'username'=>'required|string|max:255',
            'password'=>'required|min:5',       
        ];
    }
}
