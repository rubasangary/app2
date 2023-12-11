<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adscategory;
use App\Models\Subcategory;
use App\Models\Advertisement;

class AdsMenuController extends Controller
{
    public function farmersMenu()
    {

    $farmersCategory = Advertisement::where('adscategory_id', 5)->where('published', 1)
    ->with('subcategory')->with('childcategory')->get();
    $adsMenus = Subcategory::where('adscategory_id', 5)->get();

    return view('frontend.adverts.farmersMarket.farmers-market', compact('adsMenus', 'farmersCategory'));

   }


    public function vehiclesMenu()
    {

        $vehiclesCategory = Advertisement::where('adscategory_id', 7)->where('published', 1)
        ->with('subcategory')->with('childcategory')->get();
        $vehiclesMenu = Subcategory::where('adscategory_id', 7)->get();

        return view('frontend.adverts.vehicles.all-vehicles', compact('vehiclesMenu', 'vehiclesCategory'));

    }

    public function propertyMenu()
    {

        $propertyCategory = Advertisement::where('adscategory_id', 8)->where('published', 1)
        ->with('subcategory')->with('childcategory')->get();
        $propertyMenu = Subcategory::where('adscategory_id', 8)->get();

        return view('frontend.adverts.property.all-properties', compact('propertyMenu', 'propertyCategory'));

    }

    public function fashionMenu()
    {

        $fashionCategory = Advertisement::where('adscategory_id', 9)->where('published', 1)
        ->with('subcategory')->with('childcategory')->get();
        $fashionMenu = Subcategory::where('adscategory_id', 9)->get();

        return view('frontend.adverts.fashion.all-fashion', compact('fashionMenu', 'fashionCategory'));

    }

    public function sportsMenu()
    {

        $sportsCategory = Advertisement::where('adscategory_id', 18)->where('published', 1)
        ->with('subcategory')->with('childcategory')->get();
        $sportsMenu = Subcategory::where('adscategory_id', 18)->get();

        return view('frontend.adverts.sports.all-sports', compact('sportsMenu', 'sportsCategory'));

    }

    public function electronicsMenu()
    {

        $electronicsCategory = Advertisement::where('adscategory_id', 10)->where('published', 1)
        ->with('subcategory')->with('childcategory')->get();
        $electronicsMenu = Subcategory::where('adscategory_id', 10)->get();

        return view('frontend.adverts.electronics.all-electronics', compact('electronicsMenu', 'electronicsCategory'));

    }

    public function homewareMenu()
    {

        $homewareCategory = Advertisement::where('adscategory_id', 11)->where('published', 1)
        ->with('subcategory')->with('childcategory')->get();
        $homewareMenu = Subcategory::where('adscategory_id', 11)->get();

        return view('frontend.adverts.homeware.all-homeware', compact('homewareMenu', 'homewareCategory'));

    }


}
