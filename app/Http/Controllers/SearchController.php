<?php

namespace App\Http\Controllers;

use App\Model\Key;
use App\Service\KeyService;
use App\Service\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    private $data;

    public function create(Request $request, KeyService $keyService, SearchService $searchService)
    {
        $key = $request->input('search');
        $data = [
            'key' => $request->input('search')
        ];
        try {
            DB::beginTransaction();
            if (!($newWord = Key::where('key', $key)->first())) {
                $keyService->createKeyWords($data);
                $results = $searchService->getListSearchBlog($key);
                $count = count($results);
                $this->data['titlePage'] = 'Search Result';
                $this->data['hot_keys'] = $keyService->getHotKeys();
                $this->data['search_key'] = $key;
                $this->data['search_results'] = $results;
                $this->data['search_count'] = $count;
                DB::commit();
                return view('blog.search_result', $this->data);
            } else {
                $results = $searchService->getListSearchBlog($key);
                $count = count($results);
                $this->data['titlePage'] = 'Search Result';
                $this->data['hot_keys'] = $keyService->getHotKeys();
                $this->data['search_key'] = $key;
                $this->data['search_results'] = $results;
                $this->data['search_count'] = $count;
                DB::commit();
                return view('blog.search_result', $this->data);
            }
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->route('app.searchPage')->with([
                'search_message' => 'No results for this key word! Please try another key word!'
            ]);
        }
        DB::rollBack();
        return redirect()->route('app.searchPage')->with([
            'search_message' => 'No results for this key word! Please try another key word!'
        ]);
    }

    public function getSearchResultPage(KeyService $keyService)
    {
        $this->data['titlePage'] = 'Search Result';
        $this->data['hot_keys'] = $keyService->getHotKeys();
        return view('blog.search_result', $this->data);
    }
}
