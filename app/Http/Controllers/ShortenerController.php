<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Request;

class ShortenerController extends Controller {

    function home()
    {
        return view('bootstrap.pages.home');
    }


    function about()
    {
        return view('bootstrap.pages.about');
    }


    function contact()
    {
        return view('bootstrap.pages.contact');
    }


    function short_url()
    {
        $data = array();

        $url = Request::input('url');
        $data['url'] = $url;

        // Look if the URL is already in the Db
        $url_result = Url::where('url', '=', $url)->first();

        // If YES display the existing hash
        if($url_result)
        {
            $data['short_url'] = url('/s/' . $url_result->url_hash);
        }
        // Else generate hash, add to the Db, and display new hash
        else
        {
            $found = false;
            $new_hash = "";
            do
            {
                $new_hash = Str::random(6);
                $hash_result = Url::where('url_hash', '=', $new_hash)->first();

                if($hash_result)
                {
                    $found = true;
                }
            } while($found);

            // Save into the Db
            $new_record = new Url();
            $new_record->url = $url;
            $new_record->url_hash = $new_hash;
            $new_record->save();

            $data['short_url'] = url('/s/' . $new_hash);
        }

        return view('bootstrap.pages.short', $data);
    }


    function goto_actual_url($hash_value)
    {
        // Look if the URL is already in the Db
        $url_result = Url::where('url_hash', '=', $hash_value)->first();

        // If YES display the existing hash
        if($url_result)
        {
            $actual_url = $url_result->url;
            $url_result->visits = $url_result->visits + 1;
            $url_result->save();

            // return redirect()->away($actual_url);
            return Redirect::away($actual_url);
        }
        else
        {
            $data['error'] = "Sorry, URL not found";
            return view('bootstrap.pages.error', $data);
        }
    }
}
