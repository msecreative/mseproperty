<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view( 'admin.dashboard' );
    }

    public function properties()
    {
        $properties = Property::latest()->paginate(20);
        return view( 'admin.properties', ['properties' => $properties] );
    }

    public function addProperty()
    {
        return view( 'admin.property.add-property' );
    }

    public function createProperty(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'name_bn'           => 'required',
            //'featured_image'    => 'required|image',
            'location_id'       => 'required',
            'price'             => 'required|integer',
            'sale'              => 'required',
            'type'              => 'required',
            'bedrooms'          => 'integer',
            'bathrooms'         => 'integer',
            'bathrooms'         => 'integer',
            'net_sqm'           => 'integer',
            'pool'              => 'integer',
            'overview'          => 'required',
            'overview_bn'       => 'required',
            'description'       => 'required',
            'description_bn'    => 'required',
        ]);

        $property = new Property();

        $property->name             = $request->name;
        $property->name_bn          = $request->name_bn;
        $property->featured_image   = 'pending';
        $property->location_id      = $request->location_id;
        $property->price            = $request->price;
        $property->sale             = $request->sale;
        $property->type             = $request->type;
        $property->bedrooms         = $request->bedrooms;
        $property->bathrooms        = $request->bathrooms;
        $property->net_sqm          = $request->net_sqm;
        $property->gross_sqm        = $request->gross_sqm;
        $property->pool             = $request->pool;
        $property->overview         = $request->overview;
        $property->overview_bn      = $request->overview_bn;
        $property->why_buy          = $request->why_buy;
        $property->why_buy_bn       = $request->why_buy_bn;
        $property->description      = $request->description;
        $property->description_bn   = $request->description_bn;

        $property->save();
    }
}
