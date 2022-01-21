<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
@include('layouts.app')

<body>
    <div class="container-fluid mt-4">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav list-inline d-flex justify-content-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="#current" id="currentPage">Current Reservations <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pending" id="pendingPage">Pending Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#old" id="oldPage">Old Reservations</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid" id="currentReservations">
            <h2>Current Reservations : </h2>
            @if($currentReservationsLength>0)
            <table class="table table-hover mt-4">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Vehicle Brand</th>
                    <th scope="col">Reservation Period</th>
                    <th scope="col">Days Left</th>
                    <th scope="col">Number Of Travels</th>
                    <th scope="col">Destinations</th>
                    <th scope="col">Arrival Date</th>
                    <th scope="col">Arrival Hour</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$counter+=1}}</td>
                        @foreach($vehicle as $v)
                        @if($v->id == $reservation->vehicle_id)
                        <td>{{$v->vehicle_brand}}</td>
                        @endif
                        @endforeach
                        <td>{{$reservation -> reservation_period}} Days</td>
                        <td>Add Days Left Atribute</td>
                        <td>{{$reservation -> number_of_travels}}</td>
                        <td>
                            @foreach(($reservation -> destination) as $destination)
                            {{$destination}}
                            @endforeach
                        </td>
                        <td>{{$reservation -> arrival_date}}</td>
                        <td>{{$reservation -> arrival_hour}}</td>
                        <td>{{$reservation -> state ? 'Approved' : 'Waiting For Admin Approval'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="mt-3 text-center">You Do Not Have Any Current Reservations... YET</p>
            @endif
        </div>

        <div class="container-fluid" id="pendingReservations" style="display: none;">
            <h2>Pending Reservations : </h2>
            <table class="table table-hover mt-4">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Vehicle Brand</th>
                    <th scope="col">Reservation Period</th>
                    <th scope="col">Number Of Travels</th>
                    <th scope="col">Destinations</th>
                    <th scope="col">Arrival Date</th>
                    <th scope="col">Arrival Hour</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$counter+=1}}</td>
                        @foreach($vehicle as $v)
                        @if($v->id == $reservation->vehicle_id)
                        <td>{{$v->vehicle_brand}}</td>
                        @endif
                        @endforeach
                        <td>{{$reservation -> reservation_period}} Days</td>
                        <td>{{$reservation -> number_of_travels}}</td>
                        <td>
                            @foreach(($reservation -> destination) as $destination)
                            {{$destination}}
                            @endforeach
                        </td>
                        <td>{{$reservation -> arrival_date}}</td>
                        <td>{{$reservation -> arrival_hour}}</td>
                        <td>{{$reservation -> state ? 'Approved' : 'Waiting For Admin Approval'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <div class="container-fluid" id="oldReservations" style="display: none;">
            <h2>Old Reservations : </h2>
            @if($currentReservationsLength>0)
            <table class="table table-hover mt-4">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Vehicle Brand</th>
                    <th scope="col">Reservation Period</th>
                    <th scope="col">Number Of Travels</th>
                    <th scope="col">Destinations</th>
                    <th scope="col">Arrival Date</th>
                    <th scope="col">Arrival Hour</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$counter+=1}}</td>
                        @foreach($vehicle as $v)
                        @if($v->id == $reservation->vehicle_id)
                        <td>{{$v->vehicle_brand}}</td>
                        @endif
                        @endforeach
                        <td>{{$reservation -> reservation_period}} Days</td>
                        <td>{{$reservation -> number_of_travels}}</td>
                        <td>
                            @foreach(($reservation -> destination) as $destination)
                            {{$destination}}
                            @endforeach
                        </td>
                        <td>{{$reservation -> arrival_date}}</td>
                        <td>{{$reservation -> arrival_hour}}</td>
                        <td>{{$reservation -> state ? 'Approved' : 'Waiting For Admin Approval'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-center mt-3">You Do Not Have Any Old Reservations... YET</p>
            @endif
        </div>







    </div>
    <script>
        $("#currentPage").click(function() {
            $("#currentReservations").show(600);
            $("#pendingReservations").hide();
            $("#oldReservations").hide();
        });
        $("#pendingPage").click(function() {
            $("#pendingReservations").show(600);
            $("#oldReservations").hide();
            $("#currentReservations").hide();
        });
        $("#oldPage").click(function() {
            $("#oldReservations").show(600);
            $("#currentReservations").hide();
            $("#pendingReservations").hide();
        });
    </script>
</body>

</html>
