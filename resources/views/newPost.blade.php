@extends('_master')

@section('title')
    New Post
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="css/footfix.css"/>
@stop

@section('content')
    @section('header')
        <div id="links">
        <a class="head" href='/'><div class="button">Home</div></a>
        </div>
    @stop
    <form method="post" action="/newPost">
        <table>
        <tr><td class="inputTitle">Image Link:</td><td><input type="text" name="image"/></td></tr>
        <tr><td class="inputTitle">Title:</td><td><input type="text" name="title"/></td></tr>
        <tr><td class="inputTitle">Content:</td><td><textarea name="body"></textarea></td></tr>
        <tr><td class="imgur" colspan="2">Image not online?<a href="http://imgur.com/">Click here to use Imgur.com</a></td></tr>
        <tr><td class="imgur" colspan="2">Upload your image and copy/paste the "direct link"</td></tr>
        </table>
        <p class="error">
            @if($error){{$error}}@endif
        </p>
        
        <input type="submit"/>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        
    </form>
@stop