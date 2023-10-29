@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h2>Selamat datang {{ auth()->user()->name }}</h2>
    <div class="row g-5 g-xl-8">
        <div class="col-xl-3">

            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-user text-primary fs-2x ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                        {{ $totalUser }}
                    </div>

                    <div class="fw-semibold text-gray-400">
                        Total User </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-3">

            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-truck text-gray-100 fs-2x ms-n1"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span><span class="path4"></span><span
                            class="path5"></span></i>

                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                        {{ $totalContainer }}
                    </div>

                    <div class="fw-semibold text-gray-100">
                        Total Container </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-3">

            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-lots-shopping text-black fs-2x ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path7"></span>
                        <span class="path8"></span>
                    </i>

                    <div class="text-black fw-bold fs-2 mb-2 mt-5">
                        {{ $totalProduct }}
                    </div>

                    <div class="fw-semibold text-black">
                        Total Produk </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>

        <div class="col-xl-3">

            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-document text-white fs-2x ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>

                    <div class="text-white fw-bold fs-2 mb-2 mt-5">
                        {{ $totalSuratJalan }}
                    </div>

                    <div class="fw-semibold text-white">
                        Total Surat Jalan Terbit </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
    </div>
@endsection
