@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="list-group col-10 mx-auto">

                <h1> Post Categoria: {{ $categoria }} </h1>

                @foreach ($filtered_post as $fp)
                
                    <a href=" {{ route( 'post.detail', $fp->title ) }} " class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex  justify-content-between">
                            
                            <h3 class="mb-1"> {{ $fp->title }} </h3>
                            <h5 class="mb-1"> {{ $fp->subtitle }} </h5>                            
                            <small> {{ $fp->created_at }} </small>
                            <p class="mb-1"> {!! $fp->content !!} </p>
                            <small> {{ $fp->author }} </small>
                             
                        </div>
                    </a>
                
                @endforeach

            </div>
        </div>
    </div>

@endsection