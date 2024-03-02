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

            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">Detail Izin Guru</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"> Delete</button>
                    </form>
                </div>
            </div>

            <!-- Default Table -->
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Nama Guru</th>
                        <td colspan="2">{{ $permission->teacher_pms }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kehadiran</th>
                        <td colspan="2">{{ $permission->purpose_pms }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal</th>
                        <td colspan="2">{{ $permission->date_pms }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jam</th>
                        <td colspan="2">{{ $permission->time_pms }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Judul Izin</th>
                        <td colspan="2">{{ $permission->subject_pms }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Detail Izin</th>
                        <td colspan="2">{{ $permission->desc_pms }}</td>
                    </tr>
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection
