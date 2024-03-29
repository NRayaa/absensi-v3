@extends('layouts.layout')
@section('crumb', 'Presensi')
@section('crumb1', 'Dashboard')
@section('name', $name)
@section('role', $role)

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('present.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Presensi</span>
                </a>
            </li><!-- End Presensi Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('pmsteacher.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Izin Guru</span>
                </a>
            </li><!-- End Presensi Nav -->

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
                    <h5 class="card-title">Form Buat Presensi</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('presteacher.index') }}" type="button" class="btn btn-danger"></i> Kembali</a>
                </div>
            </div>

            <!-- General Form Elements -->
            <form action="{{ route('presteacher.store') }}" method="post">
                @csrf

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
                            <option value="Kelas 7 A">7 A</option>
                            <option value="Kelas 7 B">7 B</option>
                            <option value="Kelas 7 C">7 C</option>
                            <option value="Kelas 7 D">7 D</option>
                            <option value="Kelas 8 A">8 A</option>
                            <option value="Kelas 8 B">8 B</option>
                            <option value="Kelas 8 C">8 C</option>
                            <option value="Kelas 8 D">8 D</option>
                            <option value="Kelas 8 E">8 E</option>
                            <option value="Kelas 9 A">9 A</option>
                            <option value="Kelas 9 B">9 B</option>
                            <option value="Kelas 9 C">9 C</option>
                            <option value="Kelas 9 D">9 D</option>
                            <option value="Kelas 9 E">9 E</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Pertemuan Ke</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="meet_p">
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

                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Buat Presensi</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
@endsection
