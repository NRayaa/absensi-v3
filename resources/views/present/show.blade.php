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
            
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">Detail Presensi</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <form action="{{ route('present.destroy', $detailPresent->id) }}" method="post">
                        @csrf
                        @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-plus me-1"></i> Delete</button>
                    </form>
                </div>
            </div>

            <!-- Default Table -->
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Nama Guru</th>
                        <td colspan="2">{{$detailPresent->teacher_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kehadiran</th>
                        <td colspan="2">{{$detailPresent->attend_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kelas</th>
                        <td colspan="2">{{$detailPresent->class_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Pertemuan Ke-</th>
                        <td colspan="2">{{$detailPresent->meet_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal</th>
                        <td colspan="2">{{$detailPresent->date_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Mapel</th>
                        <td colspan="2">{{$detailPresent->subject_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Topik</th>
                        <td colspan="2">{{$detailPresent->topic_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Waktu Presensi</th>
                        <td colspan="2">{{$detailPresent->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Siswa Hadir</th>
                        <td colspan="2">{{$detailPresent->student_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Sakit</th>
                        <td>{{$detailPresent->student_s_p}}</td>
                        <td>{{$detailPresent->student_s_k_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Izin</th>
                        <td>{{$detailPresent->student_i_p}}</td>
                        <td>{{$detailPresent->student_i_k_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alfa</th>
                        <td>{{$detailPresent->student_a_p}}</td>
                        <td>{{$detailPresent->student_a_k_p}}</td>
                    </tr>
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection
