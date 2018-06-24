@extends('layouts/app')

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
            <form action=" {{ route('admin.postNew') }} " method="POST">

                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="postTitle" class="col-sm-2 col-form-label">Titolo Post</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="postTitle" placeholder="Titolo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postSubTitle" class="col-sm-2 col-form-label">Sottotitolo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="postSubTitle" placeholder="Sottotitolo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postContent" class="col-sm-2 col-form-label">Testo</label>
                    <div class="col-sm-10">
                        <textarea class="" name="postContent" name="" cols="155" rows="10"></textarea>                       
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="postAuthor" class="col-sm-2 col-form-label">Autore</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="postAuthor" placeholder="Author">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Categorie</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            @foreach ($categories as $categ)
                            <input class="form-check-input" name="postCategory[]" type="checkbox" value=" {{ $categ['id'] }} ">
                                <label class="form-check-label" for="gridCheck1">
                                    {{ $categ['name'] }}
                                </label>
                                
                            @endforeach
                                
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection