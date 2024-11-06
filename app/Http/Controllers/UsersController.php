<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Load the view for users
    public function index()
    {
        return view('users_index'); // View for displaying users
    }

    // Fetch all users along with their roles
    public function fetchUsers()
    {
        $users = User::with('roles')->get();
        return response()->json($users);
    }

    // Fetch all roles for populating the dropdown
    public function fetchRoles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // Store a new user and assign roles
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required',  // Ensure role is passed
        ]);
    
        try {
            // Create the user
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,  // Combine first and last name
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash the password
            ]);
    
            // Assign roles to the user
            $user->syncRoles($request->roles);
    
            return response()->json(['status' => 'User Created Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);  // Return detailed error for debugging
        }
    }
    

    // Edit user data
    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::all();  // Fetch all available roles
        return response()->json(['user' => $user, 'roles' => $roles]);
    }

    // Update user data
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required',  // Ensure role is passed
        ]);

        // Update the user
        $user = User::find($id);
        $user->update([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'status' => $request->status, // Optional if you handle user status
        ]);

        // Sync roles for the user
        $user->syncRoles($request->roles);

        return response()->json(['status' => 'User Updated Successfully']);
    }

    // Delete user
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['status' => 'User Deleted Successfully']);
    }
}
