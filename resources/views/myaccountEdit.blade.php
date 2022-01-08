@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
        @include('layouts.reports_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 agenda-form my_account">
                    <h2 class="heading text-center">Edit Account</h2>
                     <p class='profile text-center'>Profile</p>

                     <div class='profile-name agenda-box-shadow'>
                        <form action="{{route('myaccountUpdate')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-controls" name="first_name" value="{{$data->first_name}}">
                                @if($errors->has('first_name'))<span style="color:red;"><div class="error">{{ $errors->first('first_name') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-controls" name="last_name" value="{{$data->last_name}}">
                                @if($errors->has('last_name'))<span style="color:red;"><div class="error">{{ $errors->first('last_name') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation:</label>
                                <input type="text" class="form-controls" name="occupation" value="{{$data->occupation}}">
                                @if($errors->has('occupation'))<span style="color:red;"><div class="error">{{ $errors->first('occupation') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-controls" name="email" value="{{$data->email}}">
                                @if($errors->has('email'))<span style="color:red;"><div class="error">{{ $errors->first('email') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="location">Country:</label>
                                <select class="form-controls" id="country" name="country_id" aria-invalid="false">
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}"
                                        @if($data->country_id == $country->id)
                                            selected
                                        @endif
                                    >{{$country->name}}</option>
                                     @endforeach
                                </select>
                                @if($errors->has('country_id'))<span style="color:red;"><div class="error">{{ $errors->first('country_id') }}</div></span>@endif
                            </div>
                            <div class="form-group">
                                <label for="location">State/Province:</label>
                                <select class="form-controls" id="location" name="location" aria-invalid="false">
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}"
                                        @if($data->location == $state->id)
                                            selected
                                        @endif
                                    >{{$state->name}}</option>
                                     @endforeach
                                </select>
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
<script>
    $("#country").change(function(){
        var country =  $(this).val();
        $.ajax({
            type: "POST", 
            url: "{{ route('getStates') }}",
            data: { country_id: country},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(res) {
                res = JSON.parse(res);
                $("#location").html(res.html);
            }
        });
    });
</script>
@endsection