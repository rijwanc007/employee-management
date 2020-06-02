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
                        @can('client_edit',Auth::user())
                        <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('client.edit',$details->id)}}'"><i class="mdi mdi-pencil"></i></button>
                        @endcan
                        <div class="container">
                            <div class="avatar-upload">
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{asset('assets/images/user/'.$details->image)}});">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">{{$details['name']}}</h4>
                        <p class="card-description">Designation : {{$details['designation']}} </p>
                        <p class="card-description">Employee Type : {{$details['employee_type']}}</p>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td> Contract Start </td>
                                <td> {{$details['contract_start']}} </td>
                            </tr>
                            <tr>
                                <td> Contract End </td>
                                <td> {{$details['contract_end']}} </td>
                            </tr>
                            </tbody>
                        </table>
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
                                <td>First Name</td>
                                <td>{{$details['first_name']}}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{$details['last_name']}}</td>
                            </tr>
                            <tr>
                                <td>Social Security Number</td>
                                <td>{{$details['social_security_number']}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$details['email']}}</td>
                            </tr>
                            <tr>
                                <td>Private Email</td>
                                <td>{{$details['private_email']}}</td>
                            </tr>
                            <tr>
                                <td>Invoice Email</td>
                                <td>{{$details['invoice_email']}}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{$details['phone']}}</td>
                            </tr>
                            <tr>
                                <td>Phone Evening</td>
                                <td>{{$details->phone_evening}}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>{{$details['designation']}}</td>
                            </tr>
                            <tr>
                                <td>Workspace</td>
                                <td>{{$details->workspace}}</td>
                            </tr>
                            <tr>
                                <td>Nearest Chief</td>
                                <td>{{$details->nearest_chief}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Address One</td>
                                <td>{{$address_details->address_one}}</td>
                            </tr>
                            <tr>
                                <td>Address Two</td>
                                <td>{{$address_details->address_two}}</td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>{{$address_details->state}}</td>
                            </tr>
                            <tr>
                                <td>Post Code</td>
                                <td>{{$address_details->post_code}}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{$address_details->city}}</td>
                            </tr>
                            <tr>
                                <td>Bank Name</td>
                                <td>{{$address_details->bank_name}}</td>
                            </tr>
                            <tr>
                                <td>Account Number</td>
                                <td>{{$details->account_number}}</td>
                            </tr>
                            <tr>
                                <td>Clearing Number</td>
                                <td>{{$details->clearing_number}}</td>
                            </tr>
                            <tr>
                                <td>Table Tax</td>
                                <td>{{$details->table_tax}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Work Under</td>
                                <td>{{$details->work_under}}</td>
                            </tr>
                            <tr>
                                <td>Company Name</td>
                                <td>{{$details->company_name}}</td>
                            </tr>
                            <tr>
                                <td>Contact Person</td>
                                <td>{{$details->contact_person}}</td>
                            </tr>
                            <tr>
                                <td>Organization Number</td>
                                <td>{{$details->organization_number}}</td>
                            </tr>
                            <tr>
                                <td>URL</td>
                                <td>{{$details->url}}</td>
                            </tr>
                            <tr>
                                <td>Relative Name</td>
                                <td>{{$relative_details->relaive_name}}</td>
                            </tr>
                            <tr>
                                <td>Relative Phone</td>
                                <td>{{$relative_details->relative_phone}}</td>
                            </tr>
                            <tr>
                                <td>Relation</td>
                                <td>{{$relative_details->relation}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    @if($document_details != null)
                        <?php
                        $document = explode(',',str_replace(str_split('[]""'),'',$document_details->document));
                        ?>
                        <div class="card-body">
                            <p class="card-description text-center" style="color:blue;">Documents</p>
                            <div class="row">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> File Name </th>
                                        <th> view </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($j = 0;$j < count(json_decode($document_details->document),COUNT_NORMAL);$j++)
                                        <tr>
                                            <td> {{$document[$j]}} </td>
                                            <td>
                                                <a href="{{asset('assets/images/document/'.$document[$j])}}" class="btn btn-inverse-success btn-icon" target="_blank"><br/><i class="mdi mdi-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    @if($service_details != null)
                        <?php
                        $active_service = explode(',',str_replace(str_split('[]""'),'',$service_details->active_service));
                        $service_start = explode(',',str_replace(str_split('[]""'),'',$service_details->service_start));
                        $service_end = explode(',',str_replace(str_split('[]""'),'',$service_details->service_end));
                        ?>
                        <div class="card-body">
                            <p class="card-description text-center" style="color:blue;">Services</p>
                            <div class="row">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Active Service </th>
                                        <th> Service Start </th>
                                        <th> Service End </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i = 0;$i < count(json_decode($service_details->service_start),COUNT_NORMAL);$i++)
                                        <tr>
                                            <td> {{$active_service[$i]}} </td>
                                            <td> {{$service_start[$i]}} </td>
                                            <td> {{$service_end[$i]}} </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <br/>
                            <div class="row">
                                <div>Prospect service : {{$service_details->prospect_service}}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection



