@extends('layouts.dashboard_admin')

@section('title')
     categorie|formulaire
@endsection

@section('categorie|formulaire')
    <div class="row mx-auto ">
          <div class="col-12  flex justify-center mt-12 ">
               <div class="">
                <div class="card w-96 shadow-md ">
                    <div class="card-header text-white text-center bg-gradient-to-r from-pink-500 to-yellow-500">Categorie</div>
                    <div class="card-body">
                        <form action="{{url('/save_categorie')}}" method="post">
                            @csrf
                            <div class="form-group">



                              <input type="text" name="categorie" class="form-control border-gray-300  border-2 rounded-md" placeholder="Nouvelle categorie" required >
                            </div>


                            <button type="submit" class="btn bg-gradient-to-r from-pink-500 to-yellow-500 shadow-2xl form-control text-white">Ajouter</button>
                          </form>
                    </div>

                  </div>
               </div>
          </div>
    </div>
@endsection
