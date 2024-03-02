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
        ->get(['teacher_p', 'attend_p', 'class_p', 'meet_p', 'date_p', 'subject_p', 'topic_p', 'student_p','student_s_p', 'student_i_p', 'student_a_p', 'student_s_k_p', 'student_i_k_p', 'student_a_k_p', 'created_at']);

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
                'Total Sakit' => $item->student_s_p,
                'Total Izin' => $item->student_i_p,
                'Total Alfa' => $item->student_a_p,
                'Murid Sakit' => $item->student_s_k_p,
                'Murid Izin' => $item->student_i_k_p,
                'Murid Alfa' => $item->student_a_k_p,
                'Waktu Presensi' => $item->created_at
            ];
        });

        return collect([
            ['PRESENSI GURU'], // Baris kosong untuk pemisah
            ['Nama Guru', 'Tanggal', 'Kehadiran', 'Kelas', 'Pertemuan', 'Mapel', 'Topik Bahasan', 'Jumlah Murid', 'Total Sakit', 'Total Izin', 'Total Alfa', 'Murid Sakit', 'Murid Izin', 'Murid Alfa', 'Waktu Presensi'], // Header untuk data kehadiran
        ])->concat($presentData);
    }
}
