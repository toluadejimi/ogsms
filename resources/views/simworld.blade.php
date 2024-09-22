@extends('layout.main')
@section('content')

    <section id="technologies mt-4 my-5">
        <div class="container title my-5">
            <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-8 col-xl-6">
                    <h4 class="mb-3 text-danger">Hi {{ Auth::user()->username }} 👋</h4>
                    <p class="mb-0">
                        All countries verification (Server 2)
                    </p>
                </div>
            </div>
        </div>


        <div class="container technology-block">




            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12 my-3">
                    <div class="card">
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







                                <div class="row">


                                    <div class="col-xl-10 col-md-10 col-sm-12 p-3">

                                        <p class="d-flex justify-content-center">All Countries 🌎 Server 2 </p>


                                        <p class="mb-3 text-muted d-flex justify-content-center"> Search for country and
                                            choose service
                                        </p>

                                        <hr>


                                        <div class="form-group position-relative">
                                            <input type="text" class="form-control" id="countrySearch"
                                                   placeholder="Search for a country...">
                                            <ul class="list-group search-results" id="countryList"></ul>
                                        </div>


                                        <!-- Filter Search Input -->
                                        <div class="mt-3" id="filterSearch">
                                            <input type="text" id="filterSearchInput" class="form-control"
                                                   placeholder="Search for services...">
                                        </div>

                                        <div class="mt-5" id="responseData"></div>


                                    </div>

                                    <script>
                                        var countries = @json($countries);
                                        var currentData = {}; // Holds the raw API response data

                                        $(document).ready(function () {
                                            $('#filterSearch').hide();

                                            $('#countrySearch').on('input', function () {
                                                let searchValue = $(this).val().toLowerCase();
                                                let matchedCountries = '';

                                                if (searchValue) {
                                                    for (let key in countries) {
                                                        if (countries[key].toLowerCase().includes(searchValue)) {
                                                            matchedCountries += `<li class="list-group-item" data-country="${key}">${countries[key]}</li>`;
                                                        }
                                                    }
                                                    $('#countryList').html(matchedCountries).show();
                                                } else {
                                                    $('#countryList').hide();
                                                }
                                            });

                                            // When a country is clicked, trigger an AJAX request
                                            $('#countryList').on('click', 'li', function () {
                                                let country = $(this).data('country');
                                                $('#countrySearch').val($(this).text());
                                                $('#countryList').hide();

                                                // AJAX request to get country-specific data
                                                $.ajax({
                                                    url: `/proxy/prices?country=${country}`,
                                                    type: 'GET',
                                                    success: function (response) {
                                                        currentData = response; // Save data for filtering later
                                                        let output = generateCards(response);
                                                        $('#responseData').html(output);
                                                        $('#filterSearch').show();
                                                    },
                                                    error: function (error) {
                                                        console.log(error);
                                                        $('#responseData').html('<p class="text-danger">Failed to retrieve data.</p>');
                                                    }
                                                });
                                            });

                                            // Function to generate card HTML from data
                                            function generateCards(data) {
                                                let output = '';
                                                for (let key in data) {
                                                    output += `<h6 class="my-2">Available Services</h6>`;
                                                    for (let providerId in data[key]) {
                                                        for (let provider in data[key][providerId]) {
                                                            let providerData = data[key][providerId][provider];
                                                            let multipliedCost = providerData.cost * {{$rate}} + {{$margin}};
                                                            let formattedMultipliedCost = multipliedCost.toLocaleString('en-US', {
                                                                style: 'currency',
                                                                currency: 'NGN'
                                                            });


                                                            output += `<div class="card mb-3 operator-card" data-country="${key}" data-operator="${provider}" data-product="${providerId}" data-count="${providerData.count}">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                    <div class="col-6 d-flex justify-content-start">
                                                                     <h6>${providerId}</h6>
                                                                    </div>
                                                                    <div class="col-6 d-flex justify-content-end">

                                                                    <h6 style="color: #0a3622;">${formattedMultipliedCost} </h6>
                                                                    </div>
                                                                    <div class="col-6 d-flex justify-content-start mt-2">
                                                                    <p>Available: ${providerData.count}</p>
                                                                    </div>

                                                                   <div class="col-6 d-flex justify-content-end">
                                                                    <button class="btn btn-dark btn-sm">Buy Now</button>
                                                                    </div>


                                                        </div>
                                                    </div>
                                                    </div>`;


                                                        }
                                                    }
                                                }
                                                return output;
                                            }

                                            // Search within the loaded results
                                            $('#filterSearchInput').on('input', function () {
                                                let searchValue = $(this).val().toLowerCase();
                                                let filteredData = {};

                                                // Filter data based on the operator name or provider ID
                                                for (let key in currentData) {
                                                    for (let providerId in currentData[key]) {
                                                        for (let provider in currentData[key][providerId]) {
                                                            if (provider.toLowerCase().includes(searchValue) || providerId.toLowerCase().includes(searchValue)) {
                                                                if (!filteredData[key]) filteredData[key] = {};
                                                                filteredData[key][providerId] = filteredData[key][providerId] || {};
                                                                filteredData[key][providerId][provider] = currentData[key][providerId][provider];
                                                            }
                                                        }
                                                    }
                                                }

                                                // Update results
                                                let output = generateCards(filteredData);
                                                $('#responseData').html(output);
                                            });

                                            // When an operator is clicked, send a request to the backend controller
                                            $('#responseData').on('click', '.operator-card', function () {
                                                let country = $(this).data('country');
                                                let operator = $(this).data('operator');
                                                let product = $(this).data('product');
                                                let count = $(this).data('count');


                                                // Send to backend
                                                $.ajax({
                                                    url: `/buy-csms`,
                                                    type: 'POST',
                                                    data: {
                                                        country: country,
                                                        operator: operator,
                                                        product: product,
                                                        count: count,
                                                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                                                    },


                                                    success: function (response) {

                                                        if (response === "2") {
                                                            alert('Verification Not Available.');
                                                        } else if (response === "4") {
                                                            window.location.href = '/orders'; // Modify the URL as needed
                                                        } else if (response === "9") {
                                                            window.location.href = '/fund-wallet'; // Modify the URL as needed
                                                        } else if (response === "0") {
                                                            alert('Verification Not Available.');
                                                        }else {
                                                            if (response.code === 200) {
                                                                var id =response.id;
                                                                window.location.href = '/orders?id=' + id; // Modify the URL as needed
                                                            }
                                                        }
                                                    },
                                                    error: function (error) {
                                                        console.log(error);
                                                        alert('Failed to complete purchase.');
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                </div>




                        </div>

                    </div>
                </div>




                @if ($product != null)
                    <div class="col-xl-6 col-md-6 col-sm-12 p-3">
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row">
                                    <p class="text-muted text-center">Service Information</p>

                                    <h5 class="text-center my-2">Amount</h5>
                                    <h6 class="text-center text-muted my-2 mb-4">Price:
                                        NGN {{ number_format($price, 2) }}</h6>


                                    <h5 class="text-center my-2">Available Nuumbers</h5>
                                    <h6 class="text-center text-muted my-2 mb-4">
                                        {{ number_format($stock, 2)}}</h6>

                                    <h5 class="text-center text-muted my-2">Success rate: <span
                                            style="font-size: 30px; color: rgb(63,63,63);"> @if ($rate < 10)
                                                {{ $rate }}%
                                            @elseif ($rate < 20)
                                                {{ $rate }}%
                                            @elseif ($rate < 30)
                                                {{ $rate }}%
                                            @elseif ($rate < 40)
                                                {{ $rate }}%
                                            @elseif ($rate < 50)
                                                {{ $rate }}%
                                            @elseif ($rate < 60)
                                                {{ $rate }}%
                                            @elseif ($rate < 70)
                                                {{ $rate }}%
                                            @elseif ($rate < 80)
                                                {{ $rate }}%

                                            @elseif ($rate < 90)
                                                {{ $rate }}%
                                            @elseif ($rate <= 100)
                                                {{ $rate }}%
                                            @else
                                            @endif</span></h5>
                                    <h6></h6>


                                    @if (Auth::user()->wallet < $price && $stock > 0)
                                        <a href="fund-wallet" class="btn btn-secondary text-white btn-lg">Fund
                                            Wallet</a>
                                    @elseif($stock > 0 && Auth::user()->wallet > $price)
                                        <form action="order_now" method="POST">
                                            @csrf

                                            <input type="text" name="country" hidden value="{{ $count_id ?? null }}">
                                            <input type="text" name="price" hidden value="{{ $price ?? null }}">
                                            <input type="text" name="service" hidden value="{{ $serv ?? null }}">


                                            <button type="submit"
                                                    style="border: 0px; background: rgb(63,63,63); color: white;"
                                                    class="mb-2 btn btn w-100 btn-lg mt-6">Buy Number
                                                Now
                                            </button>


                                            <p class="text-muted text-center my-5">
                                                At OGSMSPOOL, we prioritize quality, ensuring that you receive the
                                                highest standard of SMS verifications for all your needs. Our commitment
                                                to excellence means we only offer non-VoIP phone numbers, guaranteeing
                                                compatibility with any service you require.
                                            </p>


                                        </form>
                                    @else

                                        <a href="/home" class="btn btn-danger text-white btn-lg">Number not available</a>

                                    @endif


                                </div>


                            </div>

                        </div>
                    </div>
                @endif


                <div class="col-xl-6 col-md-6 col-sm-12 my-3">


                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h6>Recent Orders</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background: rgb(84,84,84); border-radius: 10px; color: white">
                                    <tr>
                                        <th class="text-white">ID</th>
                                        <th class="text-white">Phone</th>
                                        <th class="text-white">SMS</th>
                                        <th class="text-white">Amount</th>
                                        <th class="text-white">Status</th>
                                        <th class="text-white">Action</th>

                                    </tr>
                                    </thead>


                                    @foreach ($orders as $data)

                                        <tbody>

                                        <tr>

                                            <td>
                                                {{ $data->id }}
                                            </td>
                                            <td>
                                                {{ $data->phone }}
                                            </td>
                                            <td>
                                                {{ $data->sms}}
                                            </td>

                                            <td>
                                                {{ number_format($data->cost, 2) }}
                                            </td>

                                            @if($data->status == 2)
                                                <td class="text-success">
                                                    Delivered
                                                </td>
                                            @else
                                                <td class="text-warning">
                                                    Pending
                                                </td>
                                            @endif

                                            <td>
                                                <a href="delete-order?id={{$data->id}}"
                                                   class="btn btn-sm btn-dark text-small">Delete</a>
                                            </td>

                                        </tr>


                                        </tbody>

                                    @endforeach

                                </table>
                            </div>


                        </div>

                    </div>


                </div>

            </div>



        </div>


    </section>






    <script src="/livewire/livewire.js?id=90730a3b0e7144480175" data-turbo-eval="false"
            data-turbolinks-eval="false">
    </script>
    <script data-turbo-eval="false" data-turbolinks-eval="false">
        window.livewire = new Livewire();
        window.Livewire = window.livewire;
        window.livewire_app_url = '';
        window.livewire_token = 'JBt4aOzGju0YuBweWShPMRkAkmVxvzZzG4XOMx7V';
        window.deferLoadingAlpine = function (callback) {
            window.addEventListener('livewire:load', function () {
                callback();
            });
        };
        let started = false;
        window.addEventListener('alpine:initializing', function () {
            if (!started) {
                window.livewire.start();
                started = true;
            }
        });
        document.addEventListener("DOMContentLoaded", function () {
            if (!started) {
                window.livewire.start();
                started = true;
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('data-table');
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const countdownElement = row.cells[2]; // Assumes "Expires" is in the third column (index 2)
                let seconds = parseInt(countdownElement.getAttribute('data-seconds'), 10);

                const countdownInterval = setInterval(function () {
                    countdownElement.textContent = seconds + 's';

                    if (seconds <= 0) {
                        clearInterval(countdownInterval);
                        // Add your logic to handle the expiration, e.g., sendPostRequest(row);
                        console.log('Expired:', row);
                    }

                    seconds--;
                }, 1000);
            });

            // You may add the sendPostRequest function here or modify the code accordingly
        });
    </script>

    <script>
        $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
            $("select").select2();
        });


    </script>


@endsection
