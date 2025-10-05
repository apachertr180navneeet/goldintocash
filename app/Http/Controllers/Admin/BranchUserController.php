<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BranchUser;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;
use Exception;

class BranchUserController extends Controller
{
    // Show branch users index page
    public function index()
    {
        $branches = Branch::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('admin.branchuser.index', compact('branches'));
    }

    // Fetch all branch users
    public function getall(Request $request)
    {
        $users = BranchUser::with('branch')->orderBy('id', 'desc')->get();
        return response()->json(['data' => $users], 200);
    }

    // Store a new branch user
    public function store(Request $request)
    {
        $rules = [
            'username'  => 'required|string|max:255|unique:branch_users,username',
            'mobile'    => 'required|regex:/^[0-9]+$/|digits_between:10,15|unique:branch_users,mobile',
            'branch_id' => 'required|exists:branches,id',
            'address'   => 'nullable|string|max:500',
            'password'  => 'nullable|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = BranchUser::create([
            'username'  => $request->username,
            'mobile'    => $request->mobile,
            'branch_id' => $request->branch_id,
            'address'   => $request->address,
            'password'  => bcrypt($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Branch user created successfully!',
            'data'    => $user,
        ], 201);
    }

    // Fetch single branch user
    public function get($id)
    {
        $user = BranchUser::with('branch')->find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Branch user not found',
            ], 404);
        }

        return response()->json($user, 200);
    }

    // Update branch user
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:branch_users,id',
            'username'  => 'required|string|max:255|unique:branch_users,username,' . $request->id,
            'mobile'    => 'required|string|max:15|unique:branch_users,mobile,' . $request->id,
            'branch_id' => 'required|exists:branches,id',
            'address'   => 'nullable|string|max:500',
            'password'  => 'nullable|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = BranchUser::find($request->id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Branch user not found',
            ], 404);
        }

        $user->update([
            'username'  => $request->username,
            'mobile'    => $request->mobile,
            'branch_id' => $request->branch_id,
            'address'   => $request->address,
            'password'  => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Branch user updated successfully!',
            'data'    => $user,
        ], 200);
    }

    // Update status
    public function status(Request $request)
    {
        try {
            $user = BranchUser::find($request->id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Branch user not found',
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

    // Soft delete branch user
    public function destroy($id)
    {
        try {
            $user = BranchUser::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Branch user not found',
                ], 404);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Branch user deleted successfully',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
