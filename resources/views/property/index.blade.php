@extends('adminlte::page')

@section('title', 'All Property')

@section('content_header')
    <h1>All Property</h1>
@stop

@section('content')
    <div class="card px-3 py-2">
        @can('property_create')
        <div class="my-3">
            <a class="btn btn-success text-uppercase float-right" href="{{ route('property.create') }}">
                <i class="fas fa-plus fa-fw"></i>
                <span class="big-btn-text">Add New property</span>
            </a>
        </div>
        @endcan
        <input type="text" id="searchBox" placeholder="🔍 Search the table below">
        <br>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-uppercase" scope="col">#</th>
                        <th class="text-uppercase" scope="col">Title</th>
                        <th class="text-uppercase" scope="col">Date</th>
                        <th class="text-uppercase" scope="col">Address</th>
                        <th class="text-uppercase" scope="col">Price</th>
                        <th class="text-uppercase" scope="col">City</th>
                        <th class="text-uppercase" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property as $property)
                    <tr>
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->titl }}</td>
                        <td>{{ $property->date }}</td>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->price }}</td>
                        <td>{{ $property->city }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="viewport">
                                    ACTIONS
                                </a>
                                <div id="{{ $property->id }}" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @can('property_show')
                                    <a class="dropdown-item text-primary"
                                        href="{{ route('property.show', ['id' => $property->id]) }}">View</a>
                                    @endcan
                                    @can('property_edit')
                                    <a class="dropdown-item text-primary"
                                        href="{{ route('property.edit', ['id' => $property->id]) }}">Edit</a>
                                    @endcan
                                    @can('property_delete')
                                    <div class="dropdown-divider"></div>
                                    @if(!$property->is_active)
                                        <a role="button" class="entry-delete-btn dropdown-item text-danger" style="">
                                            Delete This property
                                        </a>
                                    @endif
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>
                    <input type="hidden" id="deleteUrl{{ $property->id }}" value="{{ route('property.destroy', ['id' => $property->id]) }}">
                    @endforeach
                    {{-- Required for mark delete action --}}
                    <input type="hidden" id="deletedBtnText" value="Yes, delete it!">
                    <input type="hidden" id="deletedTitle" value="Deleted!">
                    <input type="hidden" id="deletedMsg" value="Your request has been successfully completed.">

                </tbody>
            </table>
            @if (count($property) < 1)
                <div class="px-4 py-5 mx-auto text-secondary">
                    No results found!
                </div>
            @endif
        </div>

        {{-- Pagination links --}}
        <div class="mt-4">
            {{ $property->links() }}
        </div>

    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('js/table_utils.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/delete_entry.js') }}"></script>
@stop
