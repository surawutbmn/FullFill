<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Products;
use App\Models\Products_cat;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function show($id)
    {
        $shop = Shop::find($id); // Assuming you have the shop ID
        return view('seller.shop', ['shop' => $shop]);
    }
    public function
    pdshow(Request $request)
    {
        //        dd(Hash::make('1234'));
        $category = $request->get('sort');
        $search = $request->input('search');
        $product_cat = DB::table('products')
        ->join('products_categories', 'products.product_category', '=', 'products_categories.product_category')
        ->select('products.id', 'products.product_name', 'products.product_category', 'products_categories.cat_name', 'products.product_price', 'products.product_img', 'products.product_detail')
        ->get();
        $products = Products::query();
        $categories = Products_cat::all();
        if ($search) {
            $products->where('product_category', 'like', "%$search%")
            ->orWhere('product_name', 'like', "%$search%")
            ->orWhere('product_price', 'like', "%$search%");
        }
        if ($category === 'All') {
        } elseif ($category === 'Food') {
            $products->where(function ($query) {
                $query->where('product_category', '101')
                ->orWhere('product_category', '102');
            });
        } elseif ($category === 'Detergent') {
            $products->whereNotIn('product_category', ['101', '102']);
        }
        $products = $products->paginate(10);

        //        dd($result);
        return (view('seller.product', compact('products', 'categories', 'product_cat')));
    }
    public function orderManage()
    {
        $user = auth()->user();
        $orders = Order::with('payment')->orderBy('id', 'desc')->get();
        $shop = Shop::where('id', $user->id)->first();

        return view('seller.order', compact('orders','shop'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'location' => 'required',
        //     // Add validation rules for other fields
        // ]);
        $imageName = 'shop_logo-' . time() . '.jpg';
        $imagePath = public_path('uploads') . '/' . $imageName;
        $logoImg = time() . '_' . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('uploads'), $logoImg);
        file_put_contents($imagePath, $logoImg);
        // dd('Image Path: ' . $imagePath);
        // $logoPath = $request->file('logo')->store('logos', 'public');
        // Create a new shop instance
        $shop = new Shop();
        $shop->name = $request->input('shop_name');
        $shop->shop_type = $request->input('shop_type');
        $shop->promptpay = $request->input('promptpay');
        $shop->location = $request->input('location');
        $shop->acount_name = $request->input('acount_name');
        $shop->image = $logoImg;
        // Assign the seller ID to the shop
        $shop->user_id = auth()->id(); // Assuming you're using Laravel's authentication
        // dd($request->all(),$imagePath);
// dd($shop);
        // Save the shop to the database
        $shop->save();
        $workTimes = [];
        foreach ($request->input('work_days') as $day) {
            $workTimes[$day] = [
                'opening_time' => $request->input('opening_times')[$day],
                'closing_time' => $request->input('closing_times')[$day]
            ];
        }
        $shop->work_time = $workTimes;
        $shop->save();
        // dd($shop);
        // Redirect back or show a success message
        return redirect()->route('shops.detail', ['id' => $shop->id])->with('success', 'Shop created successfully!');
    } // Make sure to import the Shop model

    // public function create()
    // {
    //     return view('seller.create');
    // }
    public function createShop()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        if ($user) {
            // Retrieve the shop associated with the user
            $shop = Shop::where('id', $user->id)->first();

            if ($shop) {
                // If the user has a shop, redirect to the detail page
                return redirect()->route('shops.detail', ['id' => $shop->id]);
            } else {
                // If the user does not have a shop, show a message or redirect to create shop page
                return view('seller.create');
            }
        } else {
            // Handle the case when the user is not logged in
            return redirect()->route('login.index')->with('error', 'Please log in to view your shop.');
        }
        // If the user doesn't have a shop, continue with creating a new shop
        // return view('seller.create');
    }

}
