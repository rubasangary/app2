<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adscategory;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Advertisement;
use App\Models\User;


class FrontendAdsController extends Controller
{
    public function findSubcategoryFarm(Subcategory $subcategorySlug)
    {

        $adsMenus = Subcategory::where('adscategory_id', 5)->get();
        $adverts = $subcategorySlug->ads->where('published', 1);

        return view('frontend.adverts.farmersMarket.farmersFilter', compact('adsMenus', 'adverts'));
    }

    // Childcategory $childcategorySlug is muted for temporary

    // public function findSubcategoryVehicles(Subcategory $subcategorySlug, Childcategory $childcategorySlug)
    // {
    //     $vehiclesMenus = Subcategory::where('adscategory_id', 7)->get();
    //     $vehiclesAdverts = $childcategorySlug->ads->where('published', 1);

    //     return view('frontend.adverts.vehicles.vehiclesFilter', compact('vehiclesMenus', 'vehiclesAdverts'));
    // }


    public function findSubcategoryVehicles(Subcategory $subcategorySlug)
    {
        $vehiclesMenus = Subcategory::where('adscategory_id', 7)->get();
        $vehiclesAdverts = $subcategorySlug->ads->where('published', 1);

        return view('frontend.adverts.vehicles.vehiclesFilter', compact('vehiclesMenus', 'vehiclesAdverts'));
    }


    public function findSubcategoryProperty(Subcategory $subcategorySlug)
    {
        $propertyMenus = Subcategory::where('adscategory_id', 8)->get();
        $propertyAdverts = $subcategorySlug->ads->where('published', 1);
        return view('frontend.adverts.property.propertyFilter', compact('propertyMenus', 'propertyAdverts'));
    }

    public function findSubcategoryFashion(Subcategory $subcategorySlug)
    {

        $fashionMenus = Subcategory::where('adscategory_id', 9)->get();
        $fashionAdverts = $subcategorySlug->ads->where('published', 1);

        return view('frontend.adverts.fashion.fashionFilter', compact('fashionMenus', 'fashionAdverts'));
    }

    public function findSubcategorySports(Subcategory $subcategorySlug)
    {

        $sportsMenus = Subcategory::where('adscategory_id', 18)->get();
        $sportsAdverts = $subcategorySlug->ads->where('published', 1);

        return view('frontend.adverts.sports.sportsFilter', compact('sportsMenus', 'sportsAdverts'));
    }

    public function findSubcategoryElectronics(Subcategory $subcategorySlug)
    {

        $electronicMenus = Subcategory::where('adscategory_id', 10)->get();
        $electronicAdverts = $subcategorySlug->ads->where('published', 1);

        return view('frontend.adverts.electronics.electronicsFilter', compact('electronicMenus', 'electronicAdverts'));
    }

    public function findSubcategoryHomeware(Subcategory $subcategorySlug)
    {

        $homewareMenus = Subcategory::where('adscategory_id', 10)->get();
        $homewareAdverts = $subcategorySlug->ads->where('published', 1);

        return view('frontend.adverts.homeware.homewareFilter', compact('homewareMenus', 'homewareAdverts'));
    }



    //show individual ads or product single page
    public function showUserProduct($id, $slug)
    {
        $productPage = Advertisement::where('id', $id)->where('slug', $slug)->first();
        return view('frontend.adverts.product', compact('productPage'));
    }



}
