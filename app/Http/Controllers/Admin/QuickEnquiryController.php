<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\QuickEnquiry;
use Exception;

class QuickEnquiryController extends Controller
{
    public function index()
    {
        return view('admin.quickEnquiry.index');
    }

    public function getall(Request $request){
        $enquiries = QuickEnquiry::orderBy('id','desc')->get();
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
