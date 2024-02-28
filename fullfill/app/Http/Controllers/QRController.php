<?php

// app/Http/Controllers/QRController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KS\PromptPay;
use App\Models\Shop;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Renderer\Image\Png;

class QRController extends Controller
{
    public function index()
    {
        return view('fe.qr');
    }

    public function generate(Request $request)
    {
        $phoneNumber = $request->input('phoneNumber');
        $amount = $request->input('amount');

        $pp = new PromptPay();
        $payload = $pp->generatePayload($phoneNumber, $amount);
        // dd($payload);
        // $saveDirectory = public_path('uploads/');
        // $savePath = $saveDirectory . 'qrcode.png';
        // $pp->generateQrCode($savePath, $phoneNumber, $amount);
        return view('fe.show')->with('payload', $payload);

    }

    public function showImage(Request $request)
    {
        $payload = $request->input('payload');
        // return view('fe.show', ['path' => $path]);
        return view('fe.show')->with('payload', $payload);
    }
    public function map()
    {
        return view('seller.map');
    }
}
