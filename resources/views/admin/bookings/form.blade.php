@extends('admin.layouts.main')
@section('container')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    @if (Session::has('success') && Session::has('message'))
                        <div class="alert alert-{{ Session::get('success') == 'true' ? 'success' : 'danger' }} alert-dismissible fade show"
                            role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            {{ Session::get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h5 class="text-center">Book your parcel:</h5>
                    <form action="{{route('booking.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <strong><label for="horizontal-name-input" class="col-sm-3 col-form-label">Pick Up</label></strong>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="pickup" id="horizontal-name-input" placeholder="Enter pick up area here">
                                                @if ($errors->has('pickup'))
                                                    <span class="text-danger">{{ $errors->first('pickup') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <strong><label for="horizontal-name-input" class="col-sm-3 col-form-label">Drop Up</label></strong>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="dropoff" id="horizontal-name-input" placeholder="Enter drop off area here">
                                                @if ($errors->has('dropoff'))
                                                    <span class="text-danger">{{ $errors->first('dropoff') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row justify-content-center">
                            <div class="col-sm-8">
                                <div class="col-sm-12" style="text-align: center;">
                                <button type="submit" class="btn btn-primary w-md">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
