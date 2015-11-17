<?php
namespace App\Http\Controllers;
 
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
 
class UserController extends Controller{
 
 
    public function getAllUsers()
    { 
        $users  = User::all(); 
        return response()->json($users); 
    }
 
    public function getUser($id)
    { 
        $user  = User::find($id); 
        return response()->json($user);
    }
 
    public function saveUser(Request $request)
    { 
        $user = User::create($request->all()); 
        return response()->json($user); 
    }
 
    public function deleteUser($id)
    {
        $user  = User::find($id); 
        $user->delete(); 
        return response()->json([
            'success' => true
        ]);
    }
 
    public function updateUser(Request $request, $id)
    {
        $userUpdate = $request->all();
        $user  = User::find($id); 
        $user->update($userUpdate); 
        return response()->json($user);
    }
 
}