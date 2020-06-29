@extends('adminlte::page')

@section('content_header')
    <br>
    <div class="row">
      <div class="col">
        <h1><i class="fa fa-home mr-3" aria-hidden="true"></i>Post Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Post</a></li>
            </ol>
        </nav>
      </div>
      <div class="col text-right margin-tb">
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
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
                    <th>category</th>
                    <th>author</th>
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
                        <td>{{ $key->category->name }}</td>
                        <td>{{ $key->author->name }}</td>
                        <td><img src="/storage/files/shares/post/{{ $key->image }}" width="130" height="130"></td>
                        <td>{{ $key->updated_at }}</td>
                        <td>{{ $key->status }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('posts.show',$key->id) }}">Show</a>
                            @can('post-edit')
                                <a class="btn btn-primary" href="{{ route('posts.edit',$key->id) }}">Edit</a>
                            @endcan
                            @can('post-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $key->id],'style'=>'display:inline']) !!}
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