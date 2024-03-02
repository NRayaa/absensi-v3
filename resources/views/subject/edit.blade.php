@extends('layouts.layout')
@section('crumb', 'Mata Pelajaran')
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
                <a class="nav-link collapsed" href="{{ route('teacher.index') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Guru</span>
                </a>
            </li><!-- End Guru Nav -->

            <li class="nav-item">
                <a class="nav-link " href="{{ route('subject.index') }}">
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
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="{{ route('subject.update', $subjectDetail->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Mapel</label>
                    <div class="col-sm-10">
                        <input type="text" name="name_subject" class="form-control" value="{{ $subjectDetail->name_subject }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Edit Mapel</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

            <div class="mb-3">
                <form action="{{ route('subject.destroy', $subjectDetail->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button href="{{route('subject.destroy', $subjectDetail->id)}}" type="submit" class="btn btn-danger">Hapus Mapel</button>
                </form>
            </div>


        </div>
    </div>
@endsection
