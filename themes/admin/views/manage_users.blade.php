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
                <th scope="col">Full Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
    @foreach($Users as $User)
        <tr>
            <td class="id" style="display:none;">{{$User->id}}</td>
            <th scope="row">{{$nb+=1}}</td>
            <td class="full_name">{{$User -> name}}</td>
            <td class="email">{{$User -> email}}</td>
            <td>
                <button type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{$User -> id}}" class="open-DeleteVehicleTypeDialog">Delete</button>
            </td>
            @endforeach
        </tr>
    </tbody>
        </table>
    </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="userId" id="userId" value="" />
                        <p>Are you sure you want to delete this User ?</p>
                        <button type="submit">Delete</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <!--modal-->
        <script>
            $(document).on("click", ".open-DeleteVehicleTypeDialog", function() {
                var userId = $(this).data('id');
                $(".modal-body #userId").val(userId);
            });
        </script>
</body>

</html>