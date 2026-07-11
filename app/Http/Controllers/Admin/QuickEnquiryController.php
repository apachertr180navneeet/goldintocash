<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\QuickEnquiry;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class QuickEnquiryController extends Controller
{
    public function index()
    {
        return view('admin.quickEnquiry.index');
    }

    public function getall(Request $request){
        $query = QuickEnquiry::orderBy('id','desc');
        
        if (Auth::user() && Auth::user()->role == 'user') {
            $query->whereDate('created_at', Carbon::today());
        }
        
        $enquiries = $query->get();
        return response()->json(['data' => $enquiries]);
    }

    public function destroy($id)
    {
        try{
            QuickEnquiry::where('id',$id)->delete();
            return response()->json([
                'success' => 'success',
                'message' => 'deleted successfully',
            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
