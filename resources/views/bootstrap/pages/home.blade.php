@extends('bootstrap.main')


@section('container')
<div class="starter-template">
  <h1>Enter URL to be shortened</h1>
  <p class="lead">
    <form name="shortenform" method="post" action="{{url('/short')}}">
      <input type="text" name="url" size="90" /><br>
      {!! csrf_field() !!}
      <input type="submit" />
    </form>
    <br>
    Use this form in order to <b>paste</b> a long URL to be shortened.<br>
    Our service will provide you with a convenient short URL for free!
  </p>
</div>
@stop
