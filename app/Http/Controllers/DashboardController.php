<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;
use App\Models\Media;
use App\Models\Contact;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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


    public function locations()
    {
        $locations = Location::latest()->paginate(20);
        return view( 'admin.locations', ['locations' => $locations] );
    }

    public function addProperty()
    {
        $locations = Location::all();
        return view( 'admin.property.add-property', ['locations' => $locations] );
    }


     public function validateProperty() {
        return [
            'name'          => 'required',
            'name_bn'       => 'required',
            'location_id'   => 'required',
            'price'         => 'required|integer',
            'sale'          => 'integer',
            'type'          => 'integer',
            'bathrooms'     => 'integer',
            'net_sqm'       => 'integer',
            'pool'          => 'integer',
            'overview'      => 'required',
            'overview_bn'    => 'required',
            'description'    => 'required',
            'description_bn' => 'required',
        ];
    }

     public function saveOrUpdateProperty($property, $request) {
        $property->name = $request->name;
        $property->name_bn = $request->name_bn;
        $featured_image_name = time() . '-' . $request->featured_image->getClientOriginalName();
        // store the file
        $request->featured_image->storeAs('public/uploads', $featured_image_name);
        $property->featured_image = $featured_image_name;
        $property->location_id = $request->location_id;
        $property->price = $request->price;
        $property->sale = $request->sale;
        $property->type = $request->type;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->drawing_rooms = $request->drawing_rooms;
        $property->net_sqm = $request->net_sqm;
        $property->gross_sqm = $request->gross_sqm;
        $property->pool = $request->pool;
        $property->overview = $request->overview;
        $property->overview_bn = $request->overview_bn;
        $property->why_buy = $request->why_buy;
        $property->why_buy_bn = $request->why_buy_bn;
        $property->description = $request->description;
        $property->description_bn = $request->description_bn;
        $property->save();
        foreach($request->gallery_images as $image) {
            $gallery_image_name = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/uploads', $gallery_image_name);
            $media = new Media();
            $media->name = $gallery_image_name;
            $media->property_id = $property->id;
            $media->save();
        }
    }

    public function createProperty(Request $request)
    {
        $updated_validation = $this->validateProperty()[] = [
            'featured_image' => 'required|image',
            'gallery_images' => 'required',
        ];

        $request->validate($updated_validation);

        $property = new Property();

        $this->saveOrUpdateProperty($property, $request);

        return redirect(route('dashboard-properties'))->with(['message' => 'Property is added.']);
    }


    public function addLocation()
    {

        return view( 'admin.location.add-location');
    }


    public function createLocation(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'name_bn' => 'required'
        ]);

        $location = new Location();
        $location->name = $request->name;
        $location->name_bn = $request->name_bn;
        $location->save();

        return redirect(route('dashboard-locations'))->with(['message' => 'Locations is added.']);
    }


    public function editProperty($property_id)
    {
        $property = Property::findOrFail($property_id);
        $locations = Location::all();

        return view( 'admin.property.edit-property', [
            'property' => $property,
            'locations' => $locations
        ] );
    }

    public function editLocation($location_id)
    {
        $location = Location::findOrFail($location_id);

        return view( 'admin.location.edit-location', [
            'location' => $location
        ] );
    }


    public function deleteMedia($media_id)
    {
       $media = Media::findOrFail($media_id);
       Storage::delete('public/uploads/' . $media->name);
       $media->delete();

       return back();
    }


    public function updateProperty($property_id, Request $request) {
        $property = Property::findOrFail($property_id);

        $request->validate($this->validateProperty());
        
        $this->saveOrUpdateProperty($property, $request);

        return redirect(route('dashboard-properties'))->with(['message' => 'Location is Updated.']);
    }

        public function updateLocation(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'name_bn' => 'required',
        ]);

        $location = Location::findOrFail($id);
        $location->name = $request->name;
        $location->save();

        return redirect(route('dashboard-locations'))->with(['message' => 'Property is saved.']);
    }

    public function deleteProperty($property_id)
    {
        $property = Property::findOrFail($property_id);
        Storage::delete('public/uploads/' . $property->featured_image);

        foreach ($property->gallery as $media) {
            $media = Media::findOrFail($media->id);
            Storage::delete('public/uploads/' . $media->name);
            $media->delete();
        }

        $property->delete();

        return redirect(route('dashboard-properties'))->with(['message' => 'Property is deleted.']);
    }

    public function deleteLocation($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect(route('dashboard-locations'))->with(['message' => 'Location is deleted.']);
    }




    public function messages() {
        return view('admin.message', ['messages' => Contact::latest()->paginate(30)]);
    }

    public function deleteMessage($message_id) {
        $contact = Contact::findOrFail($message_id);
        $contact->delete();

        return back();
    }





}
