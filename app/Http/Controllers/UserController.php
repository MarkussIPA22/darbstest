<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this line
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'personalCode' => 'required|string|unique:users,personal_code',
        ]);

        User::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'phone' => $validated['phone'],
            'personal_code' => $validated['personalCode'],
        ]);

        return response()->json(['message' => 'User saved successfully!']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'personalCode' => 'required|string|max:255',
    ]);

    $user = User::findOrFail($id);

    $user->first_name = $request->input('firstName');
    $user->last_name = $request->input('lastName');
    $user->phone = $request->input('phone');
    $user->personal_code = $request->input('personalCode');

    $user->save();

    return response()->json(['message' => 'Lietotajs atjauninats .']);
}

    
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Lietotajs izdzest veiksmigi.']);
        }
    
        return response()->json(['message' => 'Lietotajs nav atarst.'], 404);
    }

}
