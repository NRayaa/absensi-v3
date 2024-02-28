@extends('layouts.layout')
@section('crumb', 'Presensi')
@section('crumb1', 'Dashboard')
@section('name', $name)
@section('role', $role)

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('presteacher.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Presensi</span>
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
            <h5 class="card-title">Detail Presensi</h5>

            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="{{ url('present/export/excel')}}" type="button" class="btn btn-warning text-small-on-mobile mx-3">Export</a>
            </div>


            <!-- Default Table -->
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Kehadiran</th>
                        <td>{{$detailPresent->attend_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kelas</th>
                        <td>{{$detailPresent->class_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Pertemuan Ke-</th>
                        <td>{{$detailPresent->meet_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal</th>
                        <td>{{$detailPresent->date_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Mapel</th>
                        <td>{{$detailPresent->subject_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Topik</th>
                        <td>{{$detailPresent->topic_p}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Murid</th>
                        <td>{{$detailPresent->student_p}}</td>
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
                        <th scope="row">Bolos</th>
                        <td>{{$detailPresent->student_a_p}}</td>
                        <td>{{$detailPresent->student_a_k_p}}</td>
                    </tr>
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection
