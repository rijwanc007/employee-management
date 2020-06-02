@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> Documents
            </h3>
        </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'document.apply','method' => 'POST']) !!}
                <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="control-label">Department</label>
                        <select class="form-control select2" id="department" name="department" required>
                            <option selected disabled value="">Choose An Option</option>
                            <option value="employee">Employee</option>
                            <option value="sale_leader">Sale Leader</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="seller">Seller</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="control-label">User Name</label>
                        <select class="form-control select2" id="em_id" name="em_id" required>
                            <option selected disabled value="">Choose An Option</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top: 4px">
                    <label class="control-label"></label>
                    <button type="submit" class="btn btn-success btn-block">Apply</button>
                </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
      </div>
    </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Department </th>
                                    <th> File Name </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($documents->count() !== 0)
                                @foreach($documents as $document)
                                    <?php
                                       $user_details = \App\User::find($document->user_id);
                                       $documents = explode(',',str_replace(str_split('[]""'),'',$document->document));
                                    ?>
                                <tr>
                                    <td>{{$user_details['name']}}</td>
                                    <td>{{$user_details['email']}}</td>
                                    <td>{{$user_details['account_for']}}</td>
                                    <td>
                                        <table>
                                            @for($i = 0;$i < count(json_decode($document->document),COUNT_NORMAL);$i++)
                                            <tr>
                                                <td><div class="text-info">{{$documents[$i]}}</div></td>
                                                <td>
                                                    <a href="{{asset('assets/images/document/'.$documents[$i])}}" class="btn btn-inverse-success btn-icon" target="_blank"><br/><i class="mdi mdi-eye"></i></a>
                                                </td>
                                            </tr>
                                            @endfor
                                        </table>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['document.destroy',$document->id],'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-inverse-danger btn-icon">
                                            <i class="mdi mdi-delete-forever"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr style="text-align: center">
                                        <td colspan="5"><div class="text-danger">{{'No Data Found'}}</div></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('change','#department',function(){
            $.ajax({
                url : '/department-change',
                data : {department : $(this).val()},
                success : function(data){
                    $('#em_id').empty();
                    $('#em_id').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#em_id').append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                }
            });
        });
    </script>
@endsection
