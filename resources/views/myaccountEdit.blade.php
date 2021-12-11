@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
        @include('layouts.reports_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                    <h2 class="heading">Edit Account</h2>
                     <p class='profile'>Profile</p>

                     <div class='profile-name'>
                        <form action="{{route('myaccountUpdate')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" name="first_name" value="{{$data->first_name}}">
                                @if($errors->has('first_name'))<span style="color:red;"><div class="error">{{ $errors->first('first_name') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name" value="{{$data->last_name}}">
                                @if($errors->has('last_name'))<span style="color:red;"><div class="error">{{ $errors->first('last_name') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation:</label>
                                <input type="text" class="form-control" name="occupation" value="{{$data->occupation}}">
                                @if($errors->has('occupation'))<span style="color:red;"><div class="error">{{ $errors->first('occupation') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" value="{{$data->email}}">
                                @if($errors->has('email'))<span style="color:red;"><div class="error">{{ $errors->first('email') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" name="location" value="{{$data->location}}">
                                @if($errors->has('location'))<span style="color:red;"><div class="error">{{ $errors->first('location') }}</div></span>@endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </form>              
                    </div>
                </div>
                
                  
                
               


            </div>
        </div>
    </div>
</div>



@include('layouts.footer')

@endsection