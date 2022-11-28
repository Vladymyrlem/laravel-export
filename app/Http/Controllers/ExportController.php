<?php

namespace App\Http\Controllers;

use App\Exports\CompaniesExport;
use App\Imports\CompaniesImport;
use App\Imports\UsersImport;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flowgistics\XML\XML;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index(){
        DB::table('companies')->truncate();
        $csvData = fopen(base_path('database/csv/Kompanyy.csv'), 'r');
        $mydata = fgetcsv($csvData, 555, ',');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Companies::create([
                    'title_company' => $data['0'],
                    'content' => $data['1'],
                    'company_category' => $data['2'],
                    'thumbnail' => $data['3'],
                    'adr_title' => $data['4'],
                    'adr_url' => $data['5'],
                    'adr_target' => $data['6'],
                    'about_company' => $data['7'],
                    'related_companies' => $data['8'],
                    'tags' => $data['9'],
                    'boss' => $data['10'],
                    'payments' => $data['11'],
                    'services_list' => $data['12'],
                    'additional_information' => $data['13'],
                    'seo' => $data['14'],
                    'gallery' => $data['15'],
                    'news' => $data['16'],
                    'contacts_fax' => $data['17'],
                    'contacts_phone' => $data['18'],
                    'contacts_comment-to-phone' => $data['19'],
                    'emails-group_email' => $data['20'],
                    'emails-group_comment-to-email' => $data['21'],
                    'connectivity_options_options_list' => $data['22'],
                    'connectivity_options_comment-to-option' => $data['23'],
                    'links_link' => $data['24'],
                    'social_links_social_link' => $data['25'],
                    'social_links_social_lists' => $data['26'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
        return view('welcome', compact('csvData', 'mydata'));
    }
    public function import(){
        $xmlDataString = file_get_contents(public_path('Kompanyia.xml'));
        $csvData = fopen(base_path('database/csv/Kompanyia.xml'), 'r');
        $import = XML::import($xmlDataString)
            ->toArray();
        return view('welcome', compact('import'));
    }
        function importcsv(Request $request)
        {

            $data = new CompaniesImport();
                Excel::import(new CompaniesImport(),'Kompanyy.csv');
            $companies = [
                'title_company' => $data['0'],
                'content' => $data['1'],
                'company_category' => $data['2'],
                'thumbnail' => $data['3'],
                'adr_title' => $data['4'],
                'adr_url' => $data['5'],
                'adr_target' => $data['6'],
                'about_company' => $data['7'],
                'related_companies' => $data['8'],
                'tags' => $data['9'],
                'boss' => $data['10'],
                'payments' => $data['11'],
                'services_list' => $data['12'],
                'additional_information' => $data['13'],
                'seo' => $data['14'],
                'gallery' => $data['15'],
                'news' => $data['16'],
                'contacts_fax' => $data['17'],
                'contacts_phone' => $data['18'],
                'contacts_comment-to-phone' => $data['19'],
                'emails-group_email' => $data['20'],
                'emails-group_comment-to-email' => $data['21'],
                'connectivity_options_options_list' => $data['22'],
                'connectivity_options_comment-to-option' => $data['23'],
                'links_link' => $data['24'],
                'social_links_social_link' => $data['25'],
                'social_links_social_lists' => $data['26'],
            ];
                    foreach($data as $row)
                    {
                        $insert_data[] = $companies;
                    }
                if(!empty($insert_data))
                {
                    DB::table('companies')->insert($insert_data);
                }
                $count = Excel::toArray(new CompaniesImport(),'Kompanyy.csv');
//            return view('welcome', compact('count'));
            foreach ($companies as $key => $record) {
                dd($record['company_category'], $record);
            }
        }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fileImport(Request $request)
    {
        Excel::import(new CompaniesImport(), $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function fileExport()
    {
        return Excel::download(new CompaniesExport(), 'Kompanyy.xlsx');
    }
}
