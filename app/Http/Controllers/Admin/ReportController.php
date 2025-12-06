<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }

    public function getAll()
    {
        $reports = Report::orderBy('id', 'desc')->get();
        return response()->json(['data' => $reports], 200);
    }

    public function store(Request $request)
    {
        $rules = $this->rules();
        $rules['application_no'] .= '|unique:reports,application_no';
        $rules['gold_image'] = 'required|image|mimes:jpg,jpeg,png|max:2048';
        $rules['silver_image'] = 'required|image|mimes:jpg,jpeg,png|max:2048';

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $request->all();

        // Handle file uploads to public/uploads
        if ($request->hasFile('gold_image')) {
            $file = $request->file('gold_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/gold'), $filename);
            $data['gold_image'] = url('uploads/gold/' . $filename);
        }

        if ($request->hasFile('silver_image')) {
            $file = $request->file('silver_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/silver'), $filename);
            $data['silver_image'] = url('uploads/silver/' . $filename);
        }

        $report = Report::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Report created successfully!',
            'data'    => $report,
        ], 201);
    }

    public function get($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Report not found',
            ], 404);
        }

        // Format date if needed
        if ($report->date) {
            $report->date = \Carbon\Carbon::parse($report->date)->format('Y-m-d');
        }

        // Attach full URLs for images
        $report->gold_image_url = $report->gold_image ? $report->gold_image : null;
        $report->silver_image_url = $report->silver_image ? $report->silver_image : null;

        return response()->json($report, 200);
    }


    public function update(Request $request)
    {
        $report = Report::find($request->id);
        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Report not found',
            ], 404);
        }

        $rules = $this->rules();
        $rules['application_no'] .= '|unique:reports,application_no,' . $request->id;
        $rules['gold_image'] = 'nullable|image|mimes:jpg,jpeg,png|max:2048';
        $rules['silver_image'] = 'nullable|image|mimes:jpg,jpeg,png|max:2048';

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $request->all();

        // Handle file uploads to public/uploads and delete old files
        if ($request->hasFile('gold_image')) {
            if ($report->gold_image) {
                $oldPath = public_path(parse_url($report->gold_image, PHP_URL_PATH));
                if (file_exists($oldPath)) unlink($oldPath);
            }
            $file = $request->file('gold_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/gold'), $filename);
            $data['gold_image'] = url('uploads/gold/' . $filename);
        }

        if ($request->hasFile('silver_image')) {
            if ($report->silver_image) {
                $oldPath = public_path(parse_url($report->silver_image, PHP_URL_PATH));
                if (file_exists($oldPath)) unlink($oldPath);
            }
            $file = $request->file('silver_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/silver'), $filename);
            $data['silver_image'] = url('uploads/silver/' . $filename);
        }

        $report->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Report updated successfully!',
            'data'    => $report,
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $report = Report::find($id);

            if (!$report) {
                return response()->json([
                    'success' => false,
                    'message' => 'Report not found',
                ], 404);
            }

            // Delete uploaded files
            if ($report->gold_image) Storage::disk('public')->delete($report->gold_image);
            if ($report->silver_image) Storage::disk('public')->delete($report->silver_image);

            $report->delete();

            return response()->json([
                'success' => true,
                'message' => 'Report deleted successfully',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function status(Request $request)
    {
        try {
            $report = Report::find($request->id);

            if (!$report) {
                return response()->json([
                    'success' => false,
                    'message' => 'Report not found',
                ], 404);
            }

            $report->status = $request->status;
            $report->save();

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

    // Validation rules
    private function rules()
    {
        return [
            'date'                => 'required|date',
            'application_no'      => 'required|string|max:255',
            'name'                => 'required|string|max:255',
            'address'             => 'required|string|max:255',
            'phone'               => 'required|numeric|digits_between:1,11',
            'city'                => 'required|string|max:255',
            'gold_net_weight'     => 'required|numeric',
            'gold_loan_amount'    => 'required|numeric',
            'gold_image'          => 'nullable|string|max:255',
            'silver_net_weight'   => 'required|numeric',
            'silver_loan_amount'  => 'required|numeric',
            'silver_image'        => 'nullable|string|max:255',
            'total_loan_amount'   => 'required|numeric',
            'settelment_amount'   => 'nullable|numeric',
            'cash_payment'        => 'nullable|numeric',
            'online_payment'      => 'nullable|numeric',
        ];
    }

    /**
     * Generate PDF for a single report.
     * URL: /admin/report/pdf/{id}
     * Name: admin.report.pdf
     */
    public function pdf($id)
    {
        // 1️⃣ Get report or 404
        $report = Report::findOrFail($id);

        // 2️⃣ Load the Blade view and generate PDF
        // Passing as array: key 'data' → value $report
        $pdf = Pdf::loadView('admin.report.pdf', [
                'data' => $report,
            ])
            ->setPaper('a4', 'portrait');

        // 3️⃣ Return raw PDF so AJAX (blob) can handle it
        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf');
    }
}
