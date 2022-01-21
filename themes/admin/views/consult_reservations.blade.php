<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/adminSideNavBarStyle.css')}}">


    <style>
        .modal-confirm {
            color: #636363;
            width: 452px;
            margin: 30px auto;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }

        .modal-confirm .modal-body {
            color: #999;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }

        .modal-confirm .modal-footer a {
            color: #999;
        }

        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
        }

        .modal-confirm .icon-box i {
            font-size: 86px;
            margin-top: 2px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }

        .modal-confirm .btn-info {
            background: #c1c1c1;
        }

        .modal-confirm .btn-info:hover,
        .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }

        .modal-confirm .btn-danger {
            background: #f15e5e;
        }

        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>

</head>
@include('layouts.sideNavBar')

<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/10376d63f8.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

    <div class="container mt-3">

        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Client Full Name</th>
                <th scope="col">Vehicle Brand</th>
                <th scope="col">Reservation Info</th>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td class="id" style="display:none;">{{$reservation->id}}</td>
                    <th scope="row">{{$counter+=1}}</td>
                        @foreach($userWithReservation as $u)
                        @if($u->id == $reservation -> user_id)
                    <td class="client_name">{{$u -> name}}</td>
                    <td class="destination" style="display: none;">
                        @foreach(($reservation -> destination) as $destination)
                        {{$destination}}

                        @endforeach
                    <td class="user_id" style="display: none;">{{$reservation -> user_id}}</td>
                    </td>
                    <td class="number_of_travels" style="display: none;">{{$reservation -> number_of_travels}}</td>
                    <td class="arrival_date" style="display: none;">{{$reservation -> arrival_date}}</td>
                    <td class="reservation_period" style="display: none;">{{$reservation -> reservation_period}}</td>
                    <td class="arrival_hour" style="display: none;">{{$reservation -> arrival_hour}}</td>
                    @endif
                    @endforeach
                    @foreach($vehicles as $vehicle)
                    @if($vehicle->id == $reservation -> vehicle_id)
                    <td>
                        {{$vehicle -> vehicle_brand}}
                        <button type="submit" class="btn btn-success openVehicleInfo" data-toggle="modal" data-target="#vehicleInfo" data-id="{{$vehicle -> id}}">
                            <i class="fas fa-external-link-alt"></i>
                        </button>
                    </td>
                    <td class="vehicle_brand" style="display: none;"> {{$vehicle -> vehicle_brand}}</td>
                    <td class="vehicle_registration_number" style="display: none;">{{$vehicle -> vehicle_registration_number}}</td>
                    <td class="vehicle_power" style="display: none;">{{$vehicle -> vehicle_power}}</td>
                    <td class="vehicle_number_of_plcaes" style="display: none;">{{$vehicle -> vehicle_number_of_places}}</td>
                    @endif
                    @endforeach
                    <td>
                        Click Here
                        <button type="submit" class="btn btn-success openReservationInfo" data-toggle="modal" data-target="#reservationInfo" data-id="{{$vehicle -> id}}">
                            <i class="fas fa-external-link-alt"></i>
                        </button>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div id="vehicleInfo" class="modal fade">
        <div class="modal-dialog modal-confirm modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box" style="color: #82CE34;border: 3px solid #82CE34;">
                        <i class="fas fa-info-circle" style="font-size:5em;"></i>
                    </div>
                </div>
                <h4 class="modal-title">Vehicle Information</h4>
                <div class="modal-body">
                    <div class="d-flex justify-content-start">
                        <div class="col-7">
                            <span>Vehicle Registration Number:</span>
                        </div>
                        <div class="col">
                            <input type="text" name="vehicle_registration_number" id="vehicle_registration_number" disabled style="background-color: white; border-style: none; margin-left:1em;">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            Vehicle Brand:
                        </div>
                        <div class="col">
                            <input type="text" name="vehicle_brand" id="vehicle_brand" disabled style="background-color: white; border-style: none">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            Vehicle Power:
                        </div>
                        <div class="col">
                            <input type="text" name="vehicle_power" id="vehicle_power" disabled style="background-color: white; border-style: none">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            Vehicle Number Of Places:
                        </div>
                        <div class="col">
                            <input type="text" name="vehicle_number_of_plcaes" id="vehicle_number_of_plcaes" disabled style="background-color: white; border-style: none">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-success btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div id="reservationInfo" class="modal fade">
        <div class="modal-dialog modal-confirm modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box" style="color: #82CE34;border: 3px solid #82CE34;">
                        <i class="fas fa-info-circle" style="font-size:5em;"></i>
                    </div>
                </div>
                <h4 class="modal-title">Reservation Information</h4>
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-7">
                            Client Name:
                        </div>
                        <div class="col">
                            <input type="text" name="client_name" id="client_name" disabled style="background-color: white; border-style: none">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="col-7 mt-2">
                            <span>Vehicle Brand:</span>
                        </div>
                        <div class="col">
                            <input type="text" name="reservation_vehicle_brand" id="reservation_vehicle_brand" disabled style="background-color: white; border-style: none; margin-left:1em;">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            Destinations:
                        </div>
                        <div class="col">
                            <span id="one"></span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            Number Of Travels:
                        </div>
                        <div class="col">
                            <input type="text" name="number_of_travels" id="number_of_travels" disabled style="background-color: white; border-style: none">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            Arrival Date:
                        </div>
                        <div class="col">
                            <input type="text" name="arrival_date" id="arrival_date" disabled style="background-color: white; border-style: none">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            Arrival Hour:
                        </div>
                        <div class="col">
                            <input type="text" name="arrival_hour" id="arrival_hour" disabled style="background-color: white; border-style: none">
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success btn-block" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





        <!--modal-->
        <script>
            $(document).on('click', '.openVehicleInfo', function() {

                var vehicle_registration_number = $(this).closest("tr").find('td.vehicle_registration_number').text();
                $('#vehicle_registration_number').val(vehicle_registration_number);

                var vehicle_brand = $(this).closest("tr").find('td.vehicle_brand').text();
                $('#vehicle_brand').val(vehicle_brand);

                var vehicle_power = $(this).closest("tr").find('td.vehicle_power').text();
                $('#vehicle_power').val(vehicle_power);

                var vehicle_number_of_plcaes = $(this).closest("tr").find('td.vehicle_number_of_plcaes').text();
                $('#vehicle_number_of_plcaes').val(vehicle_number_of_plcaes);

            });
        </script>

        <script>
            $(document).on('click', '.openReservationInfo', function() {


                var client_name = $(this).closest("tr").find('td.client_name').text();
                $('#client_name').val(client_name);

                var vehicle_brand = $(this).closest("tr").find('td.vehicle_brand').text();
                $('#reservation_vehicle_brand').val(vehicle_brand);
                var destination = $(this).closest("tr").find('td.destination').text();
                $(document).ready(function() {
                    $("#one").text(destination);
                    $("#cofirmReservationVehicleBrand").text(vehicle_brand);
                });

                var number_of_travels = $(this).closest("tr").find('td.number_of_travels').text();
                $('#number_of_travels').val(number_of_travels);

                var arrival_date = $(this).closest("tr").find('td.arrival_date').text();
                $('#arrival_date').val(arrival_date);

                var reservation_period = $(this).closest("tr").find('td.reservation_period').text();
                $('#reservation_period').val(reservation_period);

                var arrival_hour = $(this).closest("tr").find('td.arrival_hour').text();
                $('#arrival_hour').val(arrival_hour);

            });
        </script>
</body>

</html>
