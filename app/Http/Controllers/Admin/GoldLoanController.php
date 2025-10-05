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

        $goldLoan->aadhar_card_url = $goldLoan->aadhar_card ? $goldLoan->aadhar_card : null;
        $goldLoan->pan_card_url = $goldLoan->pan_card ? $goldLoan->pan_card : null;
        $goldLoan->gold_loan_slip_url = $goldLoan->gold_loan_slip ? $goldLoan->gold_loan_slip : null;


        return response()->json($goldLoan, 200);
    }

    // // Store a new gold loan
    // public function store(Request $request)
    // {
    //     $rules = [
    //         'date' => 'required|date',
    //         'bank_branch' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'gold_net_weight' => 'required|numeric',
    //         'mobile_no' => 'required|regex:/^[0-9]+$/|digits_between:10,15|max:11',
    //         'family_mobile_no' => 'nullable|regex:/^[0-9]+$/|digits_between:10,15|max:11',
    //         'gold_loan_amount' => 'required|numeric',
    //     ];

    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'errors'  => $validator->errors(),
    //         ], 422);
    //     }

    //     $goldLoan = GoldLoan::create([
    //         'date' => \Carbon\Carbon::parse($request->date)->format('d-m-Y'),
    //         'bank_branch' => $request->bank_branch,
    //         'name' => $request->name,
    //         'gold_net_weight' => $request->gold_net_weight,
    //         'mobile_no' => $request->mobile_no,
    //         'family_mobile_no' => $request->family_mobile_no,
    //         'address' => $request->address,
    //         'city' => $request->city,
    //         'gold_loan_amount' => $request->gold_loan_amount,
    //         'aadhar_card' => $request->aadhar_card,
    //         'pan_card' => $request->pan_card,
    //         'gold_loan_slip' => $request->gold_loan_slip,
    //         'branch' => $request->branch,
    //         'branch_user' => $request->branch_user,
    //         'status' => $request->status ?? 'pending',
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Gold Loan created successfully!',
    //         'data'    => $goldLoan,
    //     ], 201);
    // }

    // // Update gold loan
    // public function update(Request $request)
    // {
    //     $rules = [
    //         'id' => 'required|exists:gold_loans,id',
    //         'date' => 'required|date',
    //         'bank_branch' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'gold_net_weight' => 'required|numeric',
    //         'mobile_no' => 'required|string|max:15',
    //         'gold_loan_amount' => 'required|numeric',
    //     ];

    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'errors'  => $validator->errors(),
    //         ], 422);
    //     }

    //     $goldLoan = GoldLoan::find($request->id);

    //     if (!$goldLoan) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Gold Loan not found',
    //         ], 404);
    //     }

    //     $goldLoan->update([
    //         'date' => \Carbon\Carbon::parse($request->date)->format('d-m-Y'),
    //         'bank_branch' => $request->bank_branch,
    //         'name' => $request->name,
    //         'gold_net_weight' => $request->gold_net_weight,
    //         'mobile_no' => $request->mobile_no,
    //         'family_mobile_no' => $request->family_mobile_no,
    //         'address' => $request->address,
    //         'city' => $request->city,
    //         'gold_loan_amount' => $request->gold_loan_amount,
    //         'aadhar_card' => $request->aadhar_card,
    //         'pan_card' => $request->pan_card,
    //         'gold_loan_slip' => $request->gold_loan_slip,
    //         'branch' => $request->branch,
    //         'branch_user' => $request->branch_user,
    //         'status' => $request->status ?? $goldLoan->status,
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Gold Loan updated successfully!',
    //         'data'    => $goldLoan,
    //     ], 200);
    // }


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
            'gold_loan_slip' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'aadhar_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'pan_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $request->all();

        // Handle file uploads
        if ($request->hasFile('gold_loan_slip')) {
            $file = $request->file('gold_loan_slip');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/gold_loan'), $filename);
            $data['gold_loan_slip'] = url('uploads/gold_loan/' . $filename);
        }

        if ($request->hasFile('aadhar_card')) {
            $file = $request->file('aadhar_card');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/aadhar'), $filename);
            $data['aadhar_card'] = url('uploads/aadhar/' . $filename);
        }

        if ($request->hasFile('pan_card')) {
            $file = $request->file('pan_card');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/pan'), $filename);
            $data['pan_card'] = url('uploads/pan/' . $filename);
        }

        $data['date'] = \Carbon\Carbon::parse($request->date)->format('d-m-Y');
        $data['status'] = $request->status ?? 'pending';

        $goldLoan = GoldLoan::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Gold Loan created successfully!',
            'data'    => $goldLoan,
        ], 201);
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
            'gold_loan_slip' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'aadhar_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'pan_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
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

        $data = $request->all();
        $data['date'] = \Carbon\Carbon::parse($request->date)->format('d-m-Y');

        // Handle file uploads and delete old files
        $files = [
            'gold_loan_slip' => 'uploads/gold_loan',
            'aadhar_card' => 'uploads/aadhar',
            'pan_card' => 'uploads/pan',
        ];

        foreach ($files as $field => $folder) {
            if ($request->hasFile($field)) {
                if ($goldLoan->$field) {
                    $oldPath = public_path(parse_url($goldLoan->$field, PHP_URL_PATH));
                    if (file_exists($oldPath)) unlink($oldPath);
                }
                $file = $request->file($field);
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path($folder), $filename);
                $data[$field] = url($folder . '/' . $filename);
            }
        }

        $goldLoan->update($data);

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
