@extends('layouts.app')

@section('title',' Posts Lists')

@section('content')
<div class="container">
    <a href="{{route("admin.posts.create")}}"><button type="button" class="btn btn-info">Aggiungi Post</button></a>
    <ul class="responsive-table">
        <li class="table-header">
            {{-- <div class="col col-1">id</div> --}}
            <div class="col col-1">title</div>
            <div class="col col-2">author</div>
            <div class="col col-5">content</div>
            {{-- <div class="col col-1">published</div> --}}
            <div class="col col-1">Slug</div>
            <div class="col col-1">Categoria</div>
            <div class="col col-1">Tags</div>
            <div class="col col-1">Modifiche</div>
        </li>
        @foreach ($posts as $element)
            <li class="table-row">
            <div class="col col-1" data-label="Job Id">
                {{$element->title}}
            </div>
            <div class="col col-2">{{$element->author}}</div>
            <div class="col col-5">{{$element->content}}</div>
            <div class="col col-1">{{$element->slug}}</div>
            <div class="col col-1">{{$element->category ? $element->category->name : '-'}}</div>
            
            <div class="col col-1">
                @foreach($element->tags as $tag)
                <h6><span class="badge badge-secondary">{{$tag->name ? $tag->name : '-'}}</span></h6>
                @endforeach
            </div>
            <div class="col col-1 ms_flex">
                <a href="{{route("admin.posts.show", $element->id)}}"><button type="button" class="btn btn_info"><i class="bi bi-info"></i></button></a>
                <a href="{{route("admin.posts.edit", $element->id)}}"><button type="button" class="btn  btn_edit"><i class="bi bi-pencil-square"></i></button></a>
                <form action="{{route("admin.posts.destroy", $element->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection