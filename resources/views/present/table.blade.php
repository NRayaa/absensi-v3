<table class="table table-striped text-small-on-mobile">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col" class="hidden-on-mobile">Kehadiran</th>
            <th scope="col" class="hidden-on-mobile">Kelas</th>
            <th scope="col" class="hidden-on-mobile">Ke-</th>
            <th scope="col">Tanggal</th>
            <th scope="col" class="hidden-on-mobile">Mapel</th>
            <th scope="col" class="hidden-on-mobile">Topik</th>
            <th scope="col" class="hidden-on-mobile">J Murid</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($presents as $present)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$present->teacher_p}}</td>
                <td class="hidden-on-mobile">{{$present->attend_p}}</td>
                <td class="hidden-on-mobile">{{$present->class_p}}</td>
                <td class="hidden-on-mobile">{{$present->meet_p}}</td>
                <td>{{$present->date_p}}</td>
                <td class="hidden-on-mobile">{{$present->subject_p}}</td>
                <td class="hidden-on-mobile">{{$present->topic_p}}</td>
                <td class="hidden-on-mobile">{{$present->student_p}}</td>
                <td><a href="{{route('present.show', $present->id)}}" type="button" class="btn btn-warning text-small-on-mobile">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
