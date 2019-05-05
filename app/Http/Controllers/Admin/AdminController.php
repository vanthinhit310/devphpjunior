<?php

namespace App\Http\Controllers\Admin;

use App\Model\BlogPost;
use App\Model\DailyLog;
use Maatwebsite\Excel\Facades\Excel;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class AdminController extends VoyagerBaseController
{
    protected function exportListPosts()
    {
        $listPost = BlogPost::all();
        $lead_array[] = array(
            'ID',
            'TITLE',
            'AUTHOR',
            'THEME',
            'IMAGE',
            'DESCRIPTION',
            'KEY_WORK',
            'SLUG',
            'CONTENT',
            'CREATED_AT'
        );
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
        return Excel::create('List Posts', function ($excel) use ($lead_array) {
            $excel->setTitle('List Posts');
            $excel->sheet('List Posts', function ($sheet) use ($lead_array) {
                $sheet->fromArray($lead_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

    protected function exportListLogs()
    {
        $listLogs = DailyLog::all();
        $lead_array[] = array(
            'ID',
            'TITLE',
            'PRIVATE_AUTHOR',
            'PUBLIC_AUTHOR',
            'CREATE DATE',
            'CONTENT',
            'ORDER',
            'STATUS',
            'CREATED_AT'
        );
        foreach ($listLogs as $log) {
            $lead_array[] = array(
                'ID' => $log->id,
                'TITLE' => $log->title,
                'PRIVATE_AUTHOR' => $log->private_author,
                'PUBLIC_AUTHOR' => $log->public_author,
                'CREATE DATE' => $log->cre_date,
                'CONTENT' => $log->content,
                'ORDER' => $log->ordering,
                'STATUS' => $log->status,
                'CREATED_AT' => $log->created_at
            );
        }
        return Excel::create('List Logs', function ($excel) use ($lead_array) {
            $excel->setTitle('List Logs');
            $excel->sheet('List Logs', function ($sheet) use ($lead_array) {
                $sheet->fromArray($lead_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

}
