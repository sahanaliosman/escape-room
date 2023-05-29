<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookingStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'room_id' => 'required|exists:escape_rooms,id',
            'time_slot_id' => 'required|exists:time_slots,id',
            'booking_date' => 'required|date_format:d/m/Y'
        ];
    }


    /**
     * ...
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * ...
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'validation error',
            'errors' => $validator->errors()
        ]));
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'room_id.required' => 'Room ID is required!',
            'time_slot_id.required' => 'Time slot ID is required!',
            'booking_date.required' => 'Booking date is required!'
        ];
    }
}
