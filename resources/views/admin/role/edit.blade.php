@extends('master')
@section('content')
    {!! Form::open(['route'=>['role.update',$role_data->id],'method'=>'PUT']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-info">Update Role<hr/></h2>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="role_name">Role Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="role_name" readonly placeholder="Update Role Name" value="{{$role_data->role_name}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-control text-center">Dashboard</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='dashboard')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach
                                >
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">User</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='user')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">HR</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='hr')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Account</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='account')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Employee</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='employee')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Sale Leader</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='sale_leader')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Supervisor</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='supervisor')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Seller</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='seller')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach
                                >
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Client</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='client')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Time Report</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='time_report')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Salary Approved</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='salary_approved')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Salary</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='salary')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Document</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='document')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Offert</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='offert')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <label class="form-control text-center">Role</label>
                    @foreach($permissions as $permission)
                        @if($permission->permission_for =='role')
                            <div class="checkbox">
                                <input class="styled-checkbox" type="checkbox" id="styled-checkbox-{{$permission->id}}" name="permission[]" value="{{$permission->id}}"
                                       @foreach($role as $permit)
                                       @if($permit->id==$permission->id)
                                       checked
                                        @endif
                                        @endforeach>
                                <label for="styled-checkbox-{{$permission->id}}"></label>
                                <span class="check-label-name text-info">{{$permission->permission_name}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-info btn-lg btn-block">Update</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
