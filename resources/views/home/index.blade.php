@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="list-group col-10 mx-auto">

                @foreach ($posts as $p)
                
                    <a href=" {{ route( 'post.detail', $p->title ) }} " class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex  justify-content-between">
                            <h3 class="mb-1"> {{ $p->title }} </h3>
                            <h5 class="mb-1"> {{ $p->subtitle }} </h5>  
                                                      
                            <small> {{ $p->created_at }} </small>
                            <p class="mb-1"> {!! $p->content !!} </p>
                            <small> {{ $p->author }} </small>
                             
                                @foreach ($p['categories'] as $pc)
                                    <a href=" {{ route('category.postList', $pc->name ) }} " class="btn btn-success"> {{ $pc->name }} </a>
                                @endforeach
                            
                        </div>
                    </a>
                
                @endforeach

            </div>
        </div>
    </div>

@endsection