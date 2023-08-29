<?php

namespace App\Services\ProcessImport\Services;

use App\Models\Stats;

class StatsService
{
    public static function insertFromStdObjectToDb($data, $attributeId)
    {
        $stats = Stats::where(['attribute_id' => $attributeId])->first();
        if(!$stats){
            $stats = new Stats();
            $stats->attribute_id = $attributeId;
        }

        $stats->subscriptions = ($data->subscriptions) ? $data->subscriptions : null ;
        $stats->monthlySearches = ($data->monthlySearches) ? $data->monthlySearches : null ;
        $stats->views = ($data->views) ? $data->views : null ;
        $stats->videosCount = ($data->videosCount) ? $data->videosCount : null ;
        $stats->premiumVideosCount = ($data->premiumVideosCount) ? $data->premiumVideosCount : null ;
        $stats->whiteLabelVideoCount = ($data->whiteLabelVideoCount) ? $data->whiteLabelVideoCount : null ;
        $stats->rank = ($data->rank) ? $data->rank : null ;
        $stats->rankPremium = ($data->rankPremium) ? $data->rankPremium : null ;
        $stats->rankWl = ($data->rankWl) ? $data->rankWl : null ;

        $stats->save();

        return $stats;
    }

}
