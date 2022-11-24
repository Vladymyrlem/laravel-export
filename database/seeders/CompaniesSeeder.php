<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Companies::truncate();
            $csvData = fopen(base_path('database/csv/Kompanyy.csv'), 'r');
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
    }
}
