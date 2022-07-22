<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function home()
    {
        $all_assets_count = Asset::count();
        $laptops_count = Asset::where('tag', 'LIKE', "%LAPTOP-%")->count();
        $cases_count = Asset::where('tag', 'LIKE', "%CASE-%")->count();
        $monitors_count = Asset::where('tag', 'LIKE', "%MONITOR-%")->count();
        $phones_count = Asset::where('tag', 'LIKE', "%PHONE-%")->count();
        $mobibles_count = Asset::where('tag', 'LIKE', "%MOBILE-%")->count();
        $tablets_count = Asset::where('tag', 'LIKE', "%TABLET-%")->count();
        $projectors_count = Asset::where('tag', 'LIKE', "%PROJECTOR-%")->count();
        $accessories_count = Asset::where('tag', 'LIKE', "%PHUKIEN-%")->count();
        $components_count = Asset::where('tag', 'LIKE', "%LINHKIEN-%")->count();
        $upss_count = Asset::where('tag', 'LIKE', "%UPS-%")->count();
        $wifis_count = Asset::where('tag', 'LIKE', "%WIFI-%")->count();
        $nases_count = Asset::where('tag', 'LIKE', "%NAS-%")->count();
        $poe_switches_count = Asset::where('tag', 'LIKE', "%POESWITCH-%")->count();
        $smart_switches_count = Asset::where('tag', 'LIKE', "%SMARTSWITCH-%")->count();
        $speakers_count = Asset::where('tag', 'LIKE', "%SPEAKER-%")->count();
        $mics_count = Asset::where('tag', 'LIKE', "%MIC-%")->count();
        $headphones_count = Asset::where('tag', 'LIKE', "%HEADPHONE-%")->count();
        $projector_screens_count = Asset::where('tag', 'LIKE', "%PROJECTORSCREEN-%")->count();
        $printers_count = Asset::where('tag', 'LIKE', "%PRINTER-%")->count();
        $faxes_count = Asset::where('tag', 'LIKE', "%FAX-%")->count();
        $scanners_count = Asset::where('tag', 'LIKE', "%SCANNER-%")->count();
        $normal_switches_count = Asset::where('tag', 'LIKE', "%NORMALSWITCH-%")->count();
        return view('home', ['all_assets_count' => $all_assets_count, 'laptops_count' => $laptops_count, 'cases_count' => $cases_count, 'monitors_count' => $monitors_count]);
    }
}
