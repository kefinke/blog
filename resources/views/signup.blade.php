@extends('_master')

@section('title')
    Sign Up
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
    <form method="post" action="/signup">
        <table>
        <tr><td class="inputTitle">First Name:</td><td><input type="text" name="firstName"/></td></tr>
            <tr><td class="error">
                @if($error && array_key_exists('firstName', $error)){{$error['firstName']}}@endif
            </td></tr>
        <tr><td class="inputTitle">Last Name:</td><td><input type="text" name="lastName"/></td></tr>
            <tr><td class="error">
                @if($error && array_key_exists('lastName', $error)){{$error['lastName']}}@endif
            </td></tr>   
        <tr><td class="inputTitle">Email:</td><td><input type="text" name="email"/></td></tr>
            <tr><td class="error">
                @if($error && array_key_exists('email', $error)){{$error['email']}}@endif
            </td></tr>
        <tr><td class="inputTitle">Username:</td><td><input type="text" name="username"/></td></tr>
            <tr><td class="error">
                @if($error && array_key_exists('username', $error)){{$error['username']}}@endif
            </td></tr>
        <tr><td class="inputTitle">Password:</td><td><input type="password" name="password"/></td></tr>
            <tr><td class="error">
                @if($error && array_key_exists('password', $error)){{$error['password']}}@endif
            </td></tr>
        <tr><td class="inputTitle">Verify Password:</td><td><input type="password" name="verifyPassword"/></td></tr>
            <tr><td class="error">
                @if($error && array_key_exists('verifyPassword', $error)){{$error['verifyPassword']}}@endif
            </td></tr>
        </table>
            <p class="error">@if($error && array_key_exists('all', $error)){{$error['all']}}@endif</p>
        <input type="submit"/>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        
    </form>
@stop