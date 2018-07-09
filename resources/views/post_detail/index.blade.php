@extends('layouts/base')


@if( $errors -> any() )
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $errors }} </li>
        @endforeach
    </ul>
@endif

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="jumbotron col-10 mx-auto">
                <h1 class="display-4"> {{ $post_clicked['title'] }} </h1>
                <h3 class="display-4"> {{ $post_clicked['subtitle'] }} </h3>
                
                <p class="lead"> 
                    @foreach ($post_clicked['categories'] as $pc)
                        <a href="#" class="btn btn-success"> {{ $pc['name'] }} </a>
                    @endforeach
                </p>


                <hr class="my-4">
                <p class="lead"> {!! $post_clicked['content'] !!} </p>
                <hr class="my-4">
                <p> {{ $post_clicked['author'] }} </p>
                <p> {{ $post_clicked['created_at'] }} </p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Delete</a>
                    <a class="btn btn-primary btn-lg" href=" {{ route('admin.edit', $post_clicked->title ) }} " role="button">Edit</a>

                </p>
            </div>
        </div>
    </div>

@endsection