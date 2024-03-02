<table class="table table-striped text-small-on-mobile">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Keperluan</th>
            <th scope="col" class="hidden-on-mobile">Izin</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $pms)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$pms->teacher_pms}}</td>
                <td class="">{{$pms->purpose_pms}}</td>
                <td class="hidden-on-mobile">{{$pms->subject_pms}}</td>
                <td><a href="{{route('permission.show', $pms->id)}}" type="button" class="btn btn-warning text-small-on-mobile">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
