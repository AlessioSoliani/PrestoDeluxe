<?php
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class EditUserProfileInformation implements UpdatesUserProfileInformation
{
    public function update(User $user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'telephone_number' => ['required', 'string'],
            'location' => ['required', 'string'],
            'user_photo' => ['nullable', 'image', 'max:2048'], // Add validation rules for user photo
        ])->validate();

        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'telephone_number' => $input['telephone_number'],
            'location' => $input['location'],
        ])->save();

        // Upload and update user photo if provided
        if (isset($input['user_photo'])) {
            if ($user->user_photo) {
                // Delete current user photo
                // Use appropriate disk according to your configuration
                Storage::disk('public')->delete($user->user_photo);
            }

            // Upload new user photo
            $userPhotoPath = $input['user_photo']->store('user_photos', 'public');

            // Resize image if necessary (optional)
            $resizedImage = Image::make(public_path("storage/{$userPhotoPath}"));
            if ($resizedImage->width() > 300 || $resizedImage->height() > 300) {
                $resizedImage->fit(300, 300)->save();
            }

            // Update user photo path
            $user->update(['user_photo' => $userPhotoPath]);
        }
    }
}
