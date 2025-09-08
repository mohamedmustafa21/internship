<?php

namespace App\Exports;

use App\Models\Intern;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InternExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Intern::whereDate('created_at', '>=', '2025-01-01')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
                        'Birthdate',

            'Email',
            'Mobile',
            'City',
            'Address',
                        'Military Status',

            'University',
            'Bachelor Degree',
            'Graduation Year',
            'Grade',
            'Major',
                        'Preferred Program', // <-- تم تعديل التسمية هنا فقط
                                    'Preferred Engineering Field',


            'Industry First Choice',
            'Industry Second Choice',
            'Preferred Training Fieldd',
            'AutoCAD Rating',
            'Solidworks Rating',
            'What makes you best candidate',
            'Training Info',
            'Source',
            'Referral',
            'ID Card',
            'Certificate',
            '10th of Ramadan Training',
            'Ain Sokhna Training',
        ];
    }

    public function map($intern): array
    {
        $fileUrl = url('assets/' . $intern->grade_certificate);
        $id_fileUrl = url('assets/' . $intern->student_id_card);

        $the_10th_of_ramadan = $intern->training_10th_of_Ramadan == 'I Agree' ? 'I Agree Training in 10th of Ramadan' : 'Don\'t Agree';
        $ain_sokhna = $intern->training_ain_sokhna == 'I Agree' ? 'I Agree Training in Ain Sokhna' : 'Don\'t Agree';

        return [
            $intern->full_name,
                        $intern->birthdate,

            $intern->email,
            $intern->mobile,
            $intern->city,
            $intern->address,
           $intern->military_service_status, // تأكد إن العمود ده موجود في جدول interns
            $intern->university,
            $intern->bachelor_degree,
            $intern->graduation_year,
            $intern->grade,
            $intern->major,
                        $intern->preferred_industry, // نفس القيمة، لكن العنوان اتغير
                                    $intern->preferred_training_field,


            $intern->industry_first_choice,
            $intern->industry_second_choice,
            $intern->training_fieldd,
            $intern->autocad_rating,
            $intern->solidworks_rating,
            $intern->intern_opinion,
            $intern->training_info,
            $intern->source,
            $intern->referral_name,
            $id_fileUrl,
            $fileUrl,
            $the_10th_of_ramadan,
            $ain_sokhna,
        ];
    }
}
