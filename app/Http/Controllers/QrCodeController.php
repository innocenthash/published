<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QrCodeGenerate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generate_qrcode(){

        $myqrcodes = QrCodeGenerate::where('user_id',Auth::user()->id)->get() ;
//   $qr = '' ;
//         foreach ($myqrcodes as $myqrcode) {
//             $qr=$myqrcode->content;
//         }

//         $qrcode = QrCode::size(400)->generate($qr);

        return view('QrCode.qrcode')->with('myqrcodes',$myqrcodes) ;


    }

    public function qrcode_formulaire(){


        return view('QrCode.qrcode_formulaire');
    }

    public function save_qrcode(Request $request){

        $qrcode = new QrCodeGenerate() ;
        $qrcode->content = $request->input('qrcode');
        $qrcode->user_id = Auth::user()->id;
        $qrcode->save() ;

        $texteQRCode = $request->input('qrcode');

    // Génération du QR code
    $qrCode = QrCode::format('png')->size(400)->generate($texteQRCode);

    // Génération du nom de fichier unique pour l'image du QR code
    $nomFichier = 'qrcode-' . uniqid() . '.png';

    // Sauvegarde du QR code en tant qu'image
    $qrpath = public_path('qrimages/' . $nomFichier);
    file_put_contents($qrpath, $qrCode);

    // Télécharger le fichier avec un nom personnalisé
    if (file_exists($qrpath)) {
        return Response::download($qrpath, 'mon-qr-code.png');
    } else {
        return response()->json(['error' => 'QR code non trouvé'], 404);
    }


        return redirect('/qrcode_formulaire') ;
    }
}
