@extends('layouts.app_annoceurs')
@section('title')
mot de pass oublié
@endsection

@section('inscription')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12  mt-5 ">
            <div class="card w-80  mx-auto">
                <div class="card-body">

                    <div class="form-group flex items-center justify-center">
                        <img src="{{asset('backend/images/LOGO MONOGRAMME  - M.png')}}" alt="Logo" width="80">
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                      <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Adresse e-mail :</label>
                            <input type="email" class="form-control focus:ring-0 rounded-lg" name="email" required autofocus id="email" placeholder="Entrez votre adresse e-mail">
                        </div>

                        <button type="submit" class="hover:bg-teal-700 hover:transition duration-700 ease-in-out btn focus:ring-0 bg-gradient-to-r from-pink-500 to-yellow-500  text-white btn-block rounded-lg">Email Password Reset Link</button>





                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
