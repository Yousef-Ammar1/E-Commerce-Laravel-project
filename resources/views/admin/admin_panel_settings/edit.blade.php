@extends('layouts.admin')
@section('title')
    General Settings Edit
@endsection

@section('contentheader')
    Setting
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.adminPanelSetting.index') }}">Setting</a>
@endsection

@section('contentheaderactive')
    Edit
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">Edit general settings</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (isset($data) && !empty($data))
                        <form action="{{ route('admin.adminPanelSetting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name of the company</label>
                                <input id="system_name" class="form-control" name="system_name" value="{{ $data['system_name'] }}" placeholder="Enter the name of the company" oninvalid="setCustomValidity('please enter this field')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                            <div class="form-group">
                                <label>Address of the company</label>
                                <input id="address" class="form-control" name="address" value="{{ $data['address'] }}" placeholder="Enter the address of the company" oninvalid="setCustomValidity('please enter this field')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                            <div class="form-group">
                                <label>Phone of the company</label>
                                <input id="phone" class="form-control" name="phone" value="{{ $data['phone'] }}" placeholder="Enter the phone of the company" oninvalid="setCustomValidity('please enter this field')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                            <div class="form-group">
                                <label>Message of caution</label>
                                <input id="general_alert" class="form-control" name="general_alert" value="{{ $data['general_alert'] }}" placeholder="Enter the message of caution" oninvalid="setCustomValidity('please enter this field')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                            <div class="form-group">
                                <label>Logo of the company</label>
                                <div class="image">
                                    <img class="custom_img" src="{{ asset('assets/admin/uploads'). '/' . $data['photo'] }}" alt="User Image">
                                    <button type="button" class="btn btn-sm btn-danger" id="update_image">Change the photo</button>
                                    <button type="button" class="btn btn-sm btn-danger" style="display: none" id="cancel_update_image">Cancel</button>
                                </div>
                                <div id="oldimage"></div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
