@extends('adminlte::page')

@section('content_header')
    <br>
    <div class="row">
      <div class="col">
        <h1><i class="fa fa-home mr-3" aria-hidden="true"></i>Roles Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Roles</a></li>
            </ol>
        </nav>
      </div>
      <div class="col text-right margin-tb">
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        </div>
      </div>
    </div>
    <br>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table" id="table-data">
        <thead>
            <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                {{-- <td>{{ ++$i }}</td> --}}
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>


        {{-- {!! $roles->render() !!} --}}

    </div>
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
