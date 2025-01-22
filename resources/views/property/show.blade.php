@extends('adminlte::page')

@section('title', 'Property Details')

@section('content_header')
    <h1>Property Details</h1>
    @can('property_create')
    <div id="{{ $property->id }}" class="my-3">
        @can('property_delete')
        @if(!$property->is_active)
            <button class="entry-delete-btn btn btn-danger text-uppercase float-right ml-2">
                <i class="fas fa-trash-alt fa-fw"></i>
                <span class="big-btn-text">Delete This Property</span>
            </button>
        @endif
        @endcan
        @can('property_edit')
        <a class="btn btn-primary text-uppercase float-right ml-2" href="{{ route('property.edit', ['id' => $property->id]) }}">
            <i class="fas fa-edit fa-fw"></i>
            <span class="big-btn-text">Edit This Property</span>
        </a>
        @endcan
        @can('property_create')
        <a class="btn btn-success text-uppercase float-right" href="{{ route('property.create') }}">
            <i class="fas fa-plus fa-fw"></i>
            <span class="big-btn-text">Add New Property</span>
        </a>
        @endcan
    </div>
    <br><br>
    @endcan
@stop

@section('content')
    {{-- property Details --}}
    <div class="card px-3 py-2">
        <div class="row">
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span>#</span>:
                        <span class="pl-1 font-weight-bolder">{{ $property->id }}</span>
                    </li>
                    <li class="list-group-item">
                        <span>Name</span>:
                        <span class="pl-1 font-weight-bolder">{{ $property->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <span>Details</span>:
                        <span class="pl-1 font-weight-bolder">{{ $property->details }}</span>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    {{-- Required for delete action --}}
    <input type="hidden" id="deleteUrl{{ $property->id }}" value="{{ route('propertys.destroy', ['id' => $property->id]) }}">
    <input type="hidden" id="closedRedirectUrl" value="{{ route('propertys.index') }}">
    <input type="hidden" id="deletedBtnText" value="Yes, delete it!">
    <input type="hidden" id="deletedTitle" value="Deleted!">
    <input type="hidden" id="deletedMsg" value="The selected property was successfully deleted.">
@stop

@section('css')
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/delete_entry.js') }}"></script>
@stop
