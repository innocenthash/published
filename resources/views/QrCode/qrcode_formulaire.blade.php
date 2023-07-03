 @extends('layouts.app_annoceurs')

 @section('title')
    formulaire|qrcode
 @endsection

 @section('qrcode_form')
           <div class="row mx-auto">

                <div class="col-12  flex justify-center mt-12 ">
                    <div class="">
                     <div class="card w-96 shadow-md ">
                         <div class="card-header  text-center font-extrabold text-xl"> <i class="text-first fas fa-qrcode"></i> QrCode Generate</div>
                         <div class="card-body">
                            <livewire:livewire-qr-code/>
                         </div>

                       </div>

               </div>
            </div>
           </div>
 @endsection
