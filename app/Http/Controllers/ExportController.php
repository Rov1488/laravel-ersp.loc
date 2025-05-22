<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use avadim\FastExcelWriter\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{

    public function excelExport()
    {
        $post = Post::select('id', 'title', 'slug', 'category_id', 'language', 'description', 'content', 'image', 'user_id', 'author_id', 'created_at')
        ->orderBy('created_at', 'desc');
        //$post = Post::cursor();

        //dd($posts->id);
        $excel = Excel::create('Posts');
        $sheet = $excel->sheet();
        // Write attribute names

        // Begin area for direct access to cells
        $area = $sheet->beginArea();

        // Write headers to area, column letters are case independent
        $area
            ->setValue('A4', 'ID')
            ->setValue('B4', 'title')
            ->setValue('C4', 'Slug')
            ->setValue('D5', 'Category ID')
            ->setValue('E5', 'Language')
            ->setValue('F5', 'Description')
            ->setValue('G5', 'Content post')
            ->setValue('H5', 'Image')
            ->setValue('I5', 'User ID')
            ->setValue('J5', 'Author ID')
            ->setValue('K5', 'Created date')
        ;

        $area->setValue('A5', $post->id);
        $area->setValue('B5', $post->title);
        $area->setValue('C5', $post->slug);
        $area->setValue('D5', $post->category_id);
        $area->setValue('E5', $post->language);
        $area->setValue('F5', $post->description);
        $area->setValue('G5', $post->content);
        $area->setValue('H5', $post->image);
        $area->setValue('I5', $post->user_id);
        $area->setValue('J5', $post->author_id);
        $area->setValue('K5', $post->created_at);
        $sheet->writeAreas();

        $excel->save('expor-file_'.now()->format('Y-m-d_His').'.xlsx');

        return view('export-file.export');
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
            if($excel->save('post'. now()->format('Ymd_His') . '.xlsx')){
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

    public function createExelSpreadsheet()
    {
        // Увеличиваем лимиты в начале метода
       // ini_set('memory_limit', '8024M');  // Лимит оперативной памяти
       // set_time_limit(6600);  // Максимальное время выполнения (1 час)

        $query = Post::select('id', 'title', 'slug', 'category_id', 'language', 'description', 'content', 'image', 'user_id', 'author_id', 'created_at')
            ->orderBy('created_at', 'desc');
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
        $fileName = 'post'. now()->format('Ymd_His') . '.xlsx';
        $filePath = storage_path("app/public/{$fileName}");
        try {
            if($writer->save($filePath)){

                return response('success excel file generation good');
            }else{
                return response('error excel file generation good');
            }
        } catch (\Throwable $e) {
            Log::error('Export failed: ' . $e->getMessage());
            return back()->withError('Export failed');
        }

    }


}
