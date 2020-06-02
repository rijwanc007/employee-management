@extends('master')
@section('content')
    <div class="content-wrapper">
        {!! Form::open(['class' =>'form-sample']) !!}
        <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New User</h3></div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="select_role">Select Role</label>
                            <select class="form-control" id="select_role">
                                <option selected disabled value="">Choose An Option</option>
                                <option value="HR">HR</option>
                                <option value="Account">Account</option>
                                <option value="Employee">Employee</option>
                                <option value="Sale Leader">Sale Leader</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Seller">Seller</option>
                                <option value="Client">Client</option>
                            </select>
                        </div>
                        <script>
                            {{--HR,ACCOUNT,Sale Leader,Supervisor :--}}
                            {{--$(document).on('change','#select_role',function(){--}}
                            {{--   if($(this).val() == 'HR' || $(this).val() == 'Account' || $(this).val() == 'Employee' || $(this).val() == 'Sale Leader' || $(this).val() == 'Supervisor' || $(this).val())--}}
                            {{--});--}}
                        </script>
                        <div id="profile_picture_display">
                            <label for="select_role" >Upload Profile Picture</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group last_name_display">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>

                        <div class="form-group password_display">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div class="form-group private_email">
                            <label for="private_email">Private Email</label>
                            <input type="text" class="form-control" id="private_email" name="private_email" placeholder="Private Email">
                        </div>

                        <div class="form-group">
                            <label for="invoice_email">Invoice Email</label>
                            <input type="text" class="form-control" id="invoice_email" name="invoice_email" placeholder="Invoice Email">
                        </div>

                        <div class="form-group phone_display">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="phone_evening">Phone Evening</label>
                            <input type="text" class="form-control" id="phone_evening" name="phone_evening" placeholder="Phone Evening">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label for="work_space">Workspace</label>
                            <input type="text" class="form-control" id="work_space" name="work_space" placeholder="Workspace">
                        </div>
                        <div class="form-group">
                            <label for="nearest_chief">Nearest Chief</label>
                            <input type="text" class="form-control" id="nearest_chief" name="nearest_chief" placeholder="Nearest Chief">
                        </div>
                        <div class="form-group">
                            <label for="social_security_number">Social Security Number</label>
                            <input type="text" class="form-control" id="social_security_number" name="social_security_number" placeholder="Social Security Number">
                        </div>
                        <div>
                            <p class="card-description text-center" style="color:blue;">Address</p>
                            <div class="form-group">
                                <label for="address_one">Address One</label>
                                <input type="text" class="form-control" id="address_one" name="address_one" placeholder="Address One">
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State">
                            </div>
                            <div class="form-group">
                                <label for="address_two">Address Two</label>
                                <input type="text" class="form-control" id="address_two" name="address_two" placeholder="Address Two">
                            </div>
                            <div class="form-group">
                                <label for="post_code">Post Code</label>
                                <input type="text" class="form-control" id="post_code" name="post_code" placeholder="Post Code">
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="employee_type">Employee Type</label>
                            <select class="form-control" id="employee_type">
                                <option selected disabled value="">Choose An Option</option>
                                <option value="FULL">Full Time</option>
                                <option value="HALF">Half Time</option>
                                <option value="HOUR">Per Hour</option>
                                <option value="PROJ">Per Project</option>
                            </select>
                        </div>
                        <div class="form-group contract_start_display">
                            <label for="contract_start">Contract Start</label>
                            <input type="date" class="form-control" id="contract_start" name="contract_start" placeholder="Contract Start">
                        </div>
                        <div class="form-group">
                            <label for="contract_end">Contract End</label>
                            <input type="date" class="form-control" id="contract_end" name="contract_end" placeholder="Contract End">
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number">
                        </div>
                        <div class="form-group">
                            <label for="clearing_number">Clearing Number</label>
                            <input type="text" class="form-control" id="clearing_number" name="clearing_number" placeholder="Clearing Number">
                        </div>
                        <div class="form-group">
                            <label for="table_tax">Table Tax</label>
                            <input type="text" class="form-control" id="table_tax" name="table_tax" placeholder="Table Tax">
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                        </div>
                        <div class="form-group">
                            <label for="contact_person">Contact Person</label>
                            <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person">
                        </div>
                        <div class="form-group">
                            <label for="organization_number">Organization Number</label>
                            <input type="text" class="form-control" id="organization_number" name="organization_number" placeholder="Organization Number">
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                        </div>

                        <div class="form-group">
                            <label for="work_under">Work Under</label>
                            <select class="form-control" id="work_under">
                                <option selected disabled value="">Choose An Option</option>
                                <option value="SUP">Supervisor Names</option>

                            </select>
                        </div>
                        <div id="closet_relation_display">
                            <p class="card-description text-center" style="color:blue;">Closest Relative</p>
                            <div class="form-group">
                                <label for="relative_name">Relative Name</label>
                                <input type="text" class="form-control" id="relative_name" name="relative_name" placeholder="Relative Name">
                            </div>
                            <div class="form-group">
                                <label for="relative_phone">Relative Phone</label>
                                <input type="text" class="form-control" id="relative_phone" name="relative_phone" placeholder="Relative Phone">
                            </div>
                            <div class="form-group">
                                <label for="relation">Relation</label>
                                <input type="text" class="form-control" id="relation" name="relation" placeholder="Relation">
                            </div>
                        </div>
                        <div id="upload_display">
                            <p class="card-description text-center" style="color:blue;">Document Upload</p>
                            <div class="row" id="add_input_field">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="document">Document</label>
                                        <input type="file" class="form-control" id="document" name="document[]" placeholder="Document">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" id='add_file' class="btn btn-inverse-info btn-icon plus_button"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div id="service_display">
                            <p class="card-description text-center" style="color:blue;">Services</p>
                            <div class="row" id="add_input_field_two">
                                <div class="row"><div class="col-md-3"><div class="form-group"><label for="active_service">Active Service</label><input type="text" class="form-control" id="active_service" name="active_service[]" placeholder="Active Service"></div></div><div class="col-md-3"><div class="form-group"><label for="service_start">Service Start</label><input type="date" class="form-control" id="service_start" name="service_start[]" placeholder="Service Start"></div></div><div class="col-md-3"><div class="form-group"><label for="service_end">Service End</label><input type="date" class="form-control" id="service_end" name="service_end[]" placeholder="Service End"></div></div><div class="col-md-1"><button type="button" id='add_file_two' class="btn btn-inverse-info btn-icon plus_button"><i class="mdi mdi-plus"></i></button></div></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prospect_service">Prospect service</label>
                            <input type="text" class="form-control" id="prospect_service" name="prospect_service" placeholder="Prospect service">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/>
        <div class="row" id="create_user_button">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create User </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(document).on('click','#add_file',function(){
            $('#add_input_field').append('<div class="row"><div class="col-md-10"><label for="document">Document</label><input type="file" class="form-control" id="document" name="document[]" placeholder="Document" required></div><div class="col-md-1"><button type="button" id="add_file" class="btn btn-inverse-info btn-icon plus_button"><i class="mdi mdi-plus"></i></button></div><div class="col-md-1"><button type="button" id="del_file" class="btn btn-inverse-danger btn-icon minus_button"><i class="mdi mdi-minus"></i></button></div><div>')
        });
        $(document).on('click','#del_file',function(){
            $(this).parent().parent().remove();
        });
        $(document).on('click','#add_file_two',function(){
            $('#add_input_field_two').append('<div class="row"><div class="col-md-4"><div class="form-group"><label for="active_service">Active Service</label><input type="text" class="form-control" id="active_service" name="active_service[]" placeholder="Active Service" required></div></div><div class="col-md-3"><div class="form-group"><label for="service_start">Service Start</label><input type="date" class="form-control" id="service_start" name="service_start[]" placeholder="Service Start" required></div></div><div class="col-md-3"><div class="form-group"><label for="service_end">Service End</label><input type="date" class="form-control" id="service_end[]" name="service_end" placeholder="Service End" required></div></div><div class="row"><button type="button" id="add_file_two" class="btn btn-inverse-info btn-icon minus_button_two"><i class="mdi mdi-plus"></i></button><button type="button" id="del_file_two" class="btn btn-inverse-danger btn-icon minus_button_two"><i class="mdi mdi-minus"></i></button></div></div>')
        });
        $(document).on('click','#del_file_two',function(){
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
