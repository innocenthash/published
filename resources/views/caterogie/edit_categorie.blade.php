@extends('layouts.dashboard_admin')

@section('title')
       Edit|categorie
@endsection

@section('Edit|categorie')
<div class="row mx-auto ">
    <div class="col-12  flex justify-center mt-12 ">
         <div class="">
          <div class="card w-96 shadow-md ">
              <div class="card-header bg-gradient-to-r from-pink-500 to-yellow-500 text-white text-center">Categorie</div>
              <div class="card-body">
                  <form action="{{url('/modifier_categorie/'.$categorie->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                      {{-- <input type="hidden" name="id" value="{{$categorie->id}}"> --}}


                        <input type="text" value="{{$categorie->categorie_name}}" name="categorie" class="form-control border-gray-300  border-2 rounded-md" placeholder="Nouvelle categorie" required >
                      </div>


                      <button type="submit" class="btn bg-teal-700 form-control text-white">Modifier</button>
                    </form>
              </div>

            </div>
         </div>
    </div>
</div>
@endsection
