@extends('layouts.layout')
@section('crumb', 'Guru')
@section('crumb1', 'Dashboard')
@section('name', $name)
@section('role', $role)

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('present.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Presensi</span>
                </a>
            </li><!-- End Presensi Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('permission.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Izin Guru</span>
                </a>
            </li><!-- End Presensi Nav -->

            <li class="nav-item">
                <a class="nav-link " href="{{ route('teacher.index') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Guru</span>
                </a>
            </li><!-- End Guru Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('subject.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Mapel</span>
                </a>
            </li><!-- End Mapel Nav -->

            <li class="nav-item hidden-on-desktop">
                <a class="nav-link collapsed" href="{{ route('logout') }}">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Logout Nav -->

        </ul>

    </aside><!-- End Sidebar-->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">Data Detail Guru</h5>
                </div>
            </div>

            <div class="mb-5">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{ $teacherDetail->name_teacher }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Total Hadir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{ $present }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Total Tidak Hadir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{ $absent }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Total Izin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{ $pms }}">
                    </div>
                </div>
            </div>


            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Bordered Tabs Justified -->
                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Presensi Guru</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#bordered-justified-profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Izin Guru</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                    <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Data Presensi Guru</h5>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <a href="{{ url('teacher/export/excel', $teacherDetail->id) }}" type="button"
                                    class="btn btn-warning text-small-on-mobile mx-3">Export</a>
                            </div>
                        </div>


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
                        @foreach ($teacherPresent as $present)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $present->teacher_p }}</td>
                                <td class="hidden-on-mobile">{{ $present->attend_p }}</td>
                                <td class="hidden-on-mobile">{{ $present->class_p }}</td>
                                <td class="hidden-on-mobile">{{ $present->meet_p }}</td>
                                <td>{{ $present->date_p }}</td>
                                <td class="hidden-on-mobile">{{ $present->subject_p }}</td>
                                <td class="hidden-on-mobile">{{ $present->topic_p }}</td>
                                <td class="hidden-on-mobile">{{ $present->student_p }}</td>
                                <td><a href="{{ route('present.show', $present->id) }}" type="button"
                                        class="btn btn-warning text-small-on-mobile">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                    </div>
                    <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel"
                        aria-labelledby="profile-tab">

                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Data Izin Guru</h5>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <a href="{{ url('teacher/export/excel', $teacherDetail->id) }}" type="button"
                                    class="btn btn-warning text-small-on-mobile mx-3">Export</a>
                            </div>
                        </div>

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
                                @foreach ($pmsTeacher as $pms)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pms->teacher_pms }}</td>
                                        <td class="">{{ $pms->purpose_pms }}</td>
                                        <td class="hidden-on-mobile">{{ $pms->subject_pms }}</td>
                                        <td><a href="{{ route('permission.show', $pms->id) }}" type="button"
                                                class="btn btn-warning text-small-on-mobile">Detail</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- End Bordered Tabs Justified -->



            </div>


        </div>
    </div>
@endsection
