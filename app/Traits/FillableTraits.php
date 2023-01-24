<?php

namespace App\Traits;

use App\Traits\FillableTraits;
use Illuminate\Support\Facades\Schema;


trait FillableTraits
{
    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }
}
