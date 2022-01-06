<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function home()
    {
        $latest_properties = Property::latest()->get()->take(4);
        $locations = Location::select(['id', 'name'])->get();
       
        return view('welcome', [
            'latest_properties' => $latest_properties,
            'locations'         => $locations
        ]);
    }

    // Showing Single Property in frontend

    public function singleProperty($id) {
        $property = Property::findOrFail($id);

        return view('property.single', ['property' => $property]);
    }


    public function Propertyndex(Request $request)
   {
      $latest_properties = Property::latest();
      $locations = Location::select(['id', 'name'])->get();

      if(!empty($request->sale)) {

         if ($request->sale == 'rent') {
            $sale = 1;
         }elseif($request->sale == 'sale'){
            $sale = 2;
         }

         $latest_properties= $latest_properties->where('sale', $sale);
        }

      if(!empty($request->bedrooms)) {
         $latest_properties= $latest_properties->where('bedrooms', $request->bedrooms);
        }

      if(!empty($request->price)) {
      
         if($request->price =='100000'){
               $latest_properties= $latest_properties->where('price', '>', 0)->where('price', '<=', 100000);
         }
         if($request->price =='200000'){
               $latest_properties= $latest_properties->where('price', '>', 100000)->where('price', '<=', 200000);
         }
         if($request->price =='300000'){
               $latest_properties= $latest_properties->where('price', '>', 200000)->where('price', '<=', 300000);
         }
         if($request->price =='400000'){
               $latest_properties= $latest_properties->where('price', '>', 300000)->where('price', '<=', 400000);
         }
         if($request->price =='500000'){
               $latest_properties= $latest_properties->where('price', '>', 400000)->where('price', '<=', 500000);
         }
         if($request->price =='500000+'){
               $latest_properties= $latest_properties->where('price', '>', 500000);
         }
      }

      if(!empty($request->type)) {
         if ($request->type == 'land') {
            $type = 1;
         }elseif($request->type == 'appartment'){
            $type = 2;
         }elseif($request->type == 'villa'){
            $type = 3;
         }
         $latest_properties= $latest_properties->where('type', $type);
        }

      if(!empty($request->location)) {
         $latest_properties= $latest_properties->where('location_id', $request->location);
        }

      if(!empty($request->property_name)) {
         $latest_properties= $latest_properties->where('name', 'LIKE', '%'.$request->property_name .'%');
        }

      $latest_properties = $latest_properties->paginate(12);


      return view( 'property.index', [
            'latest_properties' => $latest_properties,
            'locations' => $locations
            
            ] ); 
   }


   public function currencyChange($code)
   {
      Cookie::queue('currency', $code, 3600);

      return back();
   }


   // public function singleLocation($id) {
   //      $location = Location::findOrFail($id);


   //  }



    // public function singlePage($slug) {
    //     $page = Page::where('slug', $slug)->first();

    //     if(!empty($page)) {
    //         return view('page', [
    //             'page' => $page
    //         ]);
    //     } else {
    //         return abort('404');
    //     }
    // }
}
