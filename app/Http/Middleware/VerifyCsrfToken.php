<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'schools','residents','schoolsReportInspectors','schoolsReport','updateSchool','clinics','updateClinic','businesses','updateBusiness','flights','updateFlight','ferry','updateFerry','events','updateEvent','users','login','counties','updateCounty','userBenefits'
    ];
}
