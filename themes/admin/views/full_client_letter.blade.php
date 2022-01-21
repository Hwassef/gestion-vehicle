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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <style>
        .divider:before,
        .divider:after {
            color: #CED4D3;
            content: '\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0';
            text-decoration: line-through;
            margin: auto 0.5em;
        }
    </style>
</head>

<body style="background: #F1F2F3;">
    @include('layouts.sideNavBar')
    <div class="container mt-3">
        @foreach($clients as $client)
        @if($client -> id == $fullLetter -> client_id)
        <h6>From: {{$client -> email}} ({{$client -> name}})</h6>
        <p>Object: {{$fullLetter -> letter_title}}</p>
        <p>Description: {!! $fullLetter -> letter_body !!}</p>
        @endif
        @endforeach
        <h5 class="divider" style="color: #424242;">Answer</h5>
        <form action="{{route('admin.answerLetter', $fullLetter -> id)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-1">
                    <label for="from">From: </label>
                </div>
                <div class="col">
                    <input type="email" name="from" value="{{$admin -> email}}" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-1">
                    <label for="to">To</label>
                </div>
                <div class="col">
                    @foreach($clients as $client)
                    @if($fullLetter -> client_id == $client -> id)
                    <input type="email" name="to" value="{{$client -> email}}" disabled>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="row mt-3">
                <label for="">
                    <h5>Letter Body: </h5>
                </label>
            </div>
            <textarea class="form-control" id="summary-ckeditor" name="letter_body"></textarea>
            <button class="btn btn-primary mt-5" type="submit">Post your question</button>
        </form>

    </div>
    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>

</body>

</html>
