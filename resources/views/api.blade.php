@extends('layout.main')
@section('content')

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <h4 class="mb-3 text-danger">Hi {{ Auth::user()->username }},</h4>
                    <p class="mb-0">
                        Connect our services to your website with API.
                    </p>
                </div>
            </div>
        </div>


        <div class="container technology-block">

            <div class="row p-3">
                <div class="col-xl-12 col-md-6 col-sm-12">
                    <div class="card border-0 shadow-lg p-3 mb-5 bg-body rounded-40">
                        <div class="card-body">

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

                            <div class="card-title">
                                Api Credentials
                            </div>


                            <form action="set-webhook" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" name="amount" class="form-control" name="api_key"
                                               value="{{$api_key}}" disabled>

                                        <div class="col-4 mb-3">
                                            <a href="/generate-token" class="btn btn-dark btn mt-2">Generate Api Key</a>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-xl-8 col-sm-12">
                                        <label class="my-3">Webhook URL</label>
                                        <input type="text" name="webhook" class="form-control" name="webhook_url"
                                               value="{{$webhook_url}}">

                                        <div class="col-xl-4  col-sm-12">
                                            <button type="submit" style="background: #0a0c0d" class="btn btn mt-3 text-white">Set Webhook </button>
                                        </div>
                                    </div>


                                </div>

                            </form>


                        </div>

                    </div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <div class="card border-0 shadow-lg p-3 mb-5 bg-body rounded-40">

                        <div class="card-body">


                            <div class="">

                                <div class="p-2 col-lg-6">
                                    <strong>
                                        <h4>Api Documentation</h4>
                                    </strong>
                                </div>

                                <div>


                                </div>


                            </div>
                        </div>


                    </div>
                </div>


            </div>


        </div>
    </section>

@endsection
