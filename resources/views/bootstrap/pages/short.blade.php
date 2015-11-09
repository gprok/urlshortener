@extends('bootstrap.main')


@section('container')
<div class="starter-template">
  <h1>Short URL</h1>
  <p class="lead">Original Url<br>
    <span style="background-color: lightgray">{{$url}}</span>
  </p>

  <p class="lead">Short Url<br>
    <span style="background-color: lightgray">{{$short_url}}</span>
  </p>
</div>
@stop
