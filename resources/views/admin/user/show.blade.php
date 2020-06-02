@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> View Profile
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('user.edit',$details->id)}}'"><i class="mdi mdi-pencil"></i></button>
                        <div class="container">
                            <div class="avatar-upload">
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{asset('assets/images/user/'.$details->image)}});">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">{{$details['name']}}</h4>
                        <p class="card-description">Designation : {{'Admin'}} </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 for="profile_info">Profile Information</h3>
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$details['email']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



