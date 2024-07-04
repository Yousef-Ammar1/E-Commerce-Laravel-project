@extends('layouts.admin')
@section('title')
    General Settings
@endsection

@section('contentheader')
    Setting
@endsection


@section('contentheaderlink')
    <a href="{{ route('admin.adminPanelSetting.index') }}">Setting</a>
@endsection


@section('contentheaderactive')
    Show
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <td class="width30">Name of the company</td>
                                <td>{{ $data['system_name'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">Code of the company</td>
                                <td>{{ $data['com_code'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">State of the company</td>
                                <td>
                                    @if ($data['status'] == 1)
                                        Active
                                    @else
                                        Notactive
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">Adress</td>
                                <td>{{ $data['address'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">Phone</td>
                                <td>{{ $data['phone'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">Alert general message</td>
                                <td>{{ $data['general_alert'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">Logo</td>
                                <td>
                                    <div class="image">
                                        <img class="custom-image"
                                            src="{{ asset('assets/admin/dist/img/user3-128x128.jpg') }}" alt="User Image">
                                    </div>
                                </td>
                            </tr>
        <tr>
            <td class="width30">Last update</td>
            <td>
                @if ($data['updated_by'] != null && $data['updated_by'] > 0)
                    @php
                        $dt = new DateTime($data['updated_at']);
                        $date = $dt->format('d-m-Y H:i:s');
                        $time = $dt->format('H:i');
                        $newDate = date('A', strtotime($time));
                        $newDateTimeType = ( $newDate == 'AM') ? 'AM' : 'PM';
                    @endphp

                    {{ $date }}
                    {{ $newDateTimeType }}<br>
                    by
                    {{ $data['updated_by_admin'] }}
                @else
                    No update
                @endif
            </td>
        </tr>
                        </table>
                    @else
                        <div class="alert alert-danger"></div>
                        Sorry there is no data to show !!
                    @endif



                </div>
            </div>
        </div>
    </div>
@endsection
