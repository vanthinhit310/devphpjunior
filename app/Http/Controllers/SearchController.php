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
                DB::commit();
                return view('blog.search_result')->with([
                    'titlePage' => 'Search Result',
                    'hot_keys' => $keyService->getHotKeys(),
                    'search_key' => $key,
                    'search_results' => $results,
                    'search_count' => $count
                ]);
            } else {
                $keyService->updateCountSearch($key);
                $results = $searchService->getListSearchBlog($key);
                $count = count($results);
                DB::commit();
                return view('blog.search_result')->with([
                    'titlePage' => 'Search Result',
                    'hot_keys' => $keyService->getHotKeys(),
                    'search_key' => $key,
                    'search_results' => $results,
                    'search_count' => $count
                ]);
            }
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->route('app.searchPage');
        }
        DB::rollBack();
        return redirect()->route('app.searchPage');
    }

    public function getSearchResultPage(KeyService $keyService)
    {
        $this->data['titlePage'] = 'Search Result';
        $this->data['hot_keys'] = $keyService->getHotKeys();
        return view('blog.search_result', $this->data);
    }
}
