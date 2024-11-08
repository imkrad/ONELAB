<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Laboratory\ReportClass;

class ReportController extends Controller
{
    public function __construct(ReportClass $report){
        $this->report = $report;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return [
                    'laboratories' => $this->report->laboratories($request)
                ];
            break;
            case 'tops':
                return [
                    'samples' => $this->report->samples($request),
                    'analyses' => $this->report->analyses($request),
                    'gratis' => $this->report->gratis($request)
                ];
            break;
            case 'TSR Request':
                return $this->report->breakdownTsrs($request);
            break;
            case 'Analyses':
                return $this->report->breakdownAnalyses($request);
            break;
            case 'report-or':
                return $this->report->printReportOr($request);
            break;
            case 'download':
                return $this->report->printTsr($request);
            break;
        }
    }

    public function show(Request $request, $code){
        switch($code){
            case 'accomplishments':
                return inertia('Modules/Laboratory/Reports/Accomplishments/Index',[
                    'years' => $this->report->years(),
                    'types' => $this->report->laboratory_types(),
                    'info' => [
                        'month' => \DateTime::createFromFormat('!m', date('m'))->format('F'),
                        'year' => date('Y')
                    ]
                ]);
            break;
            case 'tops':
                return inertia('Modules/Laboratory/Reports/Tops/Index',[
                    'years' => $this->report->years(),
                    'types' => $this->report->laboratory_types(),
                    'info' => [
                        'month' => \DateTime::createFromFormat('!m', date('m'))->format('F'),
                        'year' => date('Y')
                    ]
                ]);
            break;
        }
    }
}
