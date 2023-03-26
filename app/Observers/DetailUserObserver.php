<?php

namespace App\Observers;

class DetailUserObserver
{
    public function created($params)
    {
        if(auth()->check()) {
            $params->created_by = auth()->user()->id;
            $params->is_active  = 1;
        }
    }

    public function updated($detailUser)
    {
        if(auth()->check()) {
            $detailUser->updated_by = auth()->user()->id;
        }
    }
}
