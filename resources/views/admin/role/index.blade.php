@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> Role List
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($roles->count() !==0 )
                                        @foreach($roles as $role)
                                            <tr>
                                                <td> {{$role->role_name}} </td>
                                                <td>
                                                @can('role_edit',Auth::user())
                                                <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('role.edit',$role->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                @endcan
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
                                {!! $roles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

