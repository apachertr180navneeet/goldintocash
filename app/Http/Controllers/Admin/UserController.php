<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends Controller
{
    // Show users index page
    public function index()
    {
        return view('admin.user.index');
    }

    // Fetch all users
    public function getall(Request $request)
    {
        // Fetch all users whose role is user
        $users = User::where('role', 'user')->orderBy('id', 'desc')->get();
        return response()->json(['data' => $users], 200);
    }

    // Store a new user
    public function store(Request $request)
    {
        $rules = [
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'phone'       => 'required|regex:/^[0-9]+$/|digits_between:10,15|unique:users,phone',
            'password'    => 'required|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'full_name'   => $request->first_name . ' ' . $request->last_name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'role'        => 'user',
            'password'    => bcrypt($request->password),
            'status'      => 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully!',
            'data'    => $user,
        ], 201);
    }

    // Fetch single user
    public function get($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        return response()->json($user, 200);
    }

    // Update user
    public function update(Request $request)
    {
        $rules = [
            'id'          => 'required|exists:users,id',
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $request->id,
            'phone'       => 'required|regex:/^[0-9]+$/|digits_between:10,15|unique:users,phone,' . $request->id,
            'password'    => 'nullable|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::find($request->id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        $user->update([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'full_name'   => $request->first_name . ' ' . $request->last_name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'password'    => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully!',
            'data'    => $user,
        ], 200);
    }

    // Update status
    public function status(Request $request)
    {
        try {
            $user = User::find($request->id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found',
                ], 404);
            }

            $user->status = $request->status;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // Soft delete user
    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found',
                ], 404);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
