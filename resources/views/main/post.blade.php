@extends('main.master')

@section('title','app name')

@section('header_text')
    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque illum doloribus cupiditate enim, sequi debitis dolore quam alias voluptatem magnam molestias sapiente porro quia sit autem aut, facilis fuga quis!</p>
@endsection

@section('main')
    <main class="text-center py-5">
        <div class="container">
            <div class="row mb-2">
                <div class="col-lg-9">
                    @foreach ($post as $item)
                        <div class="row">
                        <div class="card mb-3 ml-3 mr-3 w-100">
                            <div class="card-body text-left">
                                <div class="row">
                                    <div class="col-sm">
                                    <img src="/storage/files/shares/post/{{$item->image}}" class="w-100" height="200px" alt="Card image cap">
                                    </div>
                                    <div class="col align-left"  style="height: 200px;">
                                            <h4 class="card-title"><a href={{ route('single_post',[$item->created_at->year,$item->created_at->month,$item->url]) }} >
                                                {{ substr(strip_tags($item->title), 0, 50) }}
                                                {{ strlen(strip_tags($item->title)) > 50 ? "..." : "" }}
                                            </a></h4>
                                            <p class="card-text">
                                                {{ substr(strip_tags($item->body), 0, 150) }}
                                                {{-- {{ strlen(strip_tags($item->body)) > 50 ? "...ReadMore" : "" }} --}}
                                            </p>
                                            <a href={{ route('single_post',[$item->created_at->year,$item->created_at->month,$item->url]) }} class="btn btn-default btn-sm position-absolute" style="right: 0; bottom: 0;">Read more</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{ $post->links() }}
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 mb-0">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Category</h5>
                            <hr>
                            <ul class="list-group list-group-flush">
                                @foreach ($categories as $item)
                                    <li class="list-group-item text-left"><a href="">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection