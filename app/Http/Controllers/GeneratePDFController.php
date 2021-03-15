<?php

namespace App\Http\Controllers;

use App\Models\PDF\ExportFlap;
use App\Models\PDF\GeneralList;
use App\Models\PDF\GeneralListContinuation;
use App\Models\PDF\Guarantee;
use App\Models\PDF\ImportFlap;
use App\Models\PDF\MainSheet;
use App\Models\PDF\ReexportFlap;
use App\Models\PDF\ReimportFlap;
use App\Models\PDF\TransitFlap;
use Dompdf\Dompdf;
use Dompdf\Options;
use iio\libmergepdf\Merger;
use Illuminate\View\View;

class GeneratePDFController extends Controller
{
    private function generatePdf(string $view, array $data = [], bool $setRemote = false, bool $returnDompdf = false): string
    {
        $option = new Options();
        $option->set('isRemoteEnabled', $setRemote);
        $dompdf = new Dompdf($option);
        $dompdf->setPaper('A4');
        $dompdf->loadHtml(view($view, $data));
        $dompdf->render();
        if ($returnDompdf) {
            return $dompdf->output();
        }
        $dompdf->stream("some_name", ['Attachment' => 0]);
    }

//  ------------------------------------------------------  -----------
    public function mainSheet(MainSheet $mainSheet)
    {
        $this->generatePdf('mainSheet', $mainSheet->data, true);
    }

    public function mainSheetPreview(MainSheet $mainSheet): view
    {
        return view("mainSheet", $mainSheet->data, true);
    }

//  ------------------------------------------------------  -----------

    public function generalList(GeneralList $generalList): void
    {
        $this->generatePdf('generalList', $generalList->data);

    }

    public function generalListPreview(GeneralList $generalList): view
    {
        return view('generalList', $generalList->data);
    }

//  ------------------------------------------------------  -----------
    public function generalListContinuation(generalListContinuation $generalList): void
    {
        $this->generatePdf('generalListContinuation', $generalList->data);

    }

    public function generalListContinuationPreview(generalListContinuation $generalList): view
    {
        return view('generalListContinuation', $generalList->data);
    }

//  ------------------------------------------------------  -----------
    public function rules(): void
    {
        $this->generatePdf('rules', [], true);

    }

    public function rulesPreview()
    {
        return view('rules');
    }

//  ------------------------------------------------------  -----------
    public function guarantee(Guarantee $guarantee): void
    {
        $this->generatePdf('guarantee', $guarantee->data);

    }

    public function guaranteePreview(Guarantee $guarantee): view
    {
        return view('guarantee', $guarantee->data);
    }

//  ------------------------------------------------------  -----------
//                              Flaps

    public function importFlap(ImportFlap $importFlap): void
    {
        $this->generatePdf('importFlap', $importFlap->data);
    }

    public function importFlapPreview(ImportFlap $importFlap): view
    {
        return view("importFlap", $importFlap->data);
    }

//  ------------------------------------------------------  -----------
    public function exportFlap(ExportFlap $exportFlap): void
    {
        $this->generatePdf('exportFlap', $exportFlap->data);
    }

    public function exportFlapPreview(ExportFlap $exportFlap): view
    {
        return view("exportFlap", $exportFlap->data);
    }

//  ------------------------------------------------------  -----------
    public function reimportFlap(ReimportFlap $reimportFlap): void
    {
        $this->generatePdf('reimportFlap', $reimportFlap->data);
    }

    public function reimportFlapPreview(ReimportFlap $reimportFlap): view
    {
        return view("reimportFlap", $reimportFlap->data);
    }

//  ------------------------------------------------------  -----------
    public function reexportFlap(ReexportFlap $reexportFlap): void
    {
        $this->generatePdf('reexportFlap', $reexportFlap->data);
    }

    public function reexportFlapPreview(ReexportFlap $reexportFlap): view
    {
        return view("reexportFlap", $reexportFlap->data);
    }

//  ------------------------------------------------------  -----------
    public function transitFlap(TransitFlap $transitFlap): void
    {
        $this->generatePdf('transitFlap', $transitFlap->data);
    }

    public function transitFlapPreview(TransitFlap $transitFlap): view
    {
        return view("transitFlap", $transitFlap->data);
    }
//  ------------------------------------------------------  -----------
//                                   Talons

    public function exportReimportTalon(): void
    {
        $this->generatePdf('exportReimportTalon');
    }

    public function exportReimportTalonPreview(): view
    {
        return view("exportReimportTalon");
    }

//  ------------------------------------------------------  -----------
    public function importReexportTalon(): void
    {
        $this->generatePdf('importReexportTalon');
    }

    public function importReexportTalonPreview(): view
    {
        return view("importReexportTalon");
    }

//  ------------------------------------------------------  -----------
    public function transitTalon(): void
    {
        $this->generatePdf('transitTalon');
    }

    public function transitTalonPreview(): view
    {
        return view("transitTalon");
    }
//  ------------------------------------------------------  -----------
//                                  Full Pdf

    public function FullPdf(
        ExportFlap $exportFlap,
        ImportFlap $importFlap,
        ReimportFlap $reimportFlap,
        ReexportFlap $reexportFlap,
        TransitFlap $transitFlap,
        MainSheet $mainSheet,
        GeneralList $generalList,
        Guarantee $guarantee,
        Merger $merger
    )
    {
        $merger->addRaw($this->generatePdf('mainSheet', $mainSheet->data, true, true));
        $merger->addRaw($this->generatePdf('generalList', $generalList->data, false, true));

        $merger->addRaw($this->generatePdf('exportReimportTalon', [], false, true));
        $merger->addRaw($this->generatePdf('importReexportTalon', [], false, true));
        $merger->addRaw($this->generatePdf('transitTalon', [], false, true));

        $merger->addRaw($this->generatePdf('exportFlap', $exportFlap->data, false, true));
        $merger->addRaw($this->generatePdf('importFlap', $importFlap->data, false, true));
        $merger->addRaw($this->generatePdf('reexportFlap', $reexportFlap->data, false, true));
        $merger->addRaw($this->generatePdf('reimportFlap', $reimportFlap->data, false, true));
        $merger->addRaw($this->generatePdf('transitFlap', $transitFlap->data, false, true));
        $merger->addRaw($this->generatePdf('rules', [], true, true));
        $merger->addRaw($this->generatePdf('guarantee', $guarantee->data, false, true));
        return response($merger->merge())->header('Content-type', 'application/pdf');
    }

    public function FullPdfPreview(): view
    {
        return view("fullPdf");
    }
}
