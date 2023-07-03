@extends('layouts.app_annoceurs')
@section('title')
Plans
@endsection

@section('plans_css')
<style>
      * {
  box-sizing: border-box;
}


.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}



</style>
@section('plans')
<div class="container">


    <div class="row">

        <div class="col-12 col-md-12">
            <div   class="card mt-2  ">


                <div class="card-body">

                    <div class="row ">
                        @foreach($plans as $plan)
                        <div class="col-12 col-md-4 flex justify-center mx-auto ">
                            <div class="w-50 card rounded-md {{$plan->name =='Premium' ?' border-1 border-yellow-400 header ' :'' }} ">
                                <ul class="price">
                                <div class="card-header">
                                    <li class="header rounded-md shadow-2xl bg-gradient-to-r from-pink-500 to-yellow-500">
                                        <h5 class="card-title">{{ $plan->name }}</h5>
                                    </li>
                                </div>

                                <div class="card-body">
                                    <li class="grey"> ${{ $plan->price }}/Mois</li>
                                    @foreach ($plan->data as $liste)
                                    <li>{{$liste}}</li>
                                    @endforeach


                                </div>

                                <div class="card-footer">
                                    <a href="{{url('plans/'.$plan->slug."/".$id)}}" class="btn btn-block shadow-2xl bg-gradient-to-r from-pink-500 to-yellow-500 focus:ring-0 text-white pull-right">Choisir</a>
                                </div>




                                 </ul>
                            </div>
                           </div>
                           @endforeach
                           {{-- <div class="columns">
                             <ul class="price">
                               <li class="header" style="background-color:#04AA6D">Pro</li>
                               <li class="grey">$ 24.99 / year</li>
                               <li>25GB Storage</li>
                               <li>25 Emails</li>
                               <li>25 Domains</li>
                               <li>2GB Bandwidth</li>
                               <li class="grey"><a href="#" class="button">Sign Up</a></li>
                             </ul>
                           </div> --}}

                           {{-- <div class="col-12 col-md-6 flex justify-center ">
                            <div class="w-50 card ">
                                <ul class="price">
                                <div class="card-header">
                                    <li class="header"></li>
                                </div>

                                <div class="card-body">
                                    <li class="grey"> </li>
                                    <li>10GB Storage</li>
                                    <li>10 Emails</li>
                                    <li>10 Domains</li>
                                    <li>1GB Bandwidth</li>
                                </div>

                                <div class="card-footer">
                                    <li class="grey"><a href="#" class="button">Sign Up</a></li>
                                </div>




                                 </ul>
                            </div>
                           </div> --}}



                    </div>

               </div>
          </div>


        </div>

   </div>





    {{-- <div class="row justify-content-center">










        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Plane:</div>

                <div class="card-body">


                    <input type="hidden" name="choix_annonce" value="{{$id}}">


                    <div class="row">
                        @foreach($plans as $plan)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                  <div class="card-header">
                                        ${{ $plan->price }}/Mo
                                  </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $plan->name }}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                    <a href="{{url('plans/'.$plan->slug."/".$id)}}" class="btn btn-primary pull-right">Choose</a>
<a ></a>
                                  </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
