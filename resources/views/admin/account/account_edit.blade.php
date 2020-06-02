@extends('master')
@section('content')
    <div class="content-wrapper">
        {!! Form::open(['class' =>'form-sample','route' => ['account.update',$edit->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
        <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Update Account</h3></div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" value="account" name="account_for"/>
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
                        <div class="form-group private_email">
                            <label for="private_email">Private Email</label>
                            <input type="email" class="form-control" id="private_email" name="private_email" value="{{$edit->private_email}}" placeholder="Private Email" required>
                        </div>
                        <div class="form-group phone_display">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$edit->phone}}" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_evening">Phone Evening</label>
                            <input type="text" class="form-control" id="phone_evening" name="phone_evening" value="{{$edit->phone_evening}}" placeholder="Phone Evening" required>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" value="{{$edit->designation}}" placeholder="Designation" required>
                        </div>
                        <div class="form-group">
                            <label for="work_space">Workspace</label>
                            <input type="text" class="form-control" id="work_space" name="work_space" value="{{$edit->work_space}}" placeholder="Workspace" required>
                        </div>
                        <div class="form-group">
                            <label for="nearest_chief">Nearest Chief</label>
                            <input type="text" class="form-control" id="nearest_chief" name="nearest_chief" value="{{$edit->nearest_chief}}" placeholder="Nearest Chief" required>
                        </div>
                        <div class="form-group">
                            <label for="social_security_number">Social Security Number</label>
                            <input type="text" class="form-control" id="social_security_number" name="social_security_number" value="{{$edit->social_security_number}}" placeholder="Social Security Number" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <p class="card-description text-center" style="color:blue;">Address</p>
                            <div class="form-group">
                                <label for="address_one">Address One</label>
                                <input type="text" class="form-control" id="address_one" name="address_one" value="{{$edit_address->address_one}}" placeholder="Address One" required>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="{{$edit_address->state}}" placeholder="State" required>
                            </div>
                            <div class="form-group">
                                <label for="address_two">Address Two</label>
                                <input type="text" class="form-control" id="address_two" name="address_two" value="{{$edit_address->address_two}}" placeholder="Address Two" required>
                            </div>
                            <div class="form-group">
                                <label for="post_code">Post Code</label>
                                <input type="text" class="form-control" id="post_code" name="post_code" value="{{$edit_address->post_code}}" placeholder="Post Code" required>
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{$edit_address->city}}" placeholder="City" required>
                            </div>
                        </div>
                        <div class="form-group contract_start_display">
                            <label for="contract_start">Contract Start</label>
                            <input type="date" class="form-control" id="contract_start" name="contract_start" value="{{$edit->contract_start}}" placeholder="Contract Start" required>
                        </div>
                        <div class="form-group">
                            <label for="contract_end">Contract End</label>
                            <input type="date" class="form-control" id="contract_end" name="contract_end" value="{{$edit->contract_end}}" placeholder="Contract End" required>
                        </div>

                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{$edit->bank_name}}" placeholder="Bank Name" required>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" value="{{$edit->account_number}}" placeholder="Account Number" required>
                        </div>
                        <div class="form-group">
                            <label for="clearing_number">Clearing Number</label>
                            <input type="text" class="form-control" id="clearing_number" name="clearing_number" value="{{$edit->clearing_number}}" placeholder="Clearing Number" required>
                        </div>
                        <div class="form-group">
                            <label for="table_tax">Table Tax</label>
                            <input type="text" class="form-control" id="table_tax" name="table_tax" value="{{$edit->table_tax}}" placeholder="Table Tax" required>
                        </div>
                        <div id="closet_relation_display">
                            <p class="card-description text-center" style="color:blue;">Closest Relative</p>
                            <div class="form-group">
                                <label for="relative_name">Relative Name</label>
                                <input type="text" class="form-control" id="relative_name" name="relative_name" value="{{$edit_relative->relative_name}}" placeholder="Relative Name" required>
                            </div>
                            <div class="form-group">
                                <label for="relative_phone">Relative Phone</label>
                                <input type="text" class="form-control" id="relative_phone" name="relative_phone" value="{{$edit_relative->relative_phone}}" placeholder="Relative Phone" required>
                            </div>
                            <div class="form-group">
                                <label for="relation">Relation</label>
                                <input type="text" class="form-control" id="relation" name="relation" value="{{$edit_relative->relation}}" placeholder="Relation" required>
                            </div>
                        </div>
                        @if($edit_document != null)
                            <?php
                            $document = explode(',',str_replace(str_split('[]""'),'',$edit_document->document));
                            ?>
                            <div id="upload_display">
                                <p class="card-description text-center" style="color:blue;">Document Upload</p>
                                <div class="row" id="add_input_field">
                                    @for($j = 0;$j < count(json_decode($edit_document->document),COUNT_NORMAL);$j++)
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="document">{{$document[$j]}}</label>
                                                <input type="hidden" name="previous_document[]" value="{{$document[$j]}}"/>
                                                <input type="file" class="form-control" id="document" name="document[]" accept=".png, .jpg, .jpeg,.pdf" placeholder="Document" disabled="disabled" required>
                                            </div>
                                            <div class="col-md-1"><button type="button" id='add_file' class="btn btn-inverse-info btn-icon plus_button"><i class="mdi mdi-plus"></i></button></div>
                                            @if($j != 0)
                                                <div class="col-md-1"><button type="button" id="del_file_another" class="btn btn-inverse-danger btn-icon minus_button"><i class="mdi mdi-minus"></i></button></div>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @else
                            <div id="upload_display">
                                <p class="card-description text-center" style="color:blue;">Document Upload</p>
                                <div class="row" id="add_input_field">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="document">Document</label>
                                            <input type="file" class="form-control" id="document" name="document[]" accept=".png, .jpg, .jpeg,.pdf"   placeholder="Document" required>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id='add_file' class="btn btn-inverse-info btn-icon plus_button"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Update Account </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(document).on('click','#add_file',function(){
            $('#add_input_field').append('<div class="row"><div class="col-md-10"><label for="document">Document</label><input type="file" class="form-control" id="document" name="document[]" placeholder="Document" accept=".png, .jpg, .jpeg,.pdf" required></div><div class="col-md-1"><button type="button" id="add_file" class="btn btn-inverse-info btn-icon plus_button"><i class="mdi mdi-plus"></i></button></div><div class="col-md-1"><button type="button" id="del_file" class="btn btn-inverse-danger btn-icon minus_button"><i class="mdi mdi-minus"></i></button></div><div>')
        });
        $(document).on('click','#del_file',function(){
            $(this).parent().parent().remove();
        });
        $(document).on('click','#del_file_another',function(){
            $(this).parent().parent().remove();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
@endsection
