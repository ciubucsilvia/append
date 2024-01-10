<?php

namespace App\Http\Controllers\Append;

use ZanySoft\LaravelPDF\PDF;

class ServiceController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(string $slug)
    {
        $service = $this->serviceRepository->getBySlug($slug);
        if(!$service) abort(404);

        $this->title = $service->title;
        $this->description = $service->description;

        $serviceList = $this->serviceRepository->getServices();
    
        if($service) {
            $this->content = view(env('THEME') . '.service_show', 
                compact('service', 'serviceList'));
            return $this->renderOutput();
        }
        return abort(404);
    }

    public function downloadPdf(string $slug)
    {
        $service = $this->serviceRepository->getBySlug($slug);
        $content = view(env('THEME') . '.service_download', 
            compact('service'))->render();

        // create PDF
        $pdf = new PDF();
        $pdf->title = $service->title;
        $pdf->loadHTML($content);
        // dd($content->render());
        // open PDF in Browser
        return $pdf->stream($service->title);
    }

    public function downloadDoc(string $slug)
    {
        $service = $this->serviceRepository->getBySlug($slug);
    }
}
