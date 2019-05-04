<?php

namespace App\Http\Controllers\Admin;

use App\Model\BlogPost;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends VoyagerBaseController {
    protected function exportListPosts() {
        $listPost = BlogPost::all();
        $lead_array[] = array('ID', 'TITLE', 'AUTHOR', 'THEME', 'IMAGE','DESCRIPTION','KEY_WORK', 'SLUG','CONTENT', 'CREATED_AT');
        foreach ($listPost as $post) {
            $lead_array[] = array(
                'ID' => $post->id,
                'TITLE' => $post->title,
                'AUTHOR' => $post->author,
                'THEME' => $post->theme,
                'IMAGE' => $post->image,
                'DESCRIPTION' => $post->description,
                'KEY_WORK' => $post->key_work,
                'SLUG' => $post->slug,
                'CONTENT' => $post->content,
                'CREATED_AT' => $post->created_at
            );
        }
        return Excel::create('List Posts', function($excel) use ( $lead_array) {
            $excel->setTitle('List Posts');
            $excel->sheet('List Posts', function($sheet) use ( $lead_array) {
                $sheet->fromArray($lead_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

}
