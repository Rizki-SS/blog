@extends('adminlte::page')

@section('content_header')
    <br>
    <div class="row">
      <div class="col">
        <h1><i class="fa fa-home mr-3" aria-hidden="true"></i>Create New Post</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Post</a></li>
                <li class="breadcrumb-item"><a href="#">Create</a></li>
            </ol>
        </nav>
      </div>
      <div class="col text-right margin-tb">
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('posts.index') }}"> back</a>
        </div>
      </div>
    </div>
    <br>
</nav>
@stop

@section('content')
{!! Form::open(array('route' => 'posts.store','method'=>'POST','files'=>true)) !!}

{{-- <form action="adaf" method="get"> --}}

<div class="row">
{!! Form::hidden('author_id', Auth::user()->id) !!}
<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>title:</strong>
                        {!! Form::text('title', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="my-input">Text</label>
                        {!! Form::textarea('body', null, array('placeholder' => 'Name','class' => 'form-control textarea')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="status">status</label>
                {!! Form::select('status', ['publish'=>'publish','draf'=>'draf'], [], array('class' => 'form-control')) !!}
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="category">Category</label>
                {!! Form::select('category_id', $category, [], array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="image">image</label>
                {!! Form::file('image', array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="seo-title">seo title</label>
                {!! Form::text('seo_title', null, array('class' => 'form-control')) !!}
                <label for="meta_keyword">meta keyword</label>
                {!! Form::text('meta_keyword', null, array('class' => 'form-control')) !!}
                <label for="meta_description">meta_description</label>
                {!! Form::textarea('meta_description', null, array('class' => 'form-control h-25')) !!}
            </div>
        </div>
    </div>
</div>
</div>
{!! Form::close() !!}
@endsection

@section('plugins.summer_note', true);

@section('js')
    <script>
        $(function () {
            $('.textarea').summernote({
                height: 711.063,
            })
        })
    </script>
@endsection