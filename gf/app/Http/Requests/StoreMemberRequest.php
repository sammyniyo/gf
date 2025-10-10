<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:500',

            // Professional Information
            'occupation' => 'required|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'education_level' => 'required|in:primary,secondary,diploma,bachelor,master,phd,other',
            'skills' => 'nullable|string|max:500',

            // Choir Details
            'voice_type' => 'required|in:soprano,alto,tenor,bass,unsure',
            'musical_experience' => 'required|in:beginner,intermediate,advanced,professional',
            'instruments' => 'nullable|string|max:255',
            'choir_experience' => 'nullable|in:none,school,church,community,professional',
            'why_join' => 'required|string|max:1000',

            // Final Touch
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'availability' => 'required|in:weekends,evenings,flexible,limited',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'terms_agreed' => 'required|accepted',
            'newsletter' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone.required' => 'Phone number is required.',
            'date_of_birth.required' => 'Date of birth is required.',
            'date_of_birth.before' => 'Date of birth must be before today.',
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Please select a valid gender.',
            'address.required' => 'Address is required.',
            'occupation.required' => 'Occupation is required.',
            'education_level.required' => 'Please select your education level.',
            'voice_type.required' => 'Please select your voice type.',
            'musical_experience.required' => 'Please select your musical experience level.',
            'why_join.required' => 'Please tell us why you want to join our choir.',
            'emergency_contact_name.required' => 'Emergency contact name is required.',
            'emergency_contact_phone.required' => 'Emergency contact phone is required.',
            'availability.required' => 'Please select your availability.',
            'profile_photo.image' => 'Profile photo must be an image file.',
            'profile_photo.mimes' => 'Profile photo must be a JPEG, PNG, JPG, or GIF file.',
            'profile_photo.max' => 'Profile photo must not be larger than 2MB.',
            'terms_agreed.required' => 'You must agree to the terms and conditions.',
            'terms_agreed.accepted' => 'You must agree to the terms and conditions.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'date_of_birth' => 'date of birth',
            'emergency_contact_name' => 'emergency contact name',
            'emergency_contact_phone' => 'emergency contact phone',
            'profile_photo' => 'profile photo',
            'terms_agreed' => 'terms and conditions agreement',
            'why_join' => 'reason for joining',
            'education_level' => 'education level',
            'voice_type' => 'voice type',
            'musical_experience' => 'musical experience',
            'choir_experience' => 'choir experience',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert newsletter checkbox to boolean
        $this->merge([
            'newsletter' => $this->has('newsletter'),
        ]);
    }
}
