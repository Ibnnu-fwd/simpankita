<?php

namespace App\Observers;

class OfficeObserver
{
    protected function onCreating($model)
    {
        $model->created_by = auth()->user()->id;
    }


}
