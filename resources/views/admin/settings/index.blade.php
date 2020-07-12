@extends('admin.layouts.master')

@section('title')
اعدادات البنك
@endsection
@section('styles')
<link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-fileinput.css') }}">
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/admin/home">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="/admin/setting">اعدادات البنك</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>تعديل اعدادات البنك</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> اعدادات البنك
    <small>تعديل اعدادات البنك</small>
</h1>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row">

    <div class="col-md-8">
        <!-- BEGIN TAB PORTLET-->
        @if(count($errors))
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        @include('flash::message')
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->

            <div class="row">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered table-responsive">
                    <div class="portlet-body form">
                        <div class="form-horizontal" role="form">


                            @foreach ($settings as $bank)

                            <form action="{{url('admin/settings')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$bank->id}}">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">اسم البنك</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="اسم البنك"
                                                name="bank_name" value="{{$bank->bank_name}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">رقم الحساب</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="رقم الحساب"
                                                name="account_number" value="{{$bank->account_number}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{--
                            <form action="{{url('/admin/settings')}}" method="post">
                            @csrf @method('delete')
                            <input type="hidden" name="id" value="{{$bank->id}}">
                            <button type="submit" class="btn btn-danger float-left">حذف البنك</button>
                            </form> --}}
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->

        <!-- END TAB PORTLET-->

    </div>
</div>

@endsection
