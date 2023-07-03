<div>
    <form wire:submit.prevent="save_qrcode" method="post">
        @csrf
        <div class="form-group">



          <input type="text" class="form-control ring-0 ring-slate-600 focus:ring-slate-600 focus:ring-0 border-gray-300  border-2 rounded-md "   wire:keydown.enter.prevent='save_qrcode' wire:model="qrcode" placeholder="" required >
        </div>


        <button type="submit" class="btn shadow-2xl focus:ring-0 text-xl font-extrabold bg-gradient-to-r from-pink-500 to-yellow-500 form-control text-white">Ajouter un qrcode </button>
      </form>
</div>
