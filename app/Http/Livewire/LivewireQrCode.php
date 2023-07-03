<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\QrCodeGenerate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LivewireQrCode extends Component


{
    protected $listeners = ["sent"=>'$refresh'] ;

    public $qrcode;
    public function save_qrcode(){

        $qrcode = new QrCodeGenerate() ;
        $qrcode->content = $this->qrcode;
        $qrcode->user_id = Auth::user()->id;
        $qrcode->save() ;

        $texteQRCode =$this->qrcode;

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
        $this->reset('qrcode');
        $this->emit('sent') ;
    } else {
        return response()->json(['error' => 'QR code non trouvé'], 404);
    }


        // return redirect('/qrcode_formulaire') ;
    }
    public function render()
    {
        return view('livewire.livewire-qr-code');
    }
}
