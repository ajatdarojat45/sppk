@extends('layouts.admin') @section('title') PR Create - FIMZ Cemerlang Bangsa @endsection @section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Member</h2>
      <ol class="breadcrumb">
         <li><a href="#">Dashboard</a></li>
         <li><a href="{{route('pr/index')}}">PR</a></li>
         <li class="active"><strong>Detail</strong></li>
         <li class="active"><strong>{{$pr->code}}</strong></li>
      </ol>
   </div>
   <div class="col-lg-2">
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
   @if (session('success'))
   <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Success!</strong> {{session('success') }}
   </div>
   @endif
   <div class="row">
      <div class="col-lg-12 animated fadeInRight">
         <div class="mail-box-header">
            <h2>Purchase Request Detail</h2>
            <div class="mail-tools tooltip-demo m-t-md">
               {{-- <h3>
                  <span class="font-normal">Subject: </span>Aldus PageMaker including versions of Lorem Ipsum.
               </h3> --}}
               <h5>
                  <span class="pull-right font-normal">{{$pr->created_at}}</span>
                  <span class="font-normal">From: </span>{{$pr->mutation->employee->name}} ({{$pr->mutation->position->name}}) - {{$pr->mutation->department->name}}
               </h5>
            </div>
         </div>
         <div class="mail-box">
            <div class="mail-body">
               {!! $pr->note !!}
            </div>
            <div class="mail-body text-right tooltip-demo">
               <a class="btn btn-sm btn-primary" href="mail_compose.html"><i class="fa fa-check-circle"></i> Approve</a>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
   </div>
</div>
<br> @endsection
