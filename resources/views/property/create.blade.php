@extends('adminlte::page')

@section('title', 'Add New Property')

@section('content_header')
    <h1>Add New Property</h1>
@stop

@section('content')
    <form method="post" action="{{ route('property.store') }}">
        @include('property.form')
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
