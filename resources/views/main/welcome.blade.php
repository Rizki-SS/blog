@extends('main.master')

@section('title','app name')

@section('header_text')
    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque illum doloribus cupiditate enim, sequi debitis dolore quam alias voluptatem magnam molestias sapiente porro quia sit autem aut, facilis fuga quis!</p>
@endsection

@section('main')
    <main class="text-center py-5">

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <h3 text="center">about</h3>
                    <h5 class="mb-5">Who Us</h5>
                    <p align="center">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>

                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <h3 text="center">Feature</h3>
                    <h5 class="mb-5">What Feature will be get</h5>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="card shadow-none p-3">
                                <i class="fas fa-cloud fa-3x text-primary"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Cloud Feature</h5>
                                    <p class="card-text">Upload And Download your file in cloud storage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none p-3">
                                <i class="fas fa-lock fa-3x text-primary"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Scure</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none p-3">
                                <i class="far fa-comments fa-3x text-primary"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Contact Supprot</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quasi repellendus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-5 image-content" style="background-image: url(/storage/files/shares/img-asset/undraw_personal_text_vkd8.svg);">
                </div>
                <div class="col-md-7 text-left mt-5 mb-5">
                    <h3>The Future Star Now</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, architecto asperiores. Velit ratione voluptatem reiciendis nulla, dignissimos fugiat blanditiis eaque excepturi laudantium beatae dolor amet repellendus odio magnam
                        commodi repudiandae.</p>
                    <button type="button" class="btn btn-info">Info</button>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-right mt-5 mb-5">
                    <h3>We are growing</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, architecto asperiores. Velit ratione voluptatem reiciendis nulla, dignissimos fugiat blanditiis eaque excepturi laudantium beatae dolor amet repellendus odio magnam
                        commodi repudiandae.</p>
                    <button type="button" class="btn btn-info">Info</button>
                </div>
                <div class="col-md-5 image-content" style="background-image: url(/storage/files/shares/img-asset/undraw_personal_text_vkd8.svg);"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 text="center">Blog</h3>
                    <h5 class="mb-5">See news about us</h5>
                    
                    <div class="row mb-2">
                        @foreach ($data as $item)
                            <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-body text-left">
                                    <div class="row">
                                        <div class="col-sm">
                                    <img src="/storage/files/shares/post/{{$item->image}}" class="w-100" height="150px" alt="Card image cap">
                                        </div>
                                        <div class="col align-left"  style="height: 150px;">
                                            <h4 class="card-title"><a href={{ route('single_post',[$item->created_at->year,$item->created_at->month,$item->url]) }} >
                                                {{ substr(strip_tags($item->title), 0, 20) }}
                                                {{ strlen(strip_tags($item->title)) > 20 ? "..." : "" }}
                                            </a></h4>
                                            <p class="card-text">
                                                {{ substr(strip_tags($item->body), 0, 80) }}
                                                {{-- {{ strlen(strip_tags($item->body)) > 50 ? "...ReadMore" : "" }} --}}
                                            </p>
                                            <a href={{ route('single_post',[$item->created_at->year,$item->created_at->month,$item->url]) }} class="btn btn-default btn-sm position-absolute" style="right: 0; bottom: 0;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>


    {{-- <div class="container">
        @foreach (File::glob('storage/files/shares/post/*') as $file)
            <img src="{{ $file }}" width="20px">
        @endforeach 
    </div> --}}

    <div class="container-fluid unique-color">
        <div class="container p-3">
            <form method="post" action="#" class="form-row align-items-center">
                <div class="col-sm-9">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control">
                        <label for="form1" class="text-white">Insert email to subcribe</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-outline-white btn-block shadow-none ">subcribe</button>
                </div>
            </form>
        </div>
    </div>
@endsection