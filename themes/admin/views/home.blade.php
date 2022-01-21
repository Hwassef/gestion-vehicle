<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/adminSideNavBarStyle.css')}}">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/10376d63f8.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

    @include('layouts.sideNavBar')
    <div class="container-fluid m-0">
        <div class="row">
            <nav class="navbar navbar-expand-lg ">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-light" style="background: grey;">
                                    {{auth()->user()->notifications -> count()}}
                                </span>
                            </a>
                            <ul class="dropdown-menu" style="padding: 0;margin:0;list-style: none;width:18em;min-width:100%;z-index:99;position:absolute;overflow:visible;">
                                <li class="mt-2">
                                    <span style="margin-left:7px;">Notifications</span>
                                    <a href="#"><span class="text-right" style="margin-left: 3.5em;">Mark All As Read</span></a>
                                </li>
                                <div class="row mt-3"></div>
                                @foreach(auth()->user()->notifications as $notification)
                                <li class="list-group-item list-group-item-success">{{$notification->data['message']}}</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="row mt-3">
                <div class="col">
                    <div class="card-header">
                        <h4>TOP 5 Vehicles</h4>
                        <div class="card-body d-flex justify-content-center">
                            <canvas id="bar-chart" width="1800" height="450"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card-header">
                        <h4>TOP 5 Clients</h4>
                        <div class="card-body d-flex justify-content-center">
                            <canvas id="layanan1" width="1800" height="450""></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: [
                    'BMW',
                    'Mercedes',
                    'IZUZU',
                    'DMAX',
                    'CLIO'
                ],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: [5, 4, 2, 8, 1]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Number Of reservations'
                }
            }
        });
        new Chart(document.getElementById("layanan1"), {
            type: 'bar',
            data: {
                labels: [
                    'Wassef Hassine',
                    'Wahbi Hassine',
                    'Ali Njim',
                    'Ahmed Hassine',
                    'Med Dhia Lajili'
                ],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: [4, 6, 2, 8, 1]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Number Of reservations'
                }
            }
        });
    </script>

</body>

</html>
