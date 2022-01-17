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
@include('layouts.sideNavBar')

<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/10376d63f8.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <div class="container-fluid">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary rounded-pill" id="showForm"><i class="fas fa-user-plus fa-1x"></i> Add External Admin</button>
        </div>

        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">vehicle registration number</th>
                <th scope="col">vehicle brand</th>
                <th scope="col">vehicle power</th>
                <th scope="col">number of places</th>
                <th scope="col">Vehicle Pictures</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach($Vehicles as $Vehicle)
                <?php
                $picturesInArray = array();
                $picturesInArray = explode("|", $Vehicle->vehicle_pictures);
                ?>
                <tr>
                    <td class="id" style="display:none;">{{$Vehicle->id}}</td>
                    <th scope="row" style="width: 7%;">{{$nb+=1}}</td>
                    <td class="vehicle_registration_number" style="width: 21%;">{{$Vehicle -> vehicle_registration_number}}</td>
                    <td class="vehicle_brand" style="width: 14%;">{{$Vehicle -> vehicle_brand}}</td>
                    <td class="vehicle_power" style="width: 14%;">{{$Vehicle -> vehicle_power}}</td>
                    <td class="places_number" style="width: 14%;">{{$Vehicle -> vehicle_number_of_places}}</td>
                    <td class="vehicle_pictures">
                        @for($i = 0; $i
                        <count($picturesInArray);$i++) <img style="width: 100px; height: 75px;" src="{{ URL::asset('storage/vehicles/'.$picturesInArray[$i])}}" />
                        @endfor
                    </td>
                    <td>
                        <button type="submit" class="edit" data-toggle="modal" data-target="#Modify" data-id="{{$Vehicle -> id}}">Edit</button>
                        <button type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{$Vehicle -> id}}" class="open-DeleteVehicleTypeDialog">Delete</button>
                    </td>

                    @endforeach
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{$Vehicles -> links()}}
        </div>
        <form method="POST" action="{{route('admin.addVehicle')}}" enctype="multipart/form-data" id="addExternalAdmin" style="display: none; transition-timing-function: ease-in;" class="hide">
            @csrf
            <div class="form-group mt-3">
                <label for="name" class="col-md-4">vehicle registration number :</label>
                <input type="text" class="form control col-md-6" name="vehicle_registration_number">
            </div>
            <div class="form-group mt-3">
                <label for="price" class="col-md-4">vehicle brand :</label>
                <input type="text" class="form control col-md-6" name="vehicle_brand">
            </div>
            <div class="form-group mt-3">
                <label for="price" class="col-md-4">vehicle power :</label>
                <input type="text" class="form control col-md-6" name="vehicle_power">
            </div>
            <div class="form-group mt-3">
                <label for="price" class="col-md-4">number of places :</label>
                <input type="text" class="form control col-md-6" name="places_number">
            </div>
            <div class="form-group mt-3">
                <label for="price" class="col-md-4">Vehicle Pictures :</label>
                <input type="file" class="form control col-md-6" name="vehicle_pictures[]" multiple>
            </div>
            <div class="row mt-3">
                <div class="col-md-9"></div>
                <div class="col">
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Save</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#showForm').on('click', function() {
                $('#addExternalAdmin').css('display', 'block').animate();
            });
        })
    </script>















    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Vehicle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="vehicleId" id="vehicleId" value="" />
                        <p>Are you sure you want to delete this item ?</p>
                        <button type="submit">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>














    <div class="modal fade" id="Modify">
        <form action="" method="post">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="moda-title">Edit Vehicle</div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-md-4">vehicle registration number :</label>
                            <input type="text" class="form control col-md-6" id="vehicle_registration_number" name="vehicle_registration_number">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-4">vehicle brand :</label>
                            <input type="text" class="form control col-md-6" id="vehicle_brand" name="vehicle_brand">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-4">vehicle power :</label>
                            <input type="text" class="form control col-md-6" id="vehicle_power" name="vehicle_power">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-4">number of places :</label>
                            <input type="text" class="form control col-md-6" id="places_number" name="places_number">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-4">Vehicle Pictures :</label>
                            <input type="file" class="form control col-md-6" id="vehicle_pictures" name="vehicle_pictures">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>




    <!--modal-->
    <script>
        $(document).on("click", ".open-DeleteVehicleTypeDialog", function() {
            var myvehicleId = $(this).data('id');
            $(".modal-body #vehicleId").val(myvehicleId);
        });
    </script>
    <script>
        $(document).on('click', '.edit', function() {
            var id = $(this).closest("tr").find('td.id').text();
            $('#id').val(id);
            var vehicle_registration_number = $(this).closest("tr").find('td.vehicle_registration_number').text();
            $('#vehicle_registration_number').val(vehicle_registration_number);
            var vehicle_brand = $(this).closest("tr").find('td.vehicle_brand').text();
            $('#vehicle_brand').val(vehicle_brand);

            var vehicle_power = $(this).closest("tr").find('td.vehicle_power').text();
            $('#vehicle_power').val(vehicle_power);

            var places_number = $(this).closest("tr").find('td.places_number').text();
            $('#places_number').val(places_number);

            var vehicle_pictures = $(this).closest("tr").find('td.vehicle_pictures').text();
            $('#vehicle_pictures').val(vehicle_pictures);
        });
    </script>
</body>

</html>