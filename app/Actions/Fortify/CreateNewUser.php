<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'user_photo' => ['required', 'image'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'user_photo' => ['required', 'image'], // Regole di validazione per user_photo
            'telephone_number' => ['required', 'string'], // Regole di validazione per telephone_number
            'location' => ['required', 'string'], // Regole di validazione per location
        ])->validate();

        // Salva l'immagine del profilo
        $userPhoto = $input['user_photo'];
        $userPhotoPath = $userPhoto->store('user_photos', 'public');

        // Ridimensiona l'immagine se necessario (opzionale)
        $resizedImage = Image::make(public_path("storage/{$userPhotoPath}"));
        if 
        ($resizedImage->width() > 300 || $resizedImage->height() > 300) {
            $resizedImage->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
        }$resizedImage->encode('jpg', 80)->save();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'user_photo' => $userPhotoPath, // Salvataggio del percorso dell'immagine
            'telephone_number' => $input['telephone_number'], // Salvataggio di telephone_number
            'location' => $input['location'], // Salvataggio di location
        ]);
    }
}
