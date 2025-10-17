<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;
use Exception;

class BranchController extends Controller
{
    // Show branches index page
    public function index()
    {
        return view('admin.branch.index');
    }

    // Fetch all branches
    public function getall(Request $request)
    {
        $branches = Branch::orderBy('id', 'desc')->get();
        return response()->json(['data' => $branches], 200);
    }

    // Store a new branch (without status)
    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required|string|max:255|unique:branches,name',
            'location' => 'required|string|max:255',
            'location_url' => 'required',
            'phone'    => 'required|regex:/^[0-9]+$/|digits_between:10,15',
            'email'    => 'nullable|email',
            'branchId' => 'required|string|max:100|unique:branches,branchId',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $branch = Branch::create([
            'name'     => $request->name,
            'location' => $request->location,
            'location_url' => $request->location_url,
            'branchId' => $request->branchId,
            'phone'    => $request->phone,
            'email'    => $request->email,
            // status will use default from migration (active/inactive)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Branch created successfully!',
            'data'    => $branch,
        ], 201);
    }

    // Fetch single branch by ID
    public function get($id)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return response()->json([
                'success' => false,
                'message' => 'Branch not found',
            ], 404);
        }

        return response()->json($branch, 200);
    }

    // Update branch (without status)
    public function update(Request $request)
    {
        $rules = [
            'id'       => 'required|exists:branches,id',
            'name'     => 'required|string|max:255|unique:branches,name,' . $request->id,
            'location' => 'required|string|max:255',
            'location_url' => 'nullable',
            'phone'    => 'required|regex:/^[0-9]+$/|digits_between:10,15',
            'email'    => 'nullable|email',
            'branchId' => 'required|string|max:100|unique:branches,branchId,' . $request->id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $branch = Branch::find($request->id);
        if (!$branch) {
            return response()->json([
                'success' => false,
                'message' => 'Branch not found',
            ], 404);
        }

        $branch->update([
            'name'     => $request->name,
            'location' => $request->location,
            'location_url' => $request->location_url,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'branchId' => $request->branchId,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Branch updated successfully!',
            'data'    => $branch,
        ], 200);
    }

    // Update status separately
    public function status(Request $request)
    {
        try {
            $branch = Branch::find($request->id);

            if (!$branch) {
                return response()->json([
                    'success' => false,
                    'message' => 'Branch not found',
                ], 404);
            }

            $branch->status = $request->status;
            $branch->save();

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

    // Soft delete branch
    public function destroy($id)
    {
        try {
            $branch = Branch::find($id);

            if (!$branch) {
                return response()->json([
                    'success' => false,
                    'message' => 'Branch not found',
                ], 404);
            }

            $branch->delete();

            return response()->json([
                'success' => true,
                'message' => 'Branch deleted successfully',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
