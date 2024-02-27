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
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">Data Presensi</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('presteacher.create') }}" type="button" class="btn btn-primary text-small-on-mobile"><i class="text-small-on-mobile bi bi-plus me-1"></i> Buat Presensi</a>
                </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped text-small-on-mobile">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Present</th>
                        <th scope="col">Kelas</th>
                        <th scope="col" class="hidden-on-mobile">Ke-</th>
                        <th scope="col">Date</th>
                        <th scope="col" >Mapel</th>
                        <th scope="col" class="hidden-on-mobile">Topik</th>
                        <th scope="col" class="hidden-on-mobile">J Murid</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presentTeacher as $present)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$present->attend_p}}</td>
                            <td>{{$present->class_p}}</td>
                            <td class="hidden-on-mobile">{{$present->meet_p}}</td>
                            <td>{{$present->date_p}}</td>
                            <td>{{$present->subject_p}}</td>
                            <td class="hidden-on-mobile">{{$present->topic_p}}</td>
                            <td class="hidden-on-mobile">{{$present->student_p}}</td>
                            <td><a href="{{route('presteacher.show', $present->id)}}" type="button" class="text-small-on-mobile btn btn-warning">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection
