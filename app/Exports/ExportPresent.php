<?php

namespace App\Exports;

use App\Models\Present;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPresent implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $allpresent = Present::orderBy('created_at', 'asc')
        ->get(['teacher_p', 'attend_p', 'class_p', 'meet_p', 'date_p', 'subject_p', 'topic_p', 'student_p','student_s_p', 'student_i_p', 'student_a_p', 'student_s_k_p', 'student_i_k_p', 'student_a_k_p']);

        $presentData = $allpresent->map(function ($item) {
            return [
                'Nama Guru' => $item->teacher_p,
                'Tanggal' => $item->date_p, // Ganti 'tanggal' dengan atribut yang sesuai
                'Kehadiran' => $item->attend_p, // Ganti 'attend_p' dengan atribut yang sesuai
                'Kelas' => $item->class_p,
                'Pertemuan' => $item->meet_p,
                'Mapel' => $item->subject_p,
                'Topik Bahasan' => $item->topic_p,
                'Jumlah Murid' => $item->student_p,
                'Total Murid Sakit' => $item->student_s_p,
                'Total Murid Izin' => $item->student_i_p,
                'Total Murid Bolos' => $item->student_a_p,
                'Nama Murid Sakit' => $item->student_s_k_p,
                'Nama Murid Izin' => $item->student_i_k_p,
                'Nama Murid Bolos' => $item->student_a_k_p
            ];
        });

        return collect([
            ['PRESENSI GURU'], // Baris kosong untuk pemisah
            ['Nama Guru', 'Tanggal', 'Kehadiran', 'Kelas', 'Pertemuan', 'Mapel', 'Topik Bahasan', 'Jumlah Murid', 'Total Murid Sakit', 'Total Murid Izin', 'Total Murid Bolos', 'Kehadiran Murid Sakit', 'Kehadiran Murid Izin', 'Kehadiran Murid Bolos'], // Header untuk data kehadiran
        ])->concat($presentData);
    }
}
