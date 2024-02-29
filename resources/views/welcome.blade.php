@extends('layouts.layout')
@section('crumb', 'Dashboard')
@section('crumb1', 'Dashboard')
@section('name', $name)
@section('role', $role)


@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
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
    <!-- Left side columns -->
<div class="row">
    <div class="col-lg-8">
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Guru</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalTeacher }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Mapel</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-book-half"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalSubject }}</h6>

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Absensi</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalPresent }}</h6>
                                <span class="text-danger small pt-1 fw-bold">{{ $totalAbsent }}</span> <span
                                    class="text-muted small pt-2 ps-1">Tidak Hadir</span>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->

        </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Berita</h5>

                <div class="activity">

                    @foreach ($recentActivity as $activity)
                        @if ($activity->attend_p == 'Hadir')
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{$activity->created_at}}</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                {{$activity->teacher_p}} telah melakukan presensi : {{$activity->attend_p}}
                            </div>
                        </div><!-- End activity item-->
                        @else
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{$activity->created_at}}</div>
                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                            <div class="activity-content">
                                {{$activity->teacher_p}} telah melakukan presensi : {{$activity->attend_p}}
                            </div>
                        </div><!-- End activity item-->
                        @endif
                    @endforeach

                </div>

            </div>
        </div><!-- End Recent Activity -->

    </div><!-- End Right side columns -->
</div>
@endsection
