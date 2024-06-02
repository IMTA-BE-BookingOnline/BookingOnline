<?php

namespace App\Services;

use App\Models\OpeningHour;
use App\Models\Schedule;
use App\Models\StoreInformation;
use Carbon\Carbon;
use Illuminate\Http\Response;
use App\Traits\APIResponse;
use Illuminate\Support\Facades\DB;

class OpeningService
{
    use APIResponse;
    public function getAllOpeningHours()
    {
        return OpeningHour::with('storeInformation')->get();
    }

    public function getOpeningHour($storeid)
    {
        return StoreInformation::find($storeid)->openingHours()->get(['day', 'opening_time', 'closing_time']);
    }

    public function createOpeningHours($storeid)
    {
      return StoreInformation::where('id', $storeid)->first();

    }

    public function updateOpeningHours($storeid)
    {
        return StoreInformation::where('id', $storeid)->first();


    }

    public function deleteOpeningHour($id)
    {
        return StoreInformation::find($id);

    }
}
