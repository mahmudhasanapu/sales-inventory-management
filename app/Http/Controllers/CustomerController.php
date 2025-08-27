<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function customerPage(){
        return view('pages.dashboard.customer-page');
    }




    public function CustomerCreate(Request $request){
         $user_id = $request->header('user_id');
        try{

            $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:customers,email',
            'mobile'  => 'required|string|max:20|unique:customers,mobile',
        ]);
        

        $customer = Customer::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'mobile'  => $validated['mobile'],
            'user_id' => $user_id
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Customer created successfully'
            //'data'    => $customer
        ]);


        } catch(\Throwable $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Unable to create customer'
            ]);
        }
    }

    public function CustomerList(Request $request){
        try{
             $user_id = $request->header('user_id');
             if (!$user_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'User ID is missing'
                ]);
            }
            $customers = Customer::where('user_id', $user_id)->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Customer list fetched successfully',
                'data' => $customers
            ]);
        }catch (\Throwable $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unable to fetch customer list',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function CustomerDelete(Request $request){
        try{
            $user_id = $request->header('user_id');
            if (!$user_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'User ID is missing'
                ]);
            }
            $customer_id = $request->input('id');
            if (!$customer_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'Customer ID is missing'
                ]);
            }

            $Customer=Customer::where('id', $customer_id)->where('user_id', $user_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Customer Delete successfully',
            
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unable Delete customer',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function CustomerById(Request $request){
        try{
            $user_id = $request->header('user_id');
            if (!$user_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'User ID is missing'
                ]);
            }
            $customer_id = $request->input('id');
            if (!$customer_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'Customer ID is missing'
                ]);
            }

            $Customer=Customer::where('id', $customer_id)->where('user_id', $user_id)->first();
            if (!$Customer) {
                return response()->json([
                'status' => 'failed',
                'message' => 'Customer not found'
            ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'CustomerById fetch successfully',
                'data' => $Customer
            
            ]);

            } catch (\Throwable $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unable to fetch customerById',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function CustomerUpdate(Request $request){

        try {
            $user_id = $request->header('user_id');
            if (!$user_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'User ID is missing'
                ]);
            }
            $customer_id = $request->input('id');
            if (!$customer_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'customer_id is missing'
                ]);
            }
            $customer = Customer::where('id', $customer_id) ->where('user_id', $user_id)->first();
            if (!$customer) {
                return response()->json([
                'status' => 'failed',
                'message' => 'Customer not found'
            ]);
            }
             $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email'  => 'sometimes|email|unique:customers,email,' . $customer_id,
            'mobile' => 'sometimes|string|max:20|unique:customers,mobile,' . $customer_id,
            ]);
            $customer->update($validated);  
            return response()->json([
                'status'  => 'success',
                'message' => 'Customer updated successfully',
                'data'    => $customer
            ]);


            return response()->json([
                'status' => 'success',
                'message' => 'Customer updated successfully',
                'data' => $customer
            
            ]);

            } catch (\Throwable $e) {
                return response()->json([
                'status'  => 'failed',
                'message' => 'Unable to update customer',
                'error'   => $e->getMessage()
            ]);
        }
    }
}



