@extends('layout.main')
@section('content')



    <div class="container p-5">



        <div class="text-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>






        <div class="text-center">

            <img src="{{url('')}}/public/assets/success.gif" alt="image">

           <p class="my-2">Your payment has been submitted<br>Your funds will be added in less than 10 minutes.</p>


        </div>




        <a href="home" class="d-flex justify-conetnt-center text-white btn btn-block btn-dark my-4">
            Dashboard
        </a>



    </div>






@endsection
