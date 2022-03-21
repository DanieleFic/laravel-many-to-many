@extends('layouts.app')

@section('title','Show Post')

@section('content')
<div class="container">
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">title</div>
            <div class="col col-2">author</div>
            <div class="col col-5">content</div>
            <div class="col col-1">Slug</div>
        </li>
        <li class="table-row">
            <div class="col col-1">{{$post->title}}</div>
            <div class="col col-2">{{$post->author}}</div>
            <div class="col col-5">{{$post->content}}</div>
            <div class="col col-1">{{$post->slug}}</div>
        </li>
        {{-- facciamo un bottone con il route comics.show che si trova nel nostro controllore  --}}
        <a href="{{route("admin.posts.index")}}"><button type="button" class="btn btn-info">Indietro</button></a>
    </ul>
</div>     
@endsection