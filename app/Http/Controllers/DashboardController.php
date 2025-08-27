<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function dashboardPage(){
        return view('pages.dashboard.dashboard-page');
    }


//API routes
 

    //Summary function
    public function summary(Request $request){
        $user_id = $request->header('user_id');
        $product = Product::where('user_id', $user_id)->count();
        $category = Category::where('user_id', $user_id)->count();
        $customer = Customer::where('user_id', $user_id)->count();
        $invoice = Invoice::where('user_id', $user_id)->count();
        // $total = Invoice::where('user_id', $user_id)->sum('total');
        // $vat =  Invoice::where('user_id', $user_id)->sum('vat');
        // $payable = Invoice::where('user_id', $user_id)->sum('payable');

        $invoiceSummary = Invoice::where('user_id', $user_id)
        ->selectRaw('SUM(total) as total, SUM(vat) as vat, SUM(payable) as payable')->first();

        return response()->json([
            'status' => 'success',
            'data' => [
                'product' =>$product,
                'category'=>$category,
                'customer'=>$customer,
                'invoice'=>$invoice,
                // 'total'=>$total,
                // 'vat'=>$vat,
                // 'payable'=>$payable
                'total' => $invoiceSummary->total ?? 0,
                'vat' => $invoiceSummary->vat ?? 0,
                'payable' => $invoiceSummary->payable ?? 0,
            ]
        ], 200);
    }
}