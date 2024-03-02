<?php

namespace App\Exports;

use App\Models\Present;
use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPersonal implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $teacherDetail = Teacher::find($this->id);
        $teacherName = $teacherDetail->name_teacher;
        $teacherPresent = Present::where('teacher_p', $teacherName)->get();
        $present = $teacherPresent->where('attend_p', 'Hadir')->count();
        $absent = $teacherPresent->where('attend_p', 'Tidak hadir')->count();

        $presentData = $teacherPresent->map(function ($item) {
            return [
                'Tanggal' => $item->date_p, // Ganti 'tanggal' dengan atribut yang sesuai
                'Kehadiran' => $item->attend_p, // Ganti 'attend_p' dengan atribut yang sesuai
                'Kelas' => $item->class_p,
                'Pertemuan' => $item->meet_p,
                'Mapel' => $item->subject_p,
                'Topik Bahasan' => $item->topic_p,
                'Jumlah Murid' => $item->student_p,
                'Total Sakit' => $item->student_s_p,
                'Total Izin' => $item->student_i_p,
                'Total Bolos' => $item->student_a_p,
                'Murid Sakit' => $item->student_s_k_p,
                'Murid Izin' => $item->student_i_k_p,
                'Murid Bolos' => $item->student_a_k_p,
                'Waktu Presensi' => $item->created_at

            ];
        });

        return collect([
            ['Nama Guru', 'Hadir', 'Tidak Hadir'],
            [$teacherName, $present, $absent],
            ['----'], // Baris kosong untuk pemisah
            ['Tanggal', 'Kehadiran', 'Kelas', 'Pertemuan', 'Mapel', 'Topik Bahasan', 'Jumlah Murid', 'Total Sakit', 'Total Izin', 'Total Bolos', 'Murid Sakit', 'Murid Izin', 'Murid Bolos', 'Waktu Presensi'], // Header untuk data kehadiran
        ])->concat($presentData);
    }
}
