@extends('layouts.app')

@section('title','Modifica Post')

@section('content')
{{--Creiamo il form per aggiungere un nuovo elemento fumetto al nostro DB negli input mettiamo 
    il valore name="nome della colonna sul nostro db",
    nel form mettiamo come action il percorso della nostra rotta
    come methodo POST e @csrf nel form che è una funzione
    di laravel--}}

<div class="container">
    <h1>MODIFICA POST</h1>
    <a href="{{route("admin.posts.index")}}"><button type="button" class="btn btn-info">Indietro</button></a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route ("admin.posts.update" , $post->id )}}" method="POST" role="form">
                @csrf

                {{-- Visto che nell Edit possiamo usare solo post come method di form ci aiutiamo con la funzione di laravel
                PUT per modificare un elemento
                Nell edit i tag input devono ricevere il name e il value((attributi del fumetto che vai a modificare)--}}
                
                @method('PUT')
                
                <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Aggiungi il titolo</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Inserisci titolo post"/>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Aggiungi l'autore</label>
                <input name="author" value="{{$post->author}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Inserici l'autore">
                @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Aggiungi il contenuto</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Inserisci il contenuto" class="form-control bcontent" name="content">{{$post->content}}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <select name="category_id" id=""
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">--seleziona categoria--</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{-- {{$category->id == old('category_id', $post->category_id) ? 'selected' : '' }} --}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="Submit" value="Crea" class="ms_button btn btn-primary form-control" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection