<?php

namespace App\Http\Controllers;

use App\Model\Garellies;
use Illuminate\Http\Request;

class WifeController extends Controller
{
    //
    public function getMoreWifeImage(Request $request)
    {
        $output = '';
        $id = $request->id;
        $galleries = Garellies::where('id', '<', $id)->orderBy('created_at', 'DESC')->limit(3)->get();

        if (!$galleries->isEmpty()) {
            foreach ($galleries as $gallery) {
                $output .= '<a href="javascript:;" class="gallery-image">
                            <figure><img src="{{asset(' . $gallery->link . ')}}" alt="Sample photo"></figure>
                        </a>';
            }

            $output .= '<div class="load-more" id="wife-remove">
                            <button id="wife-load-more" type="button" data-id="{{' . $gallery->id . '}}">Load more</button>
                        </div>';

            echo $output;
        }
    }
}
