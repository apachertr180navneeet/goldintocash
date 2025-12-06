<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\{
    GoldLoan,
    Branch,
    BranchUser
};
use Validator, Exception;

use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class HomeController extends Controller
{
    public function index()
    {
        return view('web.home.index');
    }


    public function about()
    {
        return view('web.home.about');
    }

    public function services()
    {
        return view('web.home.services');
    }


    public function gallery()
    {
        return view('web.home.gallery');
    }

    public function quickEnquiry()
    {
        return view('web.home.quick-enquiry');
    }


    public function contact()
    {
        $branches = Branch::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('web.home.contact', compact('branches'));
    }


    public function application()
    {
        return view('web.home.application');
    }


    public function applicationPost(Request $request)
    {
        try {
            // ✅ Step 1: Validation rules
            $rules = [
                'bank_branch' => 'required|string|max:255',
                'bank_account_number' => 'required|string|max:255',
                'addhar_card_number' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'gold_net_weight' => 'required|numeric',
                'mobile_no' => 'required',
                'family_mobile_no' => 'nullable',
                'gold_loan_amount' => 'required|numeric',
                'gold_loan_slip' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'aadhar_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'pan_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            ];

            // ✅ Step 2: Validate input
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors'  => $validator->errors(),
                ], 422);
            }

            $data = $request->all();

            // ✅ Step 3: Handle file uploads safely
            if ($request->hasFile('gold_loan_slip')) {
                $file = $request->file('gold_loan_slip');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/gold_loan'), $filename);
                $data['gold_loan_slip'] = url('uploads/gold_loan/' . $filename);
            }

            if ($request->hasFile('aadhar_card')) {
                $file = $request->file('aadhar_card');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/aadhar'), $filename);
                $data['aadhar_card'] = url('uploads/aadhar/' . $filename);
            }

            if ($request->hasFile('pan_card')) {
                $file = $request->file('pan_card');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pan'), $filename);
                $data['pan_card'] = url('uploads/pan/' . $filename);
            }

            // ✅ Step 4: Format date & set default status
            $data['date'] = Carbon::now()->format('d-m-Y');
            $data['status'] = $request->status ?? 'pending';


            // ✅ Step 5: Create new record
            $goldLoan = GoldLoan::create($data);

            // ✅ Step 6: Redirect on success
            return redirect()->route('application')->with('success', 'Application submitted successfully!');
        } 
        catch (\Illuminate\Database\QueryException $e) {
            // ⚠️ Database error (e.g., SQL issue)
            return back()->with('error', 'Database error: ' . $e->getMessage());
        } 
        catch (\Illuminate\Validation\ValidationException $e) {
            // ⚠️ Validation error caught explicitly
            return back()->withErrors($e->validator)->withInput();
        } 
        catch (\Exception $e) {
            // ⚠️ General error (e.g., file move, unexpected failure)
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function contactPost(Request $request)
    {
        try {
            // ✅ Step 1: Validation rules
            $rules = [
                'name'    => 'required|string|max:255',
                'email'   => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ];

            // ✅ Step 2: Validate input
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $data = $request->only(['name', 'email', 'subject', 'message']);

            // ✅ Step 3: Send email to admin
            Mail::to('info@abhushanintocash.com')->send(new ContactMail($data));

            // ✅ Step 4: Redirect on success
            return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function quickEnquiryPost(Request $request)
    {
        try {

            // 1️⃣ Validate request data
            $request->validate([
                'name'   => 'required|string|max:100',
                'phone'  => 'required|digits:10',
                'city'   => 'required|string|max:100',
                'gold_net_weight' => 'nullable',
                'gold_loan_amount' => 'nullable',
            ]);

            // 2️⃣ Prepare SMS message
            $message = "Quick Enquiry\n"
                    . "Name: {$request->name}\n"
                    . "Phone: {$request->phone}\n"
                    . "City: {$request->city}\n"
                    . "Gold Weight: {$request->gold_net_weight}g\n"
                    . "Loan Amount: ₹{$request->gold_loan_amount}";

            // 3️⃣ Send SMS using CURL

            $authKey = "SYSPOLYSALES";  // your auth key
            $mobileNumber = "91{$request->phone}"; // single or comma separated

            $url = "https://wywspl.com/sendMessage.php";

            $postData = [
                'AUTH_KEY' => $authKey,
                'phone' => $mobileNumber,
                'message' => $message
            ];

            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
            ]);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $output = curl_exec($ch);

            if(curl_errno($ch)){
                return back()->with('error', 'SMS sending failed: ' . curl_error($ch));
            }

            curl_close($ch);


            // 4️⃣ Response Message
            return back()->with('success', 'Your enquiry has been submitted & SMS sent successfully!');


        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}
