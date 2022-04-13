<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class ReviewFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->redirect = url()->previous() . '#review-div';
        return [
            //
            'review' => 'required:min:5'
        ];
    }
    
    public function messages(){
        return [
            'review.required' => 'حقل المراجعة فارغ يا فارغ',
            'review.min' => 'محتوى الراجعه قصير'
        ];
    }

    public function failedAuthorization(){
        throw new AuthorizationException('لا تمتلك صلاحية اضافة مراجعة'); 
    }
}
