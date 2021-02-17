@extends('main.master')

@section('title',$data->title)

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