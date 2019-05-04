<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * @property  data
 */
class DevTestController extends Controller
{
    //
    private $data;

    public function DevTest()
    {

        $date = Carbon::now();
        $date->date('Y-m-d');
        echo $date;
    }

    public function index(Request $request)
    {
        $param = [];
        $param['titlePage'] = 'Test page';
        return view('general.function_testing', $param);
    }

    public function search(Request $request)
    {
        $this->data['titlePage'] = 'Test page';
        $key = $request->input('search');
        if (isset($key)) {
            $articles = Article::where('title', 'LIKE', '%' . $key . '%')
                ->orWhere('tags', 'LIKE', '%' . $key . '%')->get();
            $this->data['articles'] = $articles;
        }
        if (count($articles) > 0) {
            return redirect()->route('test.search');
        }else{
//            dd($this->data);
           return redirect()->route('test.search')->with(['error' => 'No Details found. Try to search again !']);
        }
    }
}
