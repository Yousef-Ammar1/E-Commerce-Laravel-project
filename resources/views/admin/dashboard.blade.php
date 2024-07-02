@extends('layouts.admin')
@section('title')
Main
@endsection

@section('contentheader')
Main
@endsection


@section('contentheaderlink')
<a href="{{ route('admin.dashboard') }}">Main</a>
@endsection


@section('contentheaderactive')
Show
@endsection

@section('content')
<div class="row" style="background-image: url({{ asset(
'assets/admin/images/image.png') }}; background-size:cover;background-repeate:ni-repeate;"></div>

@endsection
