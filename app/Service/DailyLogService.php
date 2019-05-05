<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/5/2019
 * Time: 12:13 AM
 */

namespace App\Service;


use App\Model\DailyLog;
use Illuminate\Support\Facades\Auth;

class DailyLogService
{
    public function createLog( $datas)
    {
        $logs = DailyLog::create([
            'title' => $datas['title'],
            'private_author' => $datas['private'],
            'public_author' => Auth::user()->name,
            'cre_date' => $datas['day'],
            'ordering' => 1,
            'content' => $datas['content']
        ]);
        return $logs;
    }

    public function getDailyLog()
    {
        $logs = DailyLog::orderBy('created_at','DESC')->limit(3)->get();
        return $logs;
    }

    public function getLogDetails($id)
    {
        $detailLog = DailyLog::where('id',$id)->first();
        return $detailLog;
    }
}
