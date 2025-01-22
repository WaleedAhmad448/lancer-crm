@extends('adminlte::page')

@section('title', 'Edit Property')

@section('content_header')
    <h1>Edit Property</h1>
@stop

@section('content')
    <form method="post" action="{{ route('property.update', ['id' => $property->id]) }}">
        @include('property.form')
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
