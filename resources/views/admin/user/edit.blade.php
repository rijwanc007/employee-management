@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['user.update',$edit->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
    <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>Update</h3></div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" value="hr" name="account_for"/>
                    <div id="profile_picture_display">
                        <label for="select_role" >Upload Profile Picture</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{asset('assets/images/user/'.$edit->image)}});">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$edit->first_name}}" placeholder="First Name" required>
                    </div>
                    <div class="form-group last_name_display">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$edit->last_name}}" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$edit->email}}" placeholder="Email" required>
                    </div>
                    <div class="form-group password_display">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Update </button>
        </div>
    </div>
    <br/>
    {!! Form::close() !!}
    @endsection