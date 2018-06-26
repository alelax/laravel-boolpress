@extends('layouts/app')

@section('content')
    
    <div class="container">

        <div class="row" style="margin: 100px 0 50px 0">
            <div class="col-12">
                <form class="form-inline" action="#" method="get">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" placeholder="Inserisci il titolo" class="form-control">
                    
                    <label for="author">Autore</label>
                    <select class="form-control" name="author" id="">
                        <option value=""> --- </option>
                        @foreach ($authors as $a)
                            <option value=" {{ $a['author'] }} "> {{ $a['author'] }} </option>
                        @endforeach
                    </select>

                    <label for="category">Categorie</label>
                    <select class="form-control" name="category" id="">
                        <option value=""> --- </option>
                        @foreach ($categories as $c)
                            <option value=" {{ $c['name'] }} "> {{ $c['name'] }} </option>
                        @endforeach
                    </select>

                    
                    <input type="submit" value="Filtra" class="form-control">
                </form>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>categoria</th>
                    <th>Autore</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td> {{ $post['title'] }} </td>
                    <td> 
                        @foreach ($post['categories'] as $p)
                            {{ '-' . $p['name'] . '-' }}                        
                        @endforeach 
                    </td>
                    <td> {{ $post['author'] }}  </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection