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

    <div class="container-fluid m-0">

        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Type Name</th>
                <th scope="col">Tarif</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach($VehicleTypes as $VehicleType)
                <tr>
                    <td class="id" style="display:none;">{{$VehicleType->id}}</td>
                    <th scope="row">{{$nb+=1}}</td>
                    <td class="type_name">{{$VehicleType -> type_name}}</td>
                    <td class="tarif">{{$VehicleType -> tarif}}</td>
                    <td>
                        <button type="submit" class="edit" data-toggle="modal" data-target="#Modify" data-id="{{$VehicleType -> id}}">Edit</button>
                        <button type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{$VehicleType -> id}}" class="open-DeleteVehicleTypeDialog">Delete</button>
                    </td>

                    @endforeach
                </tr>
            </tbody>
        </table>

    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Vehicle Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="test.store">
                            <input type="hidden" name="vehicleId" id="vehicleId" value="" />
                            <p>Are you sure you want to delete this item ?</p>
                            <button type="submit">Delete</button>
                        </form>
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
                        <div class="moda-title">Edit Product</div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-md-4">Vehicle Type Name :</label>
                            <input type="text" class="form control col-md-6" id="name" name="type_name">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-4">Tarif :</label>
                            <input type="text" class="form control col-md-6" id="price" name="tarif">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Vehicle Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Vehicle Type :</label>
                            <input type="text" class="form-control" placeholder="Enter vehicle type" name="vehicle_type">
                        </div>
                        <div class="form-group">
                            <label for="Tarif">Tarif :</label>
                            <input type="number" class="form-control" name="tarif" placeholder="Tarifs">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JS code -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--JS below-->


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
            var name = $(this).closest("tr").find('td.type_name').text();
            $('#name').val(name);
            var price = $(this).closest("tr").find('td.tarif').text();
            $('#price').val(price);
        });
    </script>
</body>

</html>