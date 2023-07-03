@extends('layouts.app_annoceurs')

@section('title')
   message
@endsection

@section('message')

       @livewire('conversation' , ['conversation' => $conversation] )
       {{-- <livewire:conversation  :conversations='$conversations' /> --}}

@endsection
