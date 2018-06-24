@extends('layouts/app')

@section('content')

    {{-- @php
        var_dump($post_to_editing);
    @endphp --}}
    <div class="container">
        <div class="row">
            <form action=" {{ route('admin.edit', $post_to_editing['title'] ) }} " method="POST">

                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="postTitle" class="col-sm-2 col-form-label">Titolo Post</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="postTitle" value=" {{ $post_to_editing['title'] }} ">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postSubTitle" class="col-sm-2 col-form-label">Sottotitolo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="postSubTitle" value=" {{ $post_to_editing['subtitle'] }} ">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postContent" class="col-sm-2 col-form-label">Testo</label>
                    <div class="col-sm-10">
                        <textarea class="" name="postContent" name="" cols="155" rows="10"> {!! $post_to_editing['content'] !!} </textarea>                       
                    </div>
                    
                </div>
                
                <div class="form-group row">
                    <label for="postAuthor" class="col-sm-2 col-form-label">Autore</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="postAuthor" value=" {{ $post_to_editing['author'] }} ">
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
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection