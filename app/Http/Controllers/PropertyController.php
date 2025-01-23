<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;
use Exception;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        $property = Property::all();
        // return PropertyResource::collection($properties);
        $property = Property::paginate(5);

        return view('property.index', compact('property'));
    }

    public function create()
    {
        {
            return view('property.create');
        }    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|in:Building,Apartment,House,Land,Other',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:sale,rent,sold',
            'country' => 'required|string|max:255',
            'bathrooms'=> 'required|string|max:255',
            'bedrooms'=> 'required|string|max:255',
            'area'=> 'required|string|max:255',
            'date'=> 'required|date|max:255',
            'city' => 'required|string|max:255',
            'images' => 'required|json',
            'agents_id' => 'nullable',
        ]);

        $property = Property::create($request->all());
        return response()->json(new PropertyResource($property), 201);
    }

    public function show($id)
    {
        // $property = Property::findOrFail($id);
        // return new PropertyResource($property);
        $property = Property::findorfail($id);

        return view('property.show', compact('property'));
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        // يعيد عرض النموذج لتعديل العقار
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|in:Building,Apartment,House,Land,Other',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:sale,rent,sold',
            'country' => 'required|string|max:255',
            'bathrooms'=> 'required|string|max:255',
            'bedrooms'=> 'required|string|max:255',
            'area'=> 'required|string|max:255',
            'date'=> 'required|date|max:255',
            'city' => 'required|string|max:255',
            'images' => 'required|json',
            'agents_id' => 'nullable',
        ]);

        $property = Property::findOrFail($id);
        $property->update($request->all());

        return response()->json(new PropertyResource($property), 200);
    }

    public function destroy($id)
    {
        Property::destroy($id);
        return response()->json(null, 204);
    }
}