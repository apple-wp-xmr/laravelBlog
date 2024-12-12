<?php

namespace App\Http\Controllers\Educ;


use App\Exporter\UserStatsExporterContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function handle(UserStatsExporterContract $userStatsCsvExpoerter){
        // $userStatsCsvExpoerter = new UserStatsCsvExpoerter();
        return $userStatsCsvExpoerter->export(12);
    }
}
