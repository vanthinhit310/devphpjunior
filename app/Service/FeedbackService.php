<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/20/2019
 * Time: 3:01 AM
 */

namespace App\Service;

use App\Model\Feedback;

class FeedbackService
{
    public function createFeedbackRecords($datas)
    {
        $feedback = Feedback::create($datas);
        return $feedback;
    }
}
