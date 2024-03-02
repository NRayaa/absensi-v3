@extends('layouts.layout')
@section('crumb', 'Izin Guru')
@section('crumb1', 'Dashboard')
@section('name', $name)
@section('role', $role)

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('presteacher.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Presensi</span>
                </a>
            </li><!-- End Presensi Nav -->

            <li class="nav-item">
                <a class="nav-link " href="{{ route('pmsteacher.index') }}">
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
                    <h5 class="card-title">Data Izin</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    {{-- <a href="{{ url('presteacher/exportasdqwezxc')}}" type="button" class="btn btn-warning text-small-on-mobile mx-3">Export</a> --}}
                    <a href="{{ route('pmsteacher.create') }}" type="button" class="btn btn-primary text-small-on-mobile"><i class="text-small-on-mobile bi bi-plus me-1"></i> Buat Izin</a>
                </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped text-small-on-mobile">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col" class="hidden-on-mobile">Sifat Izin</th>
                        <th scope="col" class="hidden-on-mobile">Keperluan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pmsTeacher as $pms)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$pms->date_pms}}</td>
                            <td class="hidden-on-mobile">{{$pms->purpose_pms}}</td>
                            <td class="hidden-on-mobile">{{$pms->subject_pms}}</td>
                            <td><a href="{{route('pmsteacher.show', $pms->id)}}" type="button" class="text-small-on-mobile btn btn-warning">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection
