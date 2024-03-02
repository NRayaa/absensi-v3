@extends('layouts.layout')
@section('crumb', 'Izin Guru')
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
                <a class="nav-link " href="{{ route('permission.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Izin Guru</span>
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
            <h5 class="card-title">Form Buat Izin</h5>

            <!-- General Form Elements -->
            <form action="{{ route('permission.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="teacher_pms" aria-label="Default select example">
                            @foreach ($dataTeacher as $teacher)
                                <option value="{{ $teacher->name_teacher }}">{{ $teacher->name_teacher }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="date_pms">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Jam izin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="time_pms">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Sifat Izin</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="purpose_pms" aria-label="Default select example">
                            <option value="Dinas">Dinas</option>
                            <option value="Pribadi">Pribadi</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject_pms">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea name="desc_pms" class="form-control" style="height: 100px"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Buat Izin</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
@endsection
