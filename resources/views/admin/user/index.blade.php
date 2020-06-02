@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> All User List </h3>
        </div>
        {!! Form::open(['route' => 'select.role.apply','method' => 'POST']) !!}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">Department</label>
                                    <select class="form-control select2" name="select_role" required>
                                        <option selected disabled value="">Choose An Option</option>
                                        <option value="hr">HR</option>
                                        <option value="account">Account</option>
                                        <option value="sale_leader">Sale Leader</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="employee">Employee</option>
                                        <option value="seller">Seller</option>
                                        <option value="client">Client</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 5px">
                                <label class="control-label"></label>
                                <button type="submit" class="btn btn-success btn-block">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th> Availability </th>
                                <th> Name </th>
                                <th> Designation </th>
                                <th> Department </th>
                                <th> Email </th>
                                <th> Contact Number </th>
                                <th> Contract Start </th>
                                <th> Contract End </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users->count() !==0 )
                            @foreach($users as $user)
                            <tr>
                                @if($user->status == 'checked')
                                <td> <label class="badge badge-success">Online</label> </td>
                                @else
                                <td> <label class="badge badge-danger">Offline</label> </td>
                                @endif
                                <td> {{$user->name}} </td>
                                @if($user->designation !== null)
                                <td> {{$user->designation}} </td>
                                @else
                                <td> Client </td>
                                @endif
                                <td>{{$user->account_for}}</td>
                                <td> {{$user->email}} </td>
                                <td> {{$user->phone}} </td>
                                <td> {{$user->contract_start}} </td>
                                <td> {{$user->contract_end}} </td>
                                <td>
                                    <table>
                                            @if($user->account_for == 'hr')
                                            <tr>
                                                @can('hr_show',Auth::user())
                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('hr.show',$user->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                @endcan
                                                @can('hr_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('hr.edit',$user->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('hr_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['hr.destroy',$user->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                            @elseif($user->account_for == 'account')
                                            <tr>
                                                @can('account_show',Auth::user())
                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('account.show',$user->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                @endcan
                                                @can('account_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('account.edit',$user->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('account_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['account.destroy',$user->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                            @elseif($user->account_for == 'employee')
                                            <tr>
                                                @can('employee_show',Auth::user())
                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('employee.show',$user->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                @endcan
                                                @can('employee_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('employee.edit',$user->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('employee_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['employee.destroy',$user->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                            @elseif($user->account_for == 'sale_leader')
                                            <tr>
                                                @can('sale_leader_show',Auth::user())
                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('sale_leader.show',$user->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                @endcan
                                                @can('sale_leader_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('sale_leader.edit',$user->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('sale_leader_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['sale_leader.destroy',$user->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                            @elseif($user->account_for == 'supervisor')
                                            <tr>
                                                @can('supervisor_show',Auth::user())
                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('supervisor.show',$user->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                @endcan
                                                @can('supervisor_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('supervisor.edit',$user->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('supervisor_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['supervisor.destroy',$user->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                            @elseif($user->account_for == 'seller')
                                            <tr>
                                                @can('seller_show',Auth::user())
                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('seller.show',$user->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                @endcan
                                                @can('seller_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('seller.edit',$user->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('seller_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['seller.destroy',$user->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                            @elseif($user->account_for == 'client')
                                            <tr>
                                                @can('client_show',Auth::user())
                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('client.show',$user->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                @endcan
                                                @can('client_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('client.edit',$user->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('client_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['client.destroy',$user->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                            @endif
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr style="text-align: center">
                                <td colspan="8"><div class="text-danger">{{'No Data Found'}}</div></td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

