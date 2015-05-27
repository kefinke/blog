@extends('_master')

@section('title')
    Log in
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
    <form method="post" action="/login">
        <table>
        <tr><td class="inputTitle">Username:</td><td><input type="text" name="username"/></td></tr>
        <tr><td class="inputTitle">Password:</td><td><input type="password" name="password"/></td></tr>
        </table>
        <p class="error">
            @if($error){{$error}}@endif
        </p>
        <input type="submit"/>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        
    </form>
@stop