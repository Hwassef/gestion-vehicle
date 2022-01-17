<div>
    @if(!empty($successMessage))

    <div class="alert alert-info">

        {{ $successMessage }}
        <br>
        Check the status of your reservation <a href="#">HERE</a>
    </div>

    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Know Your Car</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Fill In Form</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <p>Confirm Your Reservation</p>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">

        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
                <div class="d-flex justify-content-center">
                    <h1 style="letter-spacing: 10px">Know Your Car</h1>
                </div>
                <div>
                    <div class="d-flex flex-column" style="position: absolute;">
                        @for($i = 0; $i<count($picturesInArray);$i++) <div class="p-2">
                            <span>
                                <img src="{{URL::asset('storage/vehicles/'.$picturesInArray[$i])}}" class="rounded float-left" alt="Responsive image" width="50px" height="50px">
                            </span>
                    </div>
                    @endfor
                </div>
                <div class="row">
                    <div class="col-4" style="margin-left: 10%;margin-top: 5%;">
                        <img src="{{URL::asset('storage/vehicles/'.$picturesInArray[0])}}" class="rounded float-left" alt="Responsive image" width="200px" height="200px">
                    </div>
                    <div class="col" style="margin-top: 5%;">
                        <label for="brand" class="mt-3" style="font-size: 22px; letter-spacing: 2px;">Vehicle Brand: {{$details -> vehicle_brand}}</label>
                        <div class="row">
                            <label for="places" class="mt-3" style="font-size: 22px; letter-spacing: 2px;">Vehicle Registration Number: {{$details -> vehicle_registration_number}}</label>
                        </div>
                        <div class="row">
                            <label for="places" class="mt-3" style="font-size: 22px; letter-spacing: 2px;">Vehicle Power: {{$details -> vehicle_power}}</label>
                        </div>
                        <div class="row">
                            <label for="places" class="mt-3" style="font-size: 22px; letter-spacing: 2px;">Vehicle Places Capacity: {{$details -> vehicle_number_of_places}}</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button">Next</button>
            </div>
        </div>
    </div>
</div>

<div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <h1 style="letter-spacing: 10px">Fill In Form</h1>
            </div>
            <form action="{{route('userReserveVehicle',$details -> id)}}" method="POST">
                @csrf
                <div class=" row">
                    <div class="col-3">
                        <label for="">Reservation Period: </label>
                    </div>
                    <div class="col-5">
                        <input type="number" name="reservation_period" wire:model="reservation_period" class="form-control" placeholder="Reservation period...">
                        @error('reservation_period') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-1 d-flex align-items-center" style="border:1px solid black; height:38px;">
                        <div>
                            <input type="radio" name="period" wire:model="period" value="Day"><span style="margin-left:3px;">Days</span>
                        </div>
                    </div>
                    <div class="col-1 d-flex align-items-center" style="border:1px solid; height:38px;">
                        <div>
                            <input type="radio" name="period" wire:model="period" value="Week"><span style="margin-left: 3px;">Weeks</span>
                        </div>
                    </div>
                    <div class="col-1 d-flex align-items-center" style="border:1px solid black; height:38px;">
                        <div>
                            <input type="radio" name="period" wire:model="period" value="Month"><span style="font-size: 14px; margin-left: 3px;">Months</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="">Destination: </label>
                    </div>
                    <div class="col-5">
                        <select class="form-control" wire:model="selectedDestinations" id="destination" multiple="multiple">
                            @foreach($destinations as $destination)
                            <option value="{{$destination}}">{{$destination}}</option>
                            @endforeach
                        </select>
                        @error('destination') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="">Number Of Travels: </label>
                    </div>
                    <div class="col-5">
                        <input type="number" class="form-control" name="number_of_travels" wire:model="number_of_travels">
                        @error('number_of_travels') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </form>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
        </div>
    </div>
</div>
<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Confirm Your Reservation</h3>
            <table class="table">
                <tr>
                    <td>Number Of Travels:</td>
                    <td><strong>{{$number_of_travels}}</strong></td>
                </tr>
                <tr>
                    <td>Destinations: </td>
                    <td>
                        @if(is_array($selectedDestinations))
                        @foreach($selectedDestinations as $selectedDestination)
                        <strong>{{$selectedDestination}}@if($selectedDestination != end($selectedDestinations)),@else @endif </strong>
                        @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Reservation Period:</td>
                    <td><strong>{{$reservation_period}} {{$period}}{{$reservation_period > 1 ? 's' : ''}}</strong></td>
                </tr>

                <tr>
                    <td>Status:</td>
                    <td><strong>{{$state ? 'Approved' : 'Waiting For Admin Approval'}}</strong></td>
                </tr>
            </table>
            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
        </div>
    </div>
</div>
</div>
