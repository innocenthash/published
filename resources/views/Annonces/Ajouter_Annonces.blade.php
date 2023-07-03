@extends('layouts.app_annoceurs')

@section('title')
       mes annonces
@endsection

@section('ajouter_annonces')




<form action="{{url('/save_annonce')}}" method="post"  enctype="multipart/form-data">
    @csrf
<div class="row">

    <div class="col-12 col-sm-6 col-md-4 ">
        <div class="card shadow-md rounded-md ">
            <div class="card-header bg-gradient-to-r from-pink-500 to-yellow-500  text-center text-xl font-extrabold text-white  ">Mes fichiers</div>
            <div class="card-body flex-col items-center justify-center ">

                <div class="relative ml-24 mt-12 sm:w-1/2 border-dashed border-4 w-60 h-60 inline-flex items-center justify-center">
                    <input type="file" class="hidden" id= "file-input" name="images[]" multiple>
                    <button id="button-file" class=" text-gray-300  focus:outline-none font-bold py-2 px-4 rounded ">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mx-auto  w-12 h-12 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                      </svg>
                      <span class="text-gray-300">Choisir vos images</span>
                    </button>
                  </div>

                  <div id="gallery" class="mx-2 mt-2" >



                  </div>


            </div>
            {{-- <div class="card-footer">Footer</div> --}}
          </div>
    </div>
    <div class="col-12 col-sm-6 col-md-8 ">
        <div class="card shadow-md hover:shadow-xl ">
            <div class="card-header bg-gradient-to-r from-pink-500 to-yellow-500 ">

                <div class="row">
                    <div class="col-12 text-xl font-extrabold text-white">
                        {{-- bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500 --}}
                        <p class=" text-center ">
                            Publication
                          </p>
                       </div>
                        <div class="col-12 col-sm-12">
                         @if (count($errors)>0)
                         <div class="alert alert-danger alert-dismissible text-center">
                             <span  class="close" data-dismiss="alert">&times;</span>
                             @foreach ($errors->all() as $error)
                                  <p>{{$error}}</p>
                             @endforeach
                           </div>
                         @endif
                        </div>

                </div>

            </div>
            <div class="card-body w-full sm:w-1/2 mx-auto">
                <div class="form-group">
                    <label for="offres">Offres:</label>
                    <input type="text" class="form-control focus:ring-0  focus:outline-none border  rounded-md" name="offres" style="outline: none !important" id="offres">
                </div>

                <div class="form-group">
                  {!! Form::label('categorie', 'Categorie') !!}
                  {!! Form::select('name_categorie', $categorie, null, ['placeholder'=>'selectionner la categorie','class'=>'form-control focus:ring-0']) !!}

               </div>

                  <cleardiv class="form-group">
                     <label for="">Tarif:</label>
                     <input type="number" class="form-control focus:ring-0  focus:outline-none border  rounded-md" name="tarif">
                  </cleardiv>

                  <div class="form-group">
                      <label for="">Lieu:</label>
                      <input type="text" class="form-control focus:ring-0  focus:outline-none border  rounded-md" name="lieu">
                   </div>

                  <div class="form-group">
                      <label for="comment">Description:</label>
                      <textarea class="focus:ring-gray-200 focus:ring-0 focus:bg-gray-300   form-control focus:outline-none focus:border-gray-100" rows="3" name="description" id="comment"></textarea>
                  </div>


                  <button type="submit" class="btn shadow-2xl focus:ring-0 text-xl font-extrabold form-control bg-gradient-to-r from-pink-500 to-yellow-500 hover:bg-teal-700 text-white rounded-md ">Partager</button>
            </div>
            {{-- <div class="card-footer">Footer</div> --}}
          </div>
    </div>

</div>
</form>




@endsection

@section('ajouter_annonce_js')
<script >

const inputElement = document.getElementById('file-input');
const buttonElement = document.getElementById('button-file');

buttonElement.addEventListener('click', (e) => {
    e.preventDefault();
  inputElement.click();
});

 const fileInput = document.getElementById("file-input");
const gallery = document.getElementById("gallery");

fileInput.addEventListener("change", (event) => {
    event.preventDefault();
  const files = event.target.files;
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const reader = new FileReader();
    reader.onload = event => {
      const img = document.createElement("img");
      img.className = "object-cover";
      img.src = event.target.result;
      gallery.appendChild(img);
    };
    reader.readAsDataURL(file);
  }
});

</script>
@endsection
