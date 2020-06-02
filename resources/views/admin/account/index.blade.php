@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> Account List
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
                                        <th> Availability </th>
                                        <th> Name </th>
                                        <th> Designation </th>
                                        <th> Email </th>
                                        <th> Contact Number </th>
                                        <th> Contract Start </th>
                                        <th> Contract End </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($accounts->count() !==0 )
                                        @foreach($accounts as $account)
                                            <tr>
                                                @if($account->status == 'checked')
                                                    <td> <label class="badge badge-success">Online</label> </td>
                                                @else
                                                    <td> <label class="badge badge-danger">Offline</label> </td>
                                                @endif
                                                <td> {{$account->name}} </td>
                                                @if($account->designation !== null)
                                                    <td> {{$account->designation}} </td>
                                                @else
                                                    <td> Client </td>
                                                @endif
                                                <td> {{$account->email}} </td>
                                                <td> {{$account->phone}} </td>
                                                <td> {{$account->contract_start}} </td>
                                                <td> {{$account->contract_end}} </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @can('account_show',Auth::user())
                                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('account.show',$account->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                            @endcan
                                                            @can('account_edit',Auth::user())
                                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('account.edit',$account->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                            @endcan
                                                            @can('account_delete',Auth::user())
                                                                <td>
                                                                    {!! Form::open(['route' =>['account.destroy',$account->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                                        <i class="mdi mdi-delete-forever"></i>
                                                                    </button>
                                                                    {!! Form::close() !!}
                                                                </td>
                                                            @endcan
                                                        </tr>
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
                                {!! $accounts->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
