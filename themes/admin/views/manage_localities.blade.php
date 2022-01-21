<!DOCTYPE html>
<html lang="en">

<head>
    @notifyCss
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
    <x:notify-messages />
    <div class="container">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary rounded-pill" id="showForm"><i class="fas fa-user-plus fa-1x"></i> Add Locality</button>
        </div>
        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">locality Name</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach($localities as $locality)
                <tr>
                    <td class="id" style="display:none;">{{$locality->id}}</td>
                    <th scope="row">{{$nb+=1}}</td>
                    <td class="locality_name">{{$locality -> locality_name}}</td>
                    <td>
                        <button type="submit" class="openUpdateLocalityModal" data-toggle="modal" data-target="#Modify" data-id="{{$locality -> id}}">Edit</button>
                        <button type="submit" data-toggle="modal" data-target="#deleteLocality" data-id="{{$locality -> id}}" class="openDeleteLocalityModal">Delete</button>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <form method="POST" action="{{route('admin.addLocality')}}" enctype="multipart/form-data" id="addLocality" style="display: none; transition-timing-function: ease-in;" class="hide mt-5">
            @csrf
            <div class="row mt-3">
                <div class="col-2">
                    <label for="name">Locality Name :</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="locality_name">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-success" style="width: 110px;"><i class="fas fa-plus-circle"></i> Save</button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="deleteLocality">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <form method="POST" action="{{route('admin.deleteLocality')}}">
                        @csrf
                        <div class="modal-header">
                            <div class="icon-box" style="color: #f15e5e;border: 3px solid #f15e5e;">
                                <i class="fas fa-times-circle" style="font-size:5em;"></i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="deleteModalLocalityId" id="deleteModalLocalityId" />
                            <p class="text-center">Are you sure you want to delete this locality ?</p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modify">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <form action="{{route('admin.updateLocality')}}" method="post">
                        @csrf
                        <input type="hidden" name="updateModalLocalityId" id="updateModalLocalityId">
                        <div class="modal-header">
                            <div class="icon-box" style="color: #15AABF;border: 3px solid #15AABF;">
                                <i class="fas fa-info-circle" style="font-size:5em;"></i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <p style="letter-spacing: 7px; font-size:22px;" class="text-center">UPDATE</p>
                            <div class="row">
                                <div class="col-4">
                                    <label for="name">locality Name :</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="locality_name" name="locality_name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS code -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--JS below-->


    <!--modal-->
    <script>
        $(document).on("click", ".openDeleteLocalityModal", function() {
            var localityid = $(this).data('id');
            $("#deleteModalLocalityId").val(localityid);
        });
    </script>


    <script>
        $(document).on('click', '.openUpdateLocalityModal', function() {
            var localityid = $(this).data('id');
            $('#updateModalLocalityId').val(localityid);
            var locality_name = $(this).closest("tr").find('td.locality_name').text();
            $('#locality_name').val(locality_name);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#showForm').on('click', function() {
                $('#addLocality').css('display', 'block').animate();
            });
        })
    </script>
    @notifyJs
</body>

</html>
