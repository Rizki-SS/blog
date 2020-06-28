@extends('adminlte::page')

@section('content_header')
    <br>
    <div class="row">
      <div class="col">
        <h1><i class="fa fa-home mr-3" aria-hidden="true"></i>Categories Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
            </ol>
        </nav>
      </div>
      <div class="col text-right margin-tb">
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
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
                    <th>No</th>
                    <th>Category</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a> --}}
                            @can('category-edit')
                                <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                            @endcan
                            @can('category-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
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
