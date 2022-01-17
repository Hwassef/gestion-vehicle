@include('layouts.app')

<body>
    <div class="container" style="margin-top: 3%;">
        <div style="margin-top: 15px; position:flex">
            <div class="d-flex justify-content-center">
                <div class="row ">
                    <h4 style="letter-spacing: 13px;"> Choose Your Vehicle</h4>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="row">
                    <h4 style="letter-spacing: 10px;">Make A Reservation</h4>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="row">
                    <h4 style="letter-spacing: 7px;">Enjoy Your Ride</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($Vehicles as $Vehicle)
            <?php
            $picturesInArray = array();
            $picturesInArray = explode("|", $Vehicle->vehicle_pictures);
            ?>
            <div class="col-4">
                <div class="card card-body h-100">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block card-img-top" src="{{ URL::asset('storage/vehicles/'.$picturesInArray[0])}}" width="230px" height="230px">
                            </div>
                            @for($i = 1; $i<count($picturesInArray);$i++) <div class="carousel-item ">
                                <img class="d-block card-img-top" src="{{ URL::asset('storage/vehicles/'.$picturesInArray[$i])}}" width="230px" height="230px">
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="card-body m-0">
                    <h5 class="card-title">
                        <span style="color: #407CAC;"> Vehicle Brand: </span>{{$Vehicle -> vehicle_brand}}
                    </h5>
                </div>
                <div class="footer row">
                    <a class="btn btn-primary" href="/vehicles/reserve/{{$Vehicle -> id}}">More Information</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end mt-5">
        {{$Vehicles -> links()}}
    </div>
    </div>
</body>