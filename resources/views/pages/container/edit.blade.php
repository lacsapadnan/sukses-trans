@extends('layouts.master')

@section('title', 'Container')
@section('page-title', 'Container List')
@section('breadcrumb', 'Edit Container')

@section('content')
    <div class="card">
        <div class="pt-6 border-0 card-header">
            <div class="card-body">
                <form action="{{ route('container.update', $container->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Invoice</label>
                                <input type="text" name="invoice" class="form-control" placeholder="Masukan invoice"
                                    required value="{{ $container->invoice }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Nama Consignee</label>
                                <input type="text" name="consignee_name" class="form-control"
                                    placeholder="Masukan nama consigne" required value="{{ $container->consignee_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Tanggal Pendaftaran</label>
                                <div class="input-group" id="kt_td_picker_register_date" data-td-target-input="nearest"
                                    data-td-target-toggle="nearest">
                                    <input id="kt_td_picker_register_date" type="text" class="form-control"
                                        data-td-target="#kt_td_picker_register_date" name="register_date" value="{{ $container->register_date }}"/>
                                    <span class="input-group-text" data-td-target="#kt_td_picker_register_date"
                                        data-td-toggle="datetimepicker">
                                        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Tanggal Keluar Container</label>
                                <div class="input-group" id="kt_td_picker_out_date" data-td-target-input="nearest"
                                    data-td-target-toggle="nearest">
                                    <input id="kt_td_picker_out_date" type="text" class="form-control"
                                        data-td-target="#kt_td_picker_out_date" name="out_date" value="{{ $container->out_date }}"/>
                                    <span class="input-group-text" data-td-target="#kt_td_picker_out_date"
                                        data-td-toggle="datetimepicker">
                                        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-6">
                                <label for="name" class="required form-label">No. Pendaftaran</label>
                                <input type="number" name="register_number" class="form-control"
                                    placeholder="Masukan no. pendaftaran" required value="{{ $container->register_number }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-6">
                                <label for="name" class="required form-label">No. BL</label>
                                <input type="number" name="bl_number" class="form-control" placeholder="Masukan no. BL"
                                    required value="{{ $container->bl_number }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-6">
                                <label for="name" class="required form-label">No. Container</label>
                                <input type="number" name="container_number" class="form-control"
                                    placeholder="Masukan no. container" required value="{{ $container->container_number }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Repair</label>
                                <input type="number" name="repair" class="form-control" placeholder="Masukan repair"
                                    required value="{{ $container->repair }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Lift Off</label>
                                <input type="text" name="lift_off" class="form-control" placeholder="Masukan lift off"
                                    required value="{{ $container->lift_off }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Demurrage</label>
                                <input type="number" name="demurrage" class="form-control"
                                    placeholder="Masukan demurrage" required value="{{ $container->demurrage }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label for="name" class="required form-label">Tujuan Container</label>
                                <input type="text" name="destination" class="form-control"
                                    placeholder="Masukan tujuan container" required value="{{ $container->destination }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_register_date"), {
            localization: {
                locale: "id",
                startOfTheWeek: 1
            },
            display: {
                viewMode: "calendar",

                components: {
                    decades: true,
                    year: true,
                    month: true,
                    date: true,
                    hours: false,
                    minutes: false,
                    seconds: false
                }
            }
        });

        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_out_date"), {
            localization: {
                locale: "id",
                startOfTheWeek: 1
            },
            display: {
                viewMode: "calendar",

                components: {
                    decades: true,
                    year: true,
                    month: true,
                    date: true,
                    hours: false,
                    minutes: false,
                    seconds: false
                }
            }
        });
    </script>
@endpush
