<?php

namespace App\Imports;

use App\Models\Companies;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompaniesImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $data = 0;
    public function model(array $data)
    {
if($data == null){
    $data = 'empty';
}
        return new Companies([
            'title_company' => $data['title_company'],
            'content' => $data['content'],
            'company_category' => $data['company_category'],
            'thumbnail' => $data['thumbnail'],
            'adr_title' => $data['adr_title'],
            'adr_url' => $data['adr_url'],
            'adr_target' => $data['adr_target'],
            'about_company' => $data['about_company'],
            'related_companies' => $data['related_companies'],
            'tags' => $data['tags'],
            'boss' => $data['boss'],
            'payments' => $data['payments'],
            'services_list' => $data['services_list'],
            'additional_information' => $data['additional_information'],
            'seo' => $data['seo'],
            'gallery' => $data['gallery'],
            'news' => $data['news'],
            'contacts_fax' => $data['contacts_fax'],
            'contacts_phone' => $data['contacts_phone'],
            'contacts_comment_to_phone' => $data['contacts_comment_to_phone'],
            'emails_group_email' => $data['emails_group_email'],
            'emails-group_comment_to_email' => $data['emails_group_comment_to_email'],
            'connectivity_options_options_list' => $data['connectivity_options_options_list'],
            'connectivity_options_comment-to-option' => $data['connectivity_options_comment_to_option'],
            'links_link' => $data['links_link'],
            'social_links_social_link' => $data['social_links_social_link'],
            'social_links_social_lists' => $data['social_links_social_lists'],
        ]);
    }
//    public function model(array $row)
//    {
//        ++$this->data;
//
//        return new Companies([
//            'title_company' => $row[0],
//        ]);
//    }

    public function getRowCount(): int
    {
        return $this->data;
    }
}
