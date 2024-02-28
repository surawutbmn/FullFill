<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;
use App\Models\Products_cat;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Stripe;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('sort');
        $search = $request->input('search');
        $products = Products::query();
        $result = DB::table('products_categories')
            ->join('products', 'products_categories.product_category', '=', 'products.product_category')
            ->select('products.id', 'products.product_name', 'products.product_category', 'products_categories.cat_name', 'products.product_price', 'products.product_img', 'products.product_detail')
            ->get();
        //        dd($result);

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
        // $products = $products->get();
        $productsQuery = Products::query();
        $products = $productsQuery->paginate(24);
        return view('fe.product', compact('products', 'result'));
    }
    public function detail($id)
    {
        $result = DB::table('products_categories')
            ->join('products', 'products_categories.product_category', '=', 'products.product_category')
            ->where('products.id', $id)
            ->select('products.id', 'products.product_name', 'products.product_name_th', 'products.shop', 'products.product_category', 'products.product_price', 'products.product_img', 'products.product_detail', 'products_categories.cat_name')
            ->first(); // Use first() to retrieve a single result
        $product = Products::find($id);
        $randomProducts = Products::inRandomOrder()
            ->join('products_categories', 'products.product_category', '=', 'products_categories.product_category')
            ->where('products.id', '!=', $id)
            ->select('products.id', 'products.product_name', 'products.product_name_th', 'products.shop', 'products.product_category', 'products.product_price', 'products.product_img', 'products.product_detail', 'products_categories.cat_name')
            ->limit(8)
            ->get();

        // return response()->json($randomProducts);
        //        session(['productPrice' => $product->product_price]);
        return view('fe.detail', compact('product', 'result', 'randomProducts'));
    }

    public function payment()
    {
        return view('order.payment1');
    }
    public function paymentPost(Request $request)
    {
        $productPrice = session('productPrice');
        //        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $token = $request->stripeToken;

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create([
                "amount" => $productPrice,
                "currency" => "bath",
                "source" => $token,
                "description" => "Test payment"
            ]);

            session()->flash('success', 'Payment successful!');
        } catch (\Exception $e) {
            session()->flash('error', 'Payment failed: ' . $e->getMessage());
        }
        return view('fe.success');
    }
    public function rsvsuccess(Request $request)
    {
        $booking_date = $request->input('booking_date');
        $productPrice = $request->input('total_price');
        $productWeight = $request->input('weight');
        $productName = $request->input('productName');
        $catName = $request->input('catName');
        return view('fe.success', compact('booking_date', 'productPrice', 'productWeight', 'productName', 'catName'));
    }
    public function homepage()
    {
        return view('fe.homepage');
    }
    public function shop()
    {
        $shop = Shop::get();
        // dd($shop);
        return view('fe.shop', ['shops' => $shop]);
    }
    public function news()
    {
        return view('fe.news');
    }
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}
