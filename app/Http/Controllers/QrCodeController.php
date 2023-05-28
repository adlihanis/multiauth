<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class QrCodeController extends Controller
{
    public function generateQrCode()
    {
        $url = URL::to('/destination-page');
        $qrCode = QrCode::generate($url);
        
        $filename = Str::random(10) . '.svg';
        Storage::disk('public')->put($filename, $qrCode);

        return view('qr_code', compact('qrCode', 'url', 'filename'));
    }
}
