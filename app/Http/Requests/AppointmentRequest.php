<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->start_time = date('Y-m-d', strtotime($this->start_time));
        return [
            'doctor'  => [
                'required'
            ],
            'start_time'  => [
                'required',
                'date', 'after_or_equal:today',
            ],
            'stop_time' => [
                'required',
                'date', 'after:start_time',
            ],
        ];
    }
}
