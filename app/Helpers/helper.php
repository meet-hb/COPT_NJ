<?php

use App\Models\Configuration;
use App\Models\Setting;
use App\Models\Therapy;
use App\Models\Treatment;
use App\Models\ViewMoreTreatment;
use PHPUnit\Framework\Attributes\IgnoreFunctionForCodeCoverage;

function howWeTreat()
{
    $therapies = Therapy::where('is_active', 1)->where('is_deleted', 0)->get();

    return $therapies;
}


function whatWeTreat()
{
    $treatments = Treatment::where('is_active', 1)->where('is_deleted', 0)->orderBy('sequence', 'asc')->get(['treatment_name']);

    return $treatments;
}


function directAccess()
{
    $directAccess = Setting::where('name', 'directaccess')->first();

    return $directAccess;
}


function insuranceInfo()
{
    $insuranceInfo = Setting::where('name', 'insuranceinfo')->first();

    return $insuranceInfo;
}


function viewMoreConditions($type)
{
    $viewMoreConditions = ViewMoreTreatment::join('treatment_details', 'view_more_treatments.id', '=', 'treatment_details.treatment_id')->where('view_more_treatments.name', $type)->get(['view_more_treatments.name', 'treatment_details.type', 'treatment_details.id as treatment_id', 'treatment_details.description']);

    return $viewMoreConditions;
}


function getConfig()
{
    $websiteLogo1 = Configuration::where('type', 'websitelogo1')->first();
    $websiteLogo2 = Configuration::where('type', 'websitelogo2')->first();
    $adminPannelLogo = Configuration::where('type', 'adminlogo')->first();

    return [
        'websiteLogo1' => $websiteLogo1,
        'websiteLogo2' => $websiteLogo2,
        'adminPannelLogo' => $adminPannelLogo,
    ];
}
