<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
function import_CSV($filename, $delimiter = ','){
    if(!file_exists($filename) || !is_readable($filename))
        return false;
    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false){
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false){
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}
class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return array
     */

    public function run()
    {

        Companies::truncate();
        $csvData = fopen(base_path('database/csv/Kompanyy.csv'), 'r');
        $mydata = fgetcsv($csvData, 555, ',');
        $transRow = true;
            $header = null;
            $arr = array();
        while (($data = $mydata) !== false) {

            if (!$transRow) {
                foreach ($data as   $value) {
                    Companies::create([
                        'title_company' => $data->title_company,
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
            }
            $transRow = false;
            if (is_resource($csvData)) {
            fclose($csvData);
            }
        }
    }
}
