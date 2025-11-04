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
            // Member Type
            'member_type' => 'required|in:member,friendship',

            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:500',

            // Professional Information
            'occupation' => 'required|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'education_level' => 'required|in:primary,secondary,diploma,bachelor,master,phd,other',
            'skills' => 'nullable|string|max:500',
            'church' => 'nullable|string|max:255',

            // Choir Details
            'voice' => 'required|in:soprano,alto,tenor,bass,unsure',
            'musical_experience' => 'required|in:beginner,intermediate,advanced,professional',
            'instruments' => 'nullable|string|max:255',
            'choir_experience' => 'nullable|in:none,school,church,community,professional',
            'why_join' => 'required|string|max:1000',
            'talent' => 'nullable|string|max:255',

            // Final Touch
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'emergency_contact_relationship' => 'nullable|string|max:255',
            'availability' => 'required|in:weekends,evenings,flexible,limited',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'terms_agreed' => 'required|accepted',
            'newsletter' => 'nullable|boolean',
            'hobbies' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'member_type.required' => 'Please select membership type.',
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone.required' => 'Phone number is required.',
            'birthdate.required' => 'Date of birth is required.',
            'birthdate.before' => 'Date of birth must be before today.',
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Please select a valid gender.',
            'address.required' => 'Address is required.',
            'occupation.required' => 'Occupation is required.',
            'education_level.required' => 'Please select your education level.',
            'voice.required' => 'Please select your voice type.',
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
            'member_type' => 'membership type',
            'first_name' => 'first name',
            'last_name' => 'last name',
            'birthdate' => 'date of birth',
            'emergency_contact_name' => 'emergency contact name',
            'emergency_contact_phone' => 'emergency contact phone',
            'emergency_contact_relationship' => 'emergency contact relationship',
            'profile_photo' => 'profile photo',
            'terms_agreed' => 'terms and conditions agreement',
            'why_join' => 'reason for joining',
            'education_level' => 'education level',
            'voice' => 'voice type',
            'musical_experience' => 'musical experience',
            'choir_experience' => 'choir experience',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert checkboxes to proper values
        $this->merge([
            'newsletter' => $this->has('newsletter') ? true : false,
            'terms_agreed' => $this->has('terms_agreed') ? '1' : '0',
        ]);

        if ($this->hasFile('photo_path') && !$this->hasFile('profile_photo')) {
            $this->files->set('profile_photo', $this->file('photo_path'));
        }
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ($this->expectsJson() || $this->ajax() || $this->wantsJson()) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'Please check the form and correct the errors.',
                    'errors' => $validator->errors()
                ], 422)
            );
        }

        parent::failedValidation($validator);
    }
}
