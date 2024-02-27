@extends('layouts.layout')
@section('crumb', 'Presensi')
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
                <a class="nav-link " href="{{ route('present.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Presensi</span>
                </a>
            </li><!-- End Presensi Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('teacher.index') }}">
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
            <h5 class="card-title">Form Buat Presensi</h5>

            <!-- General Form Elements -->
            <form action="{{ route('present.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="teacher_p" aria-label="Default select example">
                            @foreach ($dataTeacher as $teacher)
                                <option value="{{ $teacher->name_teacher }}">{{ $teacher->name_teacher }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kehadiran</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="attend_p" aria-label="Default select example">
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak hadir">Tidak Hadir</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas : </label>
                    <div class="col-sm-10">
                        <select class="form-select" name="class_p" aria-label="Default select example">
                            <option value="Kelas 10 A">Kelas 10 A</option>
                            <option value="Kelas 10 B">Kelas 10 B</option>
                            <option value="Kelas 11 A">Kelas 11 A</option>
                            <option value="Kelas 11 B">Kelas 11 B</option>
                            <option value="Kelas 12 A">Kelas 12 A</option>
                            <option value="Kelas 12 B">Kelas 12 B</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Pertemuan Ke</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="meet_p">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="date_p">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="subject_p" aria-label="Default select example">
                            @foreach ($dataSubject as $subject)
                                <option value="{{ $subject->name_subject }}">{{ $subject->name_subject }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Topik Pembahasan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="topic_p">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Jumlah Murid Hadir</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="student_p">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputText" class="col-sm-12 col-form-label">Murid Sakit</label>
                        <input type="number" class="form-control" name="student_s_p">
                        <label for="inputText" class="col-sm-12 col-form-label">Nama Murid Sakit</label>
                        <textarea  class="form-control" name="student_s_k_p"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <label for="inputText" class="col-sm-12 col-form-label">Murid Izin</label>
                        <input type="number" class="form-control" name="student_i_p">
                        <label for="inputText" class="col-sm-12 col-form-label">Nama Murid Izin</label>
                        <textarea  class="form-control" name="student_i_k_p"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <label for="inputText" class="col-sm-12 col-form-label">Murid Bolos</label>
                        <input type="number" class="form-control" name="student_a_p">
                        <label for="inputText" class="col-sm-12 col-form-label">Nama Murid Bolos</label>
                        <textarea  class="form-control" name="student_a_k_p"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Buat Presensi</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
@endsection
