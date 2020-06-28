@extends('adminlte::page')

@section('content_header')
    <br>
    <div class="row">
      <div class="col">
        <h1><i class="fa fa-home mr-3" aria-hidden="true"></i>Update Category</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category</a></li>
                <li class="breadcrumb-item"><a href="#">Update</a></li>
            </ol>
        </nav>
      </div>
      <div class="col text-right margin-tb">
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('categories.index') }}"> back</a>
        </div>
      </div>
    </div>
    <br>
</nav>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($data, ['method' => 'PATCH','route' => ['categories.update', $data->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection