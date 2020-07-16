@extends('website.restaurants-layouts.master')

@section('title')
الفروع
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('inner.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.bootstrap-rtl.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ url('/home') }}">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('admin/branches') }}">الفروع</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض الفروع</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الفروع
    {{--<small>عرض جميع الفروع</small>--}}
</h1>
@include('flash::message')
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="btn-group">
                                <a class="btn sbold green" href="{{ route('branches.create') }}"> إضافة جديد
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- {{dd($pack)}} --}}
                @if($pack)
                <div class="row">
                    <div class="text-center">
                        <h5>متاح لك 4 فروع</h5>
                    </div>
                </div> 
                @endif
                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                    id="sample_1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الفرع</th>
                            <th> العمليات </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $records as $record )
                        <tr class="odd gradeX">
                            <td>{{$record->id}}</td>
                            <td class="no_dec">{{ $record->name_ar}}</td>
                            <td>

                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-expanded="false"> العمليات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">

                                        <li>
                                            <a href="{{ route('branches.edit',['id'=>$record->id]) }}">
                                                <i class="icon-pencil"></i> تعديل
                                            </a>
                                        </li>

                                        <li>
                                            <a class="delete_data" data="{{ $record->id }}"
                                                data_name="{{ $record->name }}">
                                                <i class="fa fa-times"></i> حذف
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection
@section('content')
@if (session('information'))
<div class="alert alert-success">
    {{ session('information') }}
</div>
@endif
@if (session('pass'))
<div class="alert alert-success">
    {{ session('pass') }}
</div>
@endif
@if (session('privacy'))
<div class="alert alert-success">
    {{ session('privacy') }}
</div>
@endif
@endsection

@section('scripts')
<script src="{{ URL::asset('admin/js/datatable.js') }}"></script>
<script src="{{ URL::asset('admin/js/datatables.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/datatables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('admin/js/table-datatables-managed.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/ui-sweetalert.min.js') }}"></script>

<script>
    $( document ).ready(function () {
            $('body').on('click', '.delete_data', function() {
                var id = $(this).attr('data');
                // console.log(id);
                var swal_text = 'حذف ' + $(this).attr('data_name');
                var swal_title = 'هل أنت متأكد من الحذف ؟';

                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق"
                }, function() {

                    window.location.href = "{{ url('/') }}" + "/admin/branches/"+id+"/delete" ;

                });

            });
        });
</script>
@endsection
