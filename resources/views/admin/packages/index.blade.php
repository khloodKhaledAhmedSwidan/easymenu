@extends('admin.layouts.master')

@section('title')
الباقات
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/datatables.bootstrap-rtl.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/sweetalert.css') }}">
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ url('admin/home') }}">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('admin/packages') }}">الباقات</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>عرض الباقات</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الباقات
    {{--<small>عرض جميع الباقات</small>--}}
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
                        {{--    <div class="col-lg-6">
                               <div class="btn-group">
                                      <a class="btn sbold green" href="{{ route('packages.create') }}"> إضافة جديد
                                          <i class="fa fa-plus"></i>
                                      </a>
                                  </div>
                           </div>
      --}}
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                    id="sample_1">
                    <thead>
                        <tr>
             {{--              <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th> --}}
                            <th>اسم الباقة</th>
                            <th>مدة الباقة بالشهور</th>
                            <th>سعر الباقة</th>
                            <th> العمليات </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $records as $record )
                        <tr class="odd gradeX">
                            {{--   <td>
                                   <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                       <input type="checkbox" class="checkboxes" value="1" />
                                       <span></span>
                                   </label>
                               </td> --}}
                            <td class="no_dec">{{ $record->name_ar }}</td>
                            <td class="no_dec">{{ $record->duration }}</td>
                            <td class="no_dec">{{ $record->price }}</td>
                            <td>
                                <div class="btn-group">
                                  {{--   <button class="btn btn-xs green dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-expanded="false">



                                   <i class="fa fa-angle-down"></i>
                                    </button> --}}
                                    <button class="btn btn-xs green dropdown-toggle" type="button">
                                    <a href="{{ route('packages.show',$record->id) }}">
                                        <i class="icon-pencil"></i> عرض
                                    </a>
                                    </button>
                                    {{--    <ul class="dropdown-menu pull-left" role="menu">
                                       <li>
                                              <a href="{{ route('packages.edit',['id'=>$record]) }}">
                                                  <i class="icon-pencil"></i> تعديل
                                              </a>
                                          </li>
                                         <li>
                                              <a class="delete_data" data="{{ $record->id }}"
                                                  data_name="{{ $record->name }}">
                                                  <i class="fa fa-times"></i> حذف
                                              </a>
                                          </li>
                                    </ul> --}}
                                </div> --
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
                    window.location.href = "{{ url('/') }}" + "/admin/packages/"+id+"/delete";
                });
            });
        });
</script>
@endsection
