@extends('main.master')

@section('title',$data->title)

@section('header_text')
<p>by : {{$data->Author->name}}</p> 
<br>
<p><i class="fas fa-tag"></i> Category : <a href="#"> {{$data->category->name}} </a></p>
@endsection

@section('cover')
    style="background-image: url('/storage/files/shares/post/{{$data->image}}');"
@endsection

@section('main')
    <main class="py-5">
        <div class="container">
            <div class="row">
                {!! $data->body !!}
            </div>
        </div>
    </main>
@endsection