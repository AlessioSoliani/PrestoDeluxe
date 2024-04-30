<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userProfile extends Controller
{
    public function UserProfile(User $user){
        $user=Auth::user();
        $announcements = $user->announcements()->get();
        return view('Profilo.user_profile',compact('user', 'announcements'));

    }

    public function destroyAd($announcementId){ 
        $announcement = Announcement::findOrFail($announcementId); 
         
        if (!auth()->check()) {
            return redirect()->back()->with(['error' => 'Devi effettuare l\'accesso per eliminare l\'annuncio']);
        }
           
        if ($announcement->user_id !== auth()->id()) {
                return redirect()->back()->with(['error' => 'Non hai i permessi per eliminare questo annuncio']);
            }        
         
            foreach ($announcement->images as $image) {
                Storage::delete($image->path);
                $image->delete();
            }
        $announcement->delete();
        return redirect()->back()->with(['success'=> 'Annuncio eliminato']);
    }
}
