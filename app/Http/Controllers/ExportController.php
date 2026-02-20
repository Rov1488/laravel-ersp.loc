<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use avadim\FastExcelWriter\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use setasign\Fpdi\Tcpdf\Fpdi;

class ExportController extends Controller
{

    public function excelExport()
    {
        $post = Post::select('id', 'title', 'slug', 'category_id', 'language', 'description', 'content', 'image', 'user_id', 'author_id', 'created_at')
            ->orderBy('created_at', 'desc');
        //$post = Post::cursor();

        //dd($post->first()->id);
        $excel = Excel::create('Posts');
        $sheet = $excel->sheet();
        // Write attribute names

        // Begin area for direct access to cells
        $area = $sheet->beginArea();

        // Write headers to area, column letters are case independent

        $row = 5;

        foreach ($post->cursor() as $item) {
            $area->setValue("A{$row}", $item->id);
            $area->setValue("B{$row}", $item->title);
            $area->setValue("C{$row}", $item->slug);
            $area->setValue("D{$row}", $item->category_id);
            $area->setValue("E{$row}", $item->language);
            $area->setValue("F{$row}", $item->description);
            $area->setValue("G{$row}", $item->content);
            $area->setValue("H{$row}", $item->image);
            $area->setValue("I{$row}", $item->user_id);
            $area->setValue("J{$row}", $item->author_id);
            $area->setValue("K{$row}", $item->created_at);

            $row++;
        }
        // $area
        //     ->setValue('A4', 'ID')
        //     ->setValue('B4', 'title')
        //     ->setValue('C4', 'Slug')
        //     ->setValue('D5', 'Category ID')
        //     ->setValue('E5', 'Language')
        //     ->setValue('F5', 'Description')
        //     ->setValue('G5', 'Content post')
        //     ->setValue('H5', 'Image')
        //     ->setValue('I5', 'User ID')
        //     ->setValue('J5', 'Author ID')
        //     ->setValue('K5', 'Created date')
        // ;

        // $area->setValue('A5', $post->id);
        // $area->setValue('B5', $post->title);
        // $area->setValue('C5', $post->slug);
        // $area->setValue('D5', $post->category_id);
        // $area->setValue('E5', $post->language);
        // $area->setValue('F5', $post->description);
        // $area->setValue('G5', $post->content);
        // $area->setValue('H5', $post->image);
        // $area->setValue('I5', $post->user_id);
        // $area->setValue('J5', $post->author_id);
        // $area->setValue('K5', $post->created_at);
        // $sheet->writeAreas();

        if ($excel->save('expor-file_' . now()->format('Y-m-d_His') . '.xlsx')) {
            return response('success excel file generation good');
        }

        //return view('export-file.export');
    }

    public function excelExportGrok()
    {
        // Увеличиваем лимиты в начале метода
        //ini_set('memory_limit', '8024M');  // Лимит оперативной памяти
        //set_time_limit(6600);              // Максимальное время выполнения (1 час)
        // Create Excel file
        $excel = Excel::create('Posts');
        $sheet = $excel->sheet();
        $area = $sheet->beginArea();
        // Write headers to area, column letters are case independent
        $area
            ->setValue('A4', 'ID')
            ->setValue('B4', 'title')
            ->setValue('C4', 'Slug')
            ->setValue('D4', 'Category ID')
            ->setValue('E4', 'Language')
            ->setValue('F4', 'Description')
            ->setValue('G4', 'Content post')
            ->setValue('H4', 'Image')
            ->setValue('I4', 'User ID')
            ->setValue('J4', 'Author ID')
            ->setValue('K4', 'Created date')
        ;
        $sheet->writeAreas();
        $query = Post::select('id', 'title', 'slug', 'category_id', 'language', 'description', 'content', 'image', 'user_id', 'author_id', 'created_at')
            ->orderBy('created_at', 'desc')->limit(100000);

        foreach ($query->cursor() as $post) {
            $sheet->writeRow([
                $post->id,
                $post->title,
                $post->slug,
                $post->category_id,
                $post->language,
                $post->description,
                $post->content,
                $post->image,
                $post->user_id,
                $post->author_id,
                $post->created_at->format('Y-m-d H:i:s')
            ]);
        }
        try {
            // Save the file to storage

            // Storage::disk('local')->put('public/', $filePath);
            // Optionally, return the file for download
            //$downloadFile = $excel->download('post'. now()->format('Ymd_His') . '.xlsx')
            if ($excel->save('post' . now()->format('Ymd_His') . '.xlsx')) {
                return response('success excel file generation good');
            }

            //return Storage::download($filePath, 'Posts.xlsx');
            /*return view('export-file.export', [
                'downloadLink' => $downloadFile
            ]);*/
        } catch (\Throwable $e) {
            Log::error('Export failed: ' . $e->getMessage());
            return back()->withError('Export failed');
        }
    }

    /**
     * Test use template excel file
     */
    public function createUseExcelTemplate()
    {
        $excel = Excel::create('template');
    }

    /**
     *Use test create excel file with PHPSpreadsheet packagist
     */
    public function createExcelSpreadsheet()
    {
        // Увеличиваем лимиты в начале метода
        ini_set('memory_limit', '8024M');  // Лимит оперативной памяти
        set_time_limit(6600);  // Максимальное время выполнения (1 час)

        $query = Post::select('id', 'title', 'slug', 'category_id', 'language', 'description', 'content', 'image', 'user_id', 'author_id', 'created_at')
            ->orderBy('created_at', 'desc')->limit(5000);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Title');
        $sheet->setCellValue('C1', 'Slug');
        $sheet->setCellValue('D1', 'Category ID');
        $sheet->setCellValue('E1', 'Language');
        $sheet->setCellValue('F1', 'Description');
        $sheet->setCellValue('G1', 'Content post');
        $sheet->setCellValue('H1', 'Image');
        $sheet->setCellValue('I1', 'User ID');
        $sheet->setCellValue('J1', 'Author ID');
        $sheet->setCellValue('K1', 'Created date');

        $row = 2;
        foreach ($query->cursor() as $post) {
            $sheet->setCellValue("A{$row}", $post->id);
            $sheet->setCellValue("C{$row}", 'Slug');
            $sheet->setCellValue("D{$row}", 'Category ID');
            $sheet->setCellValue("E{$row}", 'Language');
            $sheet->setCellValue("F{$row}", 'Description');
            $sheet->setCellValue("G{$row}", 'Content post');
            $sheet->setCellValue("H{$row}", 'Image');
            $sheet->setCellValue("I{$row}", 'User ID');
            $sheet->setCellValue("J{$row}", 'Author ID');
            $sheet->setCellValue("K{$row}", 'Created date');
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'post' . now()->format('Ymd_His') . '.xlsx';
        $filePath = storage_path("app/public/{$fileName}");
        try {
            if ($writer->save($filePath)) {

                return response('success excel file generation good');
            } else {
                return response('error excel file generation good');
            }
        } catch (\Throwable $e) {
            Log::error('Export failed: ' . $e->getMessage());
            return back()->withError('Export failed');
        }
    }

    public function generatePdf()
    {
        $pdf = new FPDI();

        // Установка версии PDF ДО добавления страницы!
        $pdf->setPDFVersion('1.7');
        $templatedFile = storage_path('app/public/mayning_ruxsatnoma_shablon (1).pdf'); // mayning_ruxsatnoma_shablon.pdf
        // Добавляем страницу из шаблона
        $pageCount = $pdf->setSourceFile($templatedFile);
        $templateId = $pdf->importPage(1); // импортируем первую страницу

        // Добавляем страницу в новый документ
        $pdf->AddPage();
        $pdf->useTemplate($templateId);
        // $pdf->setCreator('Laravel PDF Generator');
        // $pdf->setAuthor('Your Name');
        // $pdf->setTitle('Generated PDF');
        // $pdf->setSubject('PDF Generation Example');
        // Устанавливаем шрифт и добавляем текст
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(50, 50);
        $pdf->Write(0, 'Hello World!');

        // Сохраняем или отдаем файл
        return $pdf->Output('generated.pdf', 'I');
    }
    // Test use API with cURL RECLAIM upload payout file
    public function testApi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandboxerspapi.e-osgo.uz/api/v3/reclaim/upload-payout-file',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('reClaimUuid' => '98cda636-e0d1-4bab-b1f7-876424f28921', 'file' => new CURLFILE('/C:/Users/r_pulatov/Downloads/RECLAIM V2.pdf')),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . env('BEARER_TOKEN')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
