@extends('layouts.app')

@section('title','Aggiungi Post')

@section('content')
{{--Creiamo il form per aggiungere un nuovo elemento fumetto al nostro DB negli input mettiamo 
    il valore name="nome della colonna sul nostro db",
    nel form mettiamo come action il percorso della nostra rotta
    come methodo POST e @csrf nel form che è una funzione
    di laravel--}}
    
<div class="container">
    <h1>CREA POST</h1>
    <a href="{{route("admin.posts.index")}}"><button type="button" class="btn btn-info">Indietro</button></a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route ("admin.posts.store") }}" method="POST" role="form">
                @csrf
                <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Aggiungi il titolo</label>
                <input type="text" class="form-control" name="title" value="{{old("title")}}" placeholder="Inserisci titolo post"/>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Aggiungi l'autore</label>
                <input name="author" value="{{old("author")}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Inserici l'autore">
                @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Aggiungi il contenuto</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Inserisci il contenuto" class="form-control bcontent" name="content">{{old("description")}}</textarea>
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
                @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$tag->id}}" 
                    name="tags[]" id="{{$tag->slug}}">
                    <label class="form-check-label" for="{{$tag->slug}}">
                        {{$tag->name}}
                    </label>
                </div>
                @endforeach
                
                <div class="form-group">
                    <input type="submit" name="Submit" value="Publish" class="ms_button btn btn-primary form-control" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection