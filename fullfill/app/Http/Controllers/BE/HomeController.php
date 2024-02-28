<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Products_cat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Qoutes;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
//        dd(Hash::make('1234'));
        $category = $request->get('sort');
        $search = $request->input('search');
        $product_cat = DB::table('products')
            ->join('products_categories','products.product_category','=','products_categories.product_category')
            ->select('products.id','products.product_name', 'products.product_category', 'products_categories.cat_name', 'products.product_price', 'products.product_img', 'products.product_detail')
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
            $products->where(function($query) {
                $query->where('product_category', '101')
                    ->orWhere('product_category', '102');
            });
        }elseif ($category === 'Detergent') {
            $products->whereNotIn('product_category', ['101', '102']);
        }
        $products = $products->paginate(10);

//        dd($result);
        return(view('be.home', compact('products','categories','product_cat')));
    }
    public function create(){
        return view('be.create');
    }
    public function store(Request $request){
        $request->validate(
            [
                'product_category'=>'required',
                'product_name'=>'required',
                'product_name_th'=>'required',
                'product_detail'=>'required',
                'product_price'=>'required',
                'product_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size and allowed file types as needed
            ],
            [
                'product_category.required' => 'โปรดใส่ประเภทสินค้า',
                'product_name.required' => 'โปรดใส่ชื่อสินค้าภาษาอังกฤษ',
                'product_name_th.required' => 'โปรดใส่ชื่อสินค้าภาษาไทย',
                'product_detail.required' => 'โปรดใส่รายละเอียดสินค้า',
                'product_price.required' => 'โปรดใส่ราคาสินค้า',
                'product_img.required' => 'โปรดใส่ภาพสินค้า',
                'product_img.image' => 'โปรดอัปโหลดภาพ',
                'product_img.mimes' => 'โปรดอัปโหลดไฟล์รูปภาพเป็น jpeg, png, jpg หรือ gif เท่านั้น',
                'product_img.max' => 'ขนาดไฟล์ภาพต้องไม่เกิน 2 MB',
            ]);
        // $productImg = time().'_'.$request->file('product_img')->getClientOriginalName();
        // $request->file('product_img')->move(public_path('uploads'),$productImg);
        //        dd('Image Path: ' . $imagePath);
        $croppedImageData = $request->input('cropped_image_data');
        $croppedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData));
        $imageName = 'prd_img_' . time() . '.jpg';
        $imagePath = public_path('uploads') . '/' . $imageName;
        file_put_contents($imagePath, $croppedImage);

        $products = new Products;
        $products->product_img = $imageName;
        $products->product_category = $request->input('product_category');
        $products->product_name = $request->input('product_name');
        $products->product_name_th = $request->input('product_name_th');
        $products->product_detail = $request->input('product_detail');
        $products->product_price = $request->input('product_price');
        $products->shop = $request->input('shop');
        // $products->product_img = $productImg;
//        $qoutes->date = date('Y', strtotime($request->input('date')));
        $products->save();

        return redirect()->route('be.home.index')->with('success','เพิ่มรายการสำเร็จ');
    }
    public function edit($id){
        $product = Products::find($id);
        return view('be.edit',compact('product'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_category' => 'required',
            'product_name' => 'required',
            'product_detail' => 'required',
            'product_price' => 'required',
        ], [
            'product_category.required' => 'โปรดใส่ประเภทสินค้า',
            'product_name.required' => 'โปรดใส่ชื่อสินค้า',
            'product_detail.required' => 'โปรดใส่รายละเอียดสินค้า',
            'product_price.required' => 'โปรดใส่ราคาสินค้า',
            'product_img.required' => 'โปรดใส่ภาพสินค้า',
            'product_img.image' => 'โปรดอัปโหลดภาพ',
            'product_img.mimes' => 'โปรดอัปโหลดไฟล์รูปภาพเป็น jpeg, png, jpg หรือ gif เท่านั้น',
            'product_img.max' => 'ขนาดไฟล์ภาพต้องไม่เกิน 2 MB',
        ]);
        DB::enableQueryLog();
        $product = Products::find($id);

        if ($product) {
            $dataToUpdate = [
                'product_category' => $request->input('product_category'),
                'product_name' => $request->input('product_name'),
                'product_detail' => $request->input('product_detail'),
                'product_price' => $request->input('product_price'),
            ];
            // Check if an image is uploaded
            // if ($request->has('product_img')) {
            //     $productImg = time() . '_' . $request->file('product_img')->getClientOriginalName();
            //     $request->file('product_img')->move(public_path('uploads'), $productImg);

            //     // If an image is uploaded, update the 'product_img' column
            //     $dataToUpdate['product_img'] = $productImg;
            // }
            $croppedImageData = $request->input('cropped_image_data');
            if ($croppedImageData) {
                $croppedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData));
                $imageName = 'prd_img_' . time() . '.jpg';
                $imagePath = public_path('uploads') . '/' . $imageName;
                file_put_contents($imagePath, $croppedImage);
                $product->product_img = $imageName;
            }
            // Update the product
            $product->update($dataToUpdate);

            // return response()->json("$product");
            return redirect()->route('be.home.index')->with('update', 'อัพเดตรายการแล้ว');
        }

        // Handle the case where the product with the given ID is not found
        return redirect()->route('be.home.index')->with('error', 'ไม่พบสินค้าที่ต้องการอัพเดต');
    }

//    public function  update(Request $request,$id){
//        $request->validate(
//            [
//                'product_category'=>'required',
//                'product_name'=>'required',
//                'product_detail'=>'required',
//                'product_price'=>'required',
//            ],
//            [
//                'product_category.required' => 'โปรดใส่ประเภทสินค้า',
//                'product_name.required' => 'โปรดใส่ชื่อสินค้า',
//                'product_detail.required' => 'โปรดใส่รายละเอียดสินค้า',
//                'product_price.required' => 'โปรดใส่ราคาสินค้า',
//            ]);
//        if ($request->has('product_img')) {
//            $productImg = $request->file('product_img');
//            $imagePath = $productImg->store('uploads', 'public');
//        }
//        Products::find($id)->update(
//            [
//                'product_category' => $request->input('product_category'),
//                'product_name' => $request->input('product_name'),
//                'product_detail' => $request->input('product_detail'),
//                'product_price' => $request->input('product_price'),
//                'product_img' => $imagePath,
//                if($request->has('product_img')){
//                    'product_img' => $imagePath;
//                }
//            ]);
//        return redirect()->route('be.home.index')->with('update','อัพเดตรายการแล้ว');
//    }
    public function delete($id){
        Products::find($id)->delete();
        return redirect()->route('be.home.index')->with('failed','ลบรายการแล้ว');
    }
    // public function seller(){
    //     return view('seller.create');
    // }
    public function order(Request $request)
    {
        $orders = Order::with('payment')->orderBy('id', 'desc')->get();

        return (view('be.order', compact('orders')));
    }
    public function orderDetail(Request $request)
    {
        $orders = Order::with('payment')->orderBy('id', 'desc')->get();

        return (view('order.detail', compact('orders')));
    }

}
