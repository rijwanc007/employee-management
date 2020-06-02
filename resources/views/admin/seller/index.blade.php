@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> Seller List
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
                                    @if($sellers->count() !==0 )
                                        @foreach($sellers as $seller)
                                            <tr>
                                                @if($seller->status == 'checked')
                                                    <td> <label class="badge badge-success">Online</label> </td>
                                                @else
                                                    <td> <label class="badge badge-danger">Offline</label> </td>
                                                @endif
                                                <td> {{$seller->name}} </td>
                                                @if($seller->designation !== null)
                                                    <td> {{$seller->designation}} </td>
                                                @else
                                                    <td> Client </td>
                                                @endif
                                                <td> {{$seller->email}} </td>
                                                <td> {{$seller->phone}} </td>
                                                <td> {{$seller->contract_start}} </td>
                                                <td> {{$seller->contract_end}} </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @can('seller_show',Auth::user())
                                                                <td><button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('seller.show',$seller->id)}}'"> <i class="mdi mdi-eye"></i></button></td>
                                                            @endcan
                                                            @can('seller_edit',Auth::user())
                                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('seller.edit',$seller->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                            @endcan
                                                            @can('seller_delete',Auth::user())
                                                                <td>
                                                                    {!! Form::open(['route' =>['seller.destroy',$seller->id],'method' => 'DELETE']) !!}
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
                                {!! $sellers->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
