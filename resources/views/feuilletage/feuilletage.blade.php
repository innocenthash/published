@extends('layouts.app_annoceurs')
@section('title')
Page d'accueil
@endsection
@section('accueil_css')
<style>

.page {
  background-color: white;
  /* border: 1px solid black; */
  padding: 20px;
  font-size: 20px;
}
</style>
@endsection
@section('accueil_client')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-sm-12  mx-auto mt-8">
        @foreach ($annonces as $annonce)


                    <div id="book" class="mx-auto">
                        @foreach (json_decode($annonce->images) as $image)
                        <div class="page border-4 border-solid border-gray-300-500">
                           <img src="{{asset("storage/annonces_images/".$image)}}" class=" object-cover h-96 w-96   " alt="Lights" style="width:100%">
                        </div>

                        {{-- <input type="hidden" value={{$i+1}}> --}}
                        @endforeach
                    </div>

       @endforeach
    </div>
    </div>
</div>

@endsection
