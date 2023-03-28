<?php

namespace Botble\Api\Http\Controllers;
use ApiHelper;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function products_by_category($categoryId){
        return Product::where('category','LIKE',"%{$categoryId}%",)->paginate(20);
    }

    public function products_by_name($name){
        return Product::where('name','LIKE',"%{$name}%",)->paginate(20);
    }
    
    public function product_details($productId){
        return Product::where('name','LIKE',"%{$productId}%",)->get();
    }

    public function top_products(){
        return Product::all();
    }

    public function get_bookings($name){
        return Booking::where('name','LIKE',"%{$name}%",)->get();
    }

    public function get_booking_by_id($id){
        return Booking::where('id','LIKE',"%{$id}%",)->get();
    }

    public function search_product($search_query){
        return Product::where('name','LIKE',"%{$search_query}%",)->paginate(20);
    }

    public function update_contact($id){
        $user = User::where('id', $id)->first();
        $user->contact = request("contact");
        $user->update();

        return response([
            'message' => 'contact update successfully'
        ], 200);
    }

    public function update_name($id){
        $user = User::where('id', $id)->first();
        $user->name = request("name");
        $user->update();

        return response([
            'message' => 'name update successfully'
        ], 200);
    }

    public function update_email($id){
        $user = User::where('id', $id)->first();
        $user->email = request("email");
        $user->update();

        return response([
            'message' => 'email update successfully'
        ], 200);
    }

    public function update_password($id){

        $user = User::where('id', $id)->first();

        if(!$user || !Hash::check(request("old_password"), $user->password)){
            return response([
                'message' => 'Wrong old password'
            ], 404);
        }

        $user->password = Hash::make(request("new_password"));

        $user->update();

        return response([
            'message' => 'password update successfully'
        ], 200);

    }

    public function store_booking(){
        if(
            Booking::create([
            'name' => request('name'),
            'booked_house' => request('booked_house'),
            'appointment_date' => request('appointment_date'),
            'price' => request('price'),
            'contact' => request('contact'),
            'is_paid' => request('is_paid'),
            'is_approved' => request('is_approved')])){

            return [
                "message" => "success" 
            ];
        } else {
            return [
                "message" => "not successful" 
            ];
        }
    }
}
