<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller
{
    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'prenom' => 'nullable|string|max:191', 
            'pseudo' => 'nullable|string|max:191', 
        ]);

        // Update the user's profile
        $user->update($data);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
