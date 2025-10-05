<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    GoldLoan,
    Branch,
    BranchUser
};
use Validator, Exception;

class GoldLoanController extends Controller
{
    // Show gold loans index page
    public function index()
    {
        $branches = Branch::with(['branchUsers' => function($query) {
            $query->where('status', 'active');
        }])
        ->where('status', 'active')
        ->orderBy('name', 'asc')
        ->get();

        return view('admin.goldloans.index', compact('branches'));
    }

    // Fetch all gold loans
    public function getall(Request $request)
    {
        $goldLoans = GoldLoan::orderBy('id', 'desc')->get();
        return response()->json(['data' => $goldLoans], 200);
    }

    // Store a new gold loan
    public function store(Request $request)
    {
        $rules = [
            'date' => 'required|date',
            'bank_branch' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'gold_net_weight' => 'required|numeric',
            'mobile_no' => 'required|regex:/^[0-9]+$/|digits_between:10,15|max:11',
            'family_mobile_no' => 'nullable|regex:/^[0-9]+$/|digits_between:10,15|max:11',
            'gold_loan_amount' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $goldLoan = GoldLoan::create([
            'date' => \Carbon\Carbon::parse($request->date)->format('d-m-Y'),
            'bank_branch' => $request->bank_branch,
            'name' => $request->name,
            'gold_net_weight' => $request->gold_net_weight,
            'mobile_no' => $request->mobile_no,
            'family_mobile_no' => $request->family_mobile_no,
            'address' => $request->address,
            'city' => $request->city,
            'gold_loan_amount' => $request->gold_loan_amount,
            'aadhar_card' => $request->aadhar_card,
            'pan_card' => $request->pan_card,
            'gold_loan_slip' => $request->gold_loan_slip,
            'branch' => $request->branch,
            'branch_user' => $request->branch_user,
            'status' => $request->status ?? 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gold Loan created successfully!',
            'data'    => $goldLoan,
        ], 201);
    }

    public function get($id)
    {
        $goldLoan = GoldLoan::find($id);

        if (!$goldLoan) {
            return response()->json([
                'success' => false,
                'message' => 'Gold Loan not found',
            ], 404);
        }

        // Format only the date field
        $goldLoan->date = \Carbon\Carbon::parse($goldLoan->date)->format('d-m-Y');


        return response()->json($goldLoan, 200);
    }

    // Update gold loan
    public function update(Request $request)
    {
        $rules = [
            'id' => 'required|exists:gold_loans,id',
            'date' => 'required|date',
            'bank_branch' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'gold_net_weight' => 'required|numeric',
            'mobile_no' => 'required|string|max:15',
            'gold_loan_amount' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $goldLoan = GoldLoan::find($request->id);

        if (!$goldLoan) {
            return response()->json([
                'success' => false,
                'message' => 'Gold Loan not found',
            ], 404);
        }

        $goldLoan->update([
            'date' => \Carbon\Carbon::parse($request->date)->format('d-m-Y'),
            'bank_branch' => $request->bank_branch,
            'name' => $request->name,
            'gold_net_weight' => $request->gold_net_weight,
            'mobile_no' => $request->mobile_no,
            'family_mobile_no' => $request->family_mobile_no,
            'address' => $request->address,
            'city' => $request->city,
            'gold_loan_amount' => $request->gold_loan_amount,
            'aadhar_card' => $request->aadhar_card,
            'pan_card' => $request->pan_card,
            'gold_loan_slip' => $request->gold_loan_slip,
            'branch' => $request->branch,
            'branch_user' => $request->branch_user,
            'status' => $request->status ?? $goldLoan->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gold Loan updated successfully!',
            'data'    => $goldLoan,
        ], 200);
    }

    // Update status only
    public function status(Request $request)
    {
        try {
            $goldLoan = GoldLoan::find($request->id);

            if (!$goldLoan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gold Loan not found',
                ], 404);
            }

            $goldLoan->status = $request->status;
            $goldLoan->save();

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

    // Soft delete gold loan
    public function destroy($id)
    {
        try {
            $goldLoan = GoldLoan::find($id);

            if (!$goldLoan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gold Loan not found',
                ], 404);
            }

            $goldLoan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Gold Loan deleted successfully',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getUsersByBranch($branchId)
    {
        $users = BranchUser::where('branch_id', $branchId)
                            ->where('status', 'active')
                            ->get(['id','username']);

        return response()->json($users);
    }
}
