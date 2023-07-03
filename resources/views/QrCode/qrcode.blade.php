@extends('layouts.app_annoceurs')

@section('title')
    QrCode|Generate
@endsection

@section('QrCode|Generate')
      <div class="row mt-9">

        @foreach ($myqrcodes as $myqrcode)
                {{-- {{$myqrcode->content}} --}}
                <div class="col-12 col-sm-4 mt-9">
                    {!! QrCode::size(100)->generate($myqrcode->content); !!}
                      {{-- {!! $qrcode !!} --}}
                </div>
        @endforeach

      </div>
@endsection
