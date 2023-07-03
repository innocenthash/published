@extends('layouts.app_annoceurs')
@section('title')
    Date|fin d'essaie
@endsection

@section('Date|fin')
      <div class="row mt-12">
        <div class="col-12 mt-12">
            <div class="card bg-gradient-to-r from-pink-500 to-yellow-500 text-dark w-80 mx-auto shadow-lg shadow-gray-400 ">
                <div class="card-body flex">
            <span class="w-80 h-12 shadow-md shadow-gray-200  rounded-xl mx-1 flex justify-center items-center bg-white" id="jours">{{ $diff->days }} </span><span class="flex justify-center items-center text-white">:</span>
            <span  class="w-80 h-12 shadow-md rounded-xl shadow-gray-200 mx-1  flex justify-center items-center bg-white" id="heures">{{ sprintf('%02d', $diff->h) }}</span><span class="flex justify-center items-center text-white">:</span>
            <span class="w-80  h-12 shadow-md rounded-xl shadow-gray-200 mx-1 flex justify-center items-center bg-white" id="minutes">{{ sprintf('%02d', $diff->i) }}</span><span class="flex justify-center items-center text-white">:</span>
            <span class="w-80 h-12 shadow-md rounded-xl shadow-gray-200 mx-1  flex justify-center items-center bg-white" id="secondes">{{ sprintf('%02d', $diff->s) }}</span><span class="flex justify-center items-center text-white"></span>
        </div>
        <div class="card-body flex">
            <span class=""></span><span class="flex justify-center items-center text-white"></span>
            <span  class=""></span><span class="flex justify-center items-center text-white"></span>
            <span class=""></span><span class="flex justify-center items-center text-white"></span>
            <span class="" ></span><span class="flex justify-center items-center text-white"></span>
        </div>
      </div>
    </div>
  </div>


@endsection
