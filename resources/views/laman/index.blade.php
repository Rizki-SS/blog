@extends('adminlte::page')

@section('content_header')
    <br>
    <div class="row">
      <div class="col">
        <h1><i class="fa fa-home mr-3" aria-hidden="true"></i>Laman Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Laman</a></li>
            </ol>
        </nav>
      </div>
      <div class="col text-right margin-tb">
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('lamans.create') }}"> Create New laman</a>
        </div>
      </div>
    </div>
    <br>
@endsection


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
                    <th>id</th>
                    <th>title</th>
                    <th>image</th>
                    <th>updated at</th>
                    <th>status</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key)
                    <tr>
                        <td>{{ $key->id }}</td>
                        <td>{{ $key->title}}</td>
                        <td><img src="/storage/files/shares/laman/{{ $key->image }}" width="130" height="130"></td>
                        <td>{{ $key->updated_at }}</td>
                        <td>{{ $key->status }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('laman_page',[$key->url]) }}">Show</a>
                            @can('laman-edit')
                                <a class="btn btn-primary" href="{{ route('lamans.edit',$key->id) }}">Edit</a>
                            @endcan
                            @can('laman-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['lamans.destroy', $key->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

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