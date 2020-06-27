@extends('adminlte::page')
{{-- @extends('layouts.app') --}}

@section('content_header')
    <br>
    <div class="row">
      <div class="col">
        <h1><i class="fa fa-home mr-3" aria-hidden="true"></i>Users Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
            </ol>
        </nav>
      </div>
      <div class="col text-right margin-tb">
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
      </div>
    </div>
    <br>
</nav>
@stop

@section('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        
    </div>
</div>
<br> --}}


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="card">
  <div class="card-body">
    
    <table class="table" id="table-data">
    <thead>
      <tr>
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th>avatar</th>
      <th>Roles</th>
      <th width="280px">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $user)
      <tr>
        {{-- <td>{{ ++$i }}</td> --}}
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td><img src="/storage/files/shares/avatar/{{ $user->avatar }}" width="100px"></td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
          <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
    </tbody>
    </table>

   </div>
   //pagnition
    {{-- {!! $data->render() !!} --}}
</div>
@endsection

@section('plugins.Datatables', true)

@section('js')
    <script>
      $(document).ready( function () {
          $('#table-data').DataTable();
      } );
    </script>
@stop
