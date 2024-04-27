<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required','string','email','max:255',
                Rule::unique('users')->ignore($user->id), ],

            'telephone_number' => ['required', 'string'],
            'location' => ['required', 'string'],
            'user_photo' => ['nullable', 'image', 'max:2048'],
           
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'telephone_number' => $input['telephone_number'],
                'location' => $input['location'],
            ])->save();

            // Carica e aggiorna la foto del profilo se fornita
        if (isset($input['user_photo'])) {
            // Elimina la foto del profilo attuale
            if ($user->user_photo) {
                Storage::disk('public')->delete($user->user_photo);
            }

            // Carica la nuova foto del profilo
            $userPhotoPath = $input['user_photo']->store('user_photos', 'public');

            // Ridimensiona l'immagine se necessario (opzionale)
            $resizedImage = Image::make(public_path("storage/{$userPhotoPath}"));
            if ($resizedImage->width() > 300 || $resizedImage->height() > 300) {
                $resizedImage->fit(300, 300)->save();
            }

            // Aggiorna il percorso della nuova foto del profilo
            $user->update(['user_photo' => $userPhotoPath]);
        }
      }  
    }

    public function edit(){
        $user = auth()->user();
        return view('Profilo.edit_prpofile', compact('user'));
    }
}
    /**
     * Update the given verified user's profile information.
     *
    //  * @param  array<string, string>  $input
    //  */
    // // protected function updateVerifiedUser(User $user, array $input): void
    // // {
    // //     $user->forceFill([
    // //         'name' => $input['name'],
    // //         'email' => $input['email'],
    // //         'email_verified_at' => null,
    // //     ])->save();

    // //     $user->sendEmailVerificationNotification();
    // // }

