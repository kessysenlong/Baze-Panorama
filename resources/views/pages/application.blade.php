@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Apply to publish with us</h3></div>

                <div class="card-body">
                    

                <form method="POST" action="{{route('apply')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Your Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    <div class="form-group row">
                            <label for="Role" class="col-md-4 col-form-label text-md-right">Your role:</label>

                            <div class="col-md-6">
                                    <select class="custom-select custom-select-sm" id="role" name="role">
                                        <option value="staff" selected>Staff</option>
                                        <option value="student">Student</option>
                                    </select>
                            </div>
                    </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Your Baze Email:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">Why publish with us?</label>

                            <div class="col-md-6">
                                {{-- <input id="body" type="textarea" class="form-control" name="body" required> --}}
                                <textarea name="body" id="body" class="form-control" rows="10" placeholder="Tell us why you want to publish on this portal."></textarea>

                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection