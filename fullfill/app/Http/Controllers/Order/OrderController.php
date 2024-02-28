<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;
use KS\PromptPay;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function order(Request $request, $id)
    {
        $product = Products::find($id);
        $result = DB::table('products_categories')
            ->join('products', 'products_categories.product_category', '=', 'products.product_category')
            ->where('products.id', $id)
            ->select('products.id', 'products.product_name', 'products.product_name_th', 'products.shop', 'products.product_category', 'products.product_price', 'products.product_img', 'products.product_detail', 'products_categories.cat_name')
            ->first();
        //        dd($request->all());
        $productPrice = $request->input('total_price');
        $productWeight = $request->input('weight');
        //        dd($productPrice);
        return view('fe.order', compact('product', 'productPrice', 'productWeight', 'result'));
    }
    public function store(Request $request)
    {
        // $product = Products::findOrFail($productId);
        
        // Validate the form data
        // $request->validate(
            //     [
                //         'customer_name' => 'required|string|max:255',
                //         'customer_email' => 'required|email|max:255',
                //         'phone' => 'required|string|max:20',
                //         'message' => 'nullable|string',
                //         'booking_date' => 'required|date',
                //         'booking_time' => 'required|string',
                //     ],
                //     [
                    //         'customer_name.required' => 'โปรดใส่ประเภทสินค้า',
                    //         'customer_email.required' => 'โปรดใส่ชื่อสินค้า',
                    //         'phone.required' => 'โปรดใส่รายละเอียดสินค้า',
                    //         'message.required' => 'โปรดใส่ราคาสินค้า',
                    //         'booking_date.required' => 'โปรดใส่ภาพสินค้า',
                    //         'booking_time.required' => 'โปรดใส่ภาพสินค้า',
                    //     ]
                    // );
                    
                    // Create a new order instance and fill it with form data
                    $order = new Order();
                    $order->product_id = $request->productId;
                    $order->customer_name = $request->input('customer_name');
                    $order->customer_email = $request->input('customer_email');
                    $order->phone = $request->input('phone_number');
                    $order->message = $request->input('message');
                    $order->booking_date = $request->input('booking_date');
                    $order->booking_time = $request->input('booking_time');
                    $order->product_name = $request->input('product_name');
                    $order->total_price = $request->input('total_price');
                    $order->quantity = $request->input('quantity');
                    $order->product_img = $request->input('product_img');
                    $order->shop = $request->input('product_shop');
                    
                    // Generate random order number and secret code
                    $order->order_number = 'ORD' . rand(1000, 9999); // Change the range as needed
                    $order->secret_code = strtoupper(substr(md5(uniqid()),
                    0,
                    6
                ));
        $totalPrice = $order->total_price;
        $phoneNumber = "0809439669";
        $pp = new PromptPay();
        $payload = $pp->generatePayload($phoneNumber, $totalPrice);
        // dd($payload);
        $request->session()->put('payload', $payload);
        $order->save();
        // return redirect()->route('fe.success')->with('success', 'Order placed successfully!');
        // return response()->json($order);
        return redirect()->route('order.payment', compact('order','payload'))->with('success', 'เพิ่มรายการสำเร็จ');
        // return view('',compact('order'));
    }

    // Method to show the order details
    public function showOrderDetails(Request $request)
    {
        $orderDetails = [
            'product_id' => $request->productId,
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'phone_number' => $request->input('phone_number'),
            'message' => $request->input('message'),
            'booking_date' => $request->input('booking_date'),
            'booking_time' => $request->input('booking_time'),
            'product_name' => $request->input('product_name'),
            'total_price' => $request->input('total_price'),
            'quantity' => $request->input('weight'),
            'product_img' => $request->input('product_img'),
            'shop' => $request->input('product_shop'),
        ];
        // dd($request->all(), $orderDetails);
        return view('order.detail', compact('orderDetails'));
    }

    public function payment(Request $request)
    {
        $orderId = $request->query('order');
        $order = Order::find($orderId);
        $payload = $request->session()->get('payload');
 
        // Check if the order exists
        if ($order) {
            // Return the order data (you can customize this part based on your needs)
            // return response()->json($order);
            // Alternatively, you can return the view with the order data
            return view('order.payment', compact('order','payload'));
        } else {
            // Return a response indicating that the order was not found
            return response()->json(['error' => 'Order not found'], 404);
            // Alternatively, you can redirect or display an error view
        }
    }
    public function detail(Request $request)
    {
        $orderId = $request->query('order');
        $order = Order::find($orderId);
        if ($order) {
            // Return the order data (you can customize this part based on your needs)
            // return response()->json($order);
            // Alternatively, you can return the view with the order data
            return view('order.payment', compact('order'));
        } else {
            // Return a response indicating that the order was not found
            return response()->json(['error' => 'Order not found'], 404);
            // Alternatively, you can redirect or display an error view
        }
    }
    public function verify()
    {
        if (Auth::check()) {
            return redirect()->route('fe.success');
        } else {
            return view('fe.toorder');
        }
    }
    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        
        // Create a new payment record
        $payment = new Payment($request->only(['status', 'payment_status']));
        // Include payment_time in the request data
        $payment->payment_time = $request->input('payment_time');
        // Save the payment related to the order
        $order->payment()->save($payment);
        // Handle file upload for transfer receipt image
        if ($request->hasFile('transfer_receipt_img')) {
            $image = $request->file('transfer_receipt_img');
            $imageName = 'recpt-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $payment->transfer_receipt_img = $imageName;
            $payment->save();
        }
        $name = $request->input('customer_name');
        $email = $request->input('customer_email');
        // Additional logic...
        // dd($name);
        // return response()->json($name);
        return redirect()->route('fe.success', compact('name', 'email'))->with('success', 'Payment processed successfully!');
    }
    public function success(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        // Check if the user is logged in
        if (Auth::check()) {
            // If the user is logged in, retrieve orders associated with the logged-in user
            $user = Auth::user();
            $name = $user->name;
            $email = $user->email;

            $orders = Order::where('customer_name', $name)
                ->where('customer_email', $email)
                ->with('payment')
                ->orderBy('id', 'desc')
                ->get();

            return view('fe.success', compact('orders', 'name'));
        } elseif (!empty($name) && !empty($email)) {
            // Check if the name exists but the email does not match any records in the orders
            $existingNameCount = Order::where('customer_name', $name)->count();
            $matchingEmailCount = Order::where('customer_name', $name)
                ->where('customer_email', $email)
                ->count();

            if ($existingNameCount > 0 && $matchingEmailCount == 0) {
                // Name exists but the email doesn't match any records
                return redirect()->route('fe.toorder')->with('error', 'ข้อมูลไม่ถูกต้อง');
            }

            $orders = Order::where('customer_name', $name)
                ->where('customer_email', $email)
                ->with('payment')
                ->orderBy('id', 'desc')
                ->get();

            return view('fe.success', compact('orders', 'name'));
        } else {
            // Redirect to the appropriate page since neither logged in nor provided name and email
            return redirect()->route('login.index')->with('error', 'You need to provide name and email to access this page');
        }
    }

//     public function success(Request $request)
//     {
//         $name = $request->input('name');
//         $email = $request->input('email');

//         // Retrieve orders based on provided data
//         $orders = Order::with('payment')
//         ->where('customer_name', $name)
//             ->where('customer_email', $email)
//             ->orderBy('id', 'desc')
//             ->get();
// dd($orders);
//         // $orders = Order::with('payment')->get();
//         // $orders = Order::with('payment')->orderBy('id', 'desc')->get();
//         return view('fe.success', compact('orders'));
//     }
}
