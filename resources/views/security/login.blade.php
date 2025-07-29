@extends('base')
@section('content')

    <form action="{{route('login.post')}}" method="post" class="w-1/2 mx-auto px-16">
        @csrf
        <h2 class="uppercase mb-4 font-thin text-2xl sm:mb-8 ">Formulaire de connection</h2>
        @if( session('error'))
            <div class=" bg-red-500/45 text-gray-100 px-4 py-3 rounded-md mx-auto mb-8"> {{session('error')}}</div>
        @endif

        <div class="mb-3">
            <input type="email" name="email"
                   class="w-full rounded py-2 text-sm border border-gray-400 px-4 focus:outline focus:outline-gray-500"
                   placeholder="Votre email">
        </div>
        <div class="mb-3">
            <input type="password" name="password"
                   class="w-full rounded py-2 text-sm border border-gray-400 px-4 focus:outline focus:outline-gray-500"
                   placeholder="Votre mot de passe">
        </div>
        <button type="submit" class="bg-blue-500 py-2 px-8 rounded text-gray-100">Se connecter</button>
    </form>

@endsection
