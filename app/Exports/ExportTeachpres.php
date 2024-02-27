<?php

namespace App\Exports;

use App\Models\Present;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTeachpres implements FromCollection
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
                'Total Murid Sakit' => $item->student_s_p,
                'Total Murid Izin' => $item->student_i_p,
                'Total Murid Bolos' => $item->student_a_p,
                'Nama Murid Sakit' => $item->student_s_k_p,
                'Nama Murid Izin' => $item->student_i_k_p,
                'Nama Murid Bolos' => $item->student_a_k_p

            ];
        });

        return collect([
            ['Nama Guru', 'Hadir', 'Tidak Hadir'],
            [$teacherName, $present, $absent],
            ['----'], // Baris kosong untuk pemisah
            ['Tanggal', 'Kehadiran', 'Kelas', 'Pertemuan', 'Mapel', 'Topik Bahasan', 'Jumlah Murid', 'Total Murid Sakit', 'Total Murid Izin', 'Total Murid Bolos', 'Kehadiran Murid Sakit', 'Kehadiran Murid Izin', 'Kehadiran Murid Bolos'], // Header untuk data kehadiran
        ])->concat($presentData);
    }
}
