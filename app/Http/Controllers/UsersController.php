<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function permissionsIndex()
    {
        // Define modules (or fetch from the database if you have a modules table)
        $modules = [
            (object)['name' => 'dashboard'],
            (object)['name' => 'school'],
            (object)['name' => 'apartment'],
            (object)['name' => 'student'],
            (object)['name' => 'pic company'],
            (object)['name' => 'billing method'],
            (object)['name' => 'package'],
            (object)['name' => 'role'],
            (object)['name' => 'billings'],
            (object)['name' => 'message'],
            (object)['name' => 'user'],
        ];
    
        // Pass modules and user to the view
        $user = auth()->user(); // Retrieve the currently authenticated user
        $roleName = $user->roles->first()->name ?? 'No Role Assigned';

        // Pass modules, user, and role name to the view
        return view('permission', compact('modules', 'user', 'roleName'));
        // return view('permission', compact('modules', 'user'));
    }
    
    
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
            // $user->syncRoles($request->roles);
            $user->syncRoles($request->roles);
            return response()->json(['status' => 'User Created Successfully']);
            // return response()->json(['status' => 'User Created Successfully']);
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

    public function assignPermissionsToRole(Request $request, Role $role)
{
    $request->validate([
        'permissions' => 'array', // Expect an array of permission names
        'permissions.*' => 'exists:permissions,name', // Ensure each permission exists
    ]);

    try {
        // Sync permissions with the role (adds specified permissions, removes others)
        $role->syncPermissions($request->permissions);

        return response()->json(['status' => 'Permissions updated successfully for the role']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
public function updatePermissions(Request $request, User $user)
{
    $request->validate([
        'permissions' => 'array', // Expect an array of permission names
        'permissions.*' => 'exists:permissions,name', // Ensure each permission exists
    ]);

    try {
        // Sync permissions directly with the user
        $user->syncPermissions($request->permissions);

        return response()->json(['status' => 'User permissions updated successfully!']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
