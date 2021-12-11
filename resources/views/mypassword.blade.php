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
                    <h2 class="heading">Change Password</h2>
                     <p class='profile'>Profile</p>
                     <div class='profile-name'>
                        <form action="{{route('mypasswordUpdate')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" Placeholder="Enter Password">
                                @if($errors->has('password'))<span style="color:red;"><div class="error">{{ $errors->first('password') }}</div></span>@endif
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" class="form-control" name="confirm_password" Placeholder="Enter Confirm Password">
                                @if($errors->has('confirm_password'))<span style="color:red;"><div class="error">{{ $errors->first('confirm_password') }}</div></span>@endif
                                
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