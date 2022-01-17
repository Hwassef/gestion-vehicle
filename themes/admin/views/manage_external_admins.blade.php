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

<body oncontextmenu="return false;">
    @include('layouts.sideNavBar')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/10376d63f8.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

    <div class="container-fluid m-0">
        <div class="d-flex justify-content-end">

        </div>
        <div class="container">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary rounded-pill" id="showForm"><i class="fas fa-user-plus fa-1x"></i> Add External Admin</button>
            </div>
            <table class="table table-hover">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach($externalAdmins as $externalAdmin)
                    <tr>
                        <td class="id" style="display:none;">{{$externalAdmin->id}}</td>
                        <th scope="row">{{$nb+=1}}</td>
                        <td class="full_name">{{$externalAdmin -> full_name}}</td>
                        <td class="email">{{$externalAdmin -> email}}</td>
                        <td>
                            <button type="submit" class="edit" data-toggle="modal" data-target="#Modify" data-id="{{$externalAdmin -> id}}">Edit</button>
                            <button type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{$externalAdmin -> id}}" class="open-DeletelocalityDialog">Delete</button>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <form action="{{route('admin.addExternalAdmin')}}" method="POST" id="addExternalAdmin" style="display: none; transition-timing-function: ease-in;" class="hide">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <label for="full_name">Full Name</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="exampleInputEmail1">Email address</label>
                    </div>
                    <div class="col-4">
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="exampleInputPassword1">Password</label>
                    </div>
                    <div class="col-4">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="row mt-2" style="margin-right: 35px;">
                    <div class="col-7">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus" aria-hidden="true"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#showForm').on('click', function() {
                $('#addExternalAdmin').css('display', 'block').animate();
            });
        })
    </script>
    <!-- <script>
        document.onkeydown = function(e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'i'.charCodeAt(0))) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && (e.keyCode == 'C'.charCodeAt(0) || e.keyCode == 'c'.charCodeAt(0))) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && (e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'j'.charCodeAt(0))) {
                return false;
            }
            if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
                return false;
            }
            if (e.ctrlKey && (e.keyCode == 'S'.charCodeAt(0) || e.keyCode == 's'.charCodeAt(0))) {
                return false;
            }
        }
    </script> -->
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</body>

</html>