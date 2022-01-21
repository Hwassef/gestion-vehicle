<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/adminSideNavBarStyle.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/10376d63f8.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
</head>

<body style="background: #F1F2F3;">
    @include('layouts.sideNavBar')

    <div class="container mt-3">
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
            <ul class="nav navbar navbar-left d-flex d-inline-flex ">
                <li class="nav-item active">
                    <a class="nav-link" href="#pendingLetters" id="pendingLetters">Pending Letters <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#allLetters" id="allLetters">All Letters</a>
                </li>
            </ul>
        </div>
        <div class=" justify-content-center">
            <div class="container-fluid" id="pendingLettersContent" style="display: none;">
                @foreach($letters as $letter)
                @if($letter -> answered == false)
                @csrf
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        {{$letter -> letter_title}}
                        <p> <span class="dot" style="height: 12px;width: 12px;background-color: #90ee90;border-radius: 70%;display: inline-block;"></span>
                            Pending
                        </p>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{!! mb_strimwidth($letter -> letter_body,0,110, '...') !!}</p>
                            @foreach($clients as $client)
                            @if($client -> id == $letter -> client_id)
                            <footer class="blockquote-footer">Written By {{$client -> name}}</footer>
                            @endif
                            @endforeach
                        </blockquote>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('admin.fullClientLetter',$letter -> id)}}" class="btn btn-primary" type="submit">Read More</a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class=" justify-content-center">
            <div class="container-fluid" id="allLettersContent">
                @foreach($letters as $letter)
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        {{$letter -> letter_title}}
                        <p> <span class="dot" style="height: 12px;width: 12px;background-color: #90ee90;border-radius: 70%;display: inline-block;"></span>
                            Pending
                        </p>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{!! mb_strimwidth($letter -> letter_body,0,110, '...') !!}</p>
                            @foreach($clients as $client)
                            @if($client -> id == $letter -> client_id)
                            <footer class="blockquote-footer">Written By {{$client -> name}} </footer>
                            @endif
                            @endforeach
                        </blockquote>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $("#pendingLetters").click(function() {
            $("#pendingLettersContent").show(600);
            $("#allLettersContent").hide();
        });
        $("#allLetters").click(function() {
            $("#allLettersContent").show(600);
            $("#pendingLettersContent").hide();
        });
    </script>
</body>

</html>
