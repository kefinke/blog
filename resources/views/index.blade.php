@extends('_master')

@section('title')
    Scribble
@stop

@section('head')
@stop

@section('content')
    @section('header')
        <div id="links">
        <a href={{$headerInfo['link1']}}><div class="button">{{$headerInfo['title1']}}</div></a>
        <a href={{$headerInfo['link2']}}><div class="button">{{$headerInfo['title2']}}</div></a>
        </div>
    @stop
    
    @if(Session::get('user'))
        <p id="greeting">{{"Welcome, ".Session::get('user')->firstName."!"}}</p>
    @endif
    <div id='blogContainer'>
    @if($blogs)
        @foreach($blogs as $blog)
            <div class="blog" id="{{$blog->id}}">
            <img class="postImage" src="{{$blog->image}}"/>
            <h3 class="postTitle">"{{$blog->title}}" posted by {{$blog->user}}</h3>
            <p id="postShow{{$blog->id}}">
            @if(strlen($blog->body) < 143)
                {{$blog->body}}
            @else
                {{substr($blog->body, 0, 140)."..."}}
            @endif
            </p>
            <p class="toHide" id="postHide{{$blog->id}}">
                {{$blog->body}}
            </p>
            </div>
        @endforeach
    @endif
    </div>
@stop