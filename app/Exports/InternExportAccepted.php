<?php

namespace App\Exports;

use App\Models\Intern;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Storage;


class InternExportAccepted implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Intern::where('IsAccepted', 1)->get();
    }

    public function headings(): array
    {
        // return an array of headings
        return ['Name', 'Preferred Industry','Preferred Training Field','University','Bachelor Degree','Graduation Year','Major','Grade','AutoCAD Rating','Solid Rating','Certificate','ID Card','Email','Mobile','City','Address','Training Info','Source','Referral','10th of ramadan training','ain sokhna training','What makes you best candidate'];
    }

    public function map($intern): array
    {
        // return an array of values to be mapped to columns
        $fileUrl = url('assets/'.$intern->grade_certificate);
        $id_fileUrl = url('assets/'.$intern->student_id_card);
        $the_10th_of_ramadan = $student->training_10th_of_Ramadan == 'I Agree' ? 'I Agree Training in 10th of Ramadan' : 'Don\'t Agree';
        $ain_sokhna = $student->training_ain_sokhna == 'I Agree' ? 'I Agree Training in 10th of Ramadan' : 'Don\'t Agree';

        return [
            $intern->full_name,
            $intern->preferred_industry,
            $intern->preferred_training_field,
            $intern->university,
            $intern->bachelor_degree,
            $intern->graduation_year,
            $intern->major,
            $intern->grade,
            $intern->autocade,
            $intern->solidwork,
            $fileUrl,
            $intern->email,
            $intern->mobile,
            $intern->city,
            $intern->address,
            $intern->training_info,
            $intern->source,
            $intern->referral_name,
            // $intern->language1,
            // $intern->language1_rating,
            // $intern->language2,
            // $intern->language2_rating,
            $the_10th_of_ramadan,
            $ain_sokhna,
            $intern->intern_opinion,


        ];
    }
}
