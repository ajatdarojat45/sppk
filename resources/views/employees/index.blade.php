@extends('layouts.admin')
@section('title')
   Employee - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Employee</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><strong>Employee</strong></li>
         </ol>
      </div>
      <div class="col-lg-2">
      </div>
   </div>
   <div class="wrapper wrapper-content animated fadeInRight">
      @if (session('success'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> {{session('success') }}
      </div>
      @endif
      <div class="row">
          <div class="col-lg-12 animated fadeInRight">
              <div class="ibox-content">
                  <h2 class="page-header">Employee ({{ $employees->count() }})</h2>
                  <div class="mail-tools tooltip-demo m-t-md">
                     <div class="btn-group pull-right">
                        {{-- {{ $banks->links() }} --}}
                     </div>
                     <a class="btn btn-primary btn-sm" href="{{route('employee/create')}}"><i class="fa fa-plus-circle"></i> Add</a>
                     <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                  </div><br>
                  <div class="table-responsive">
                      <table id="example1" class="table table-hover table-striped">
                          <thead>
                              <tr>
                                 <th style="text-align: center;">No.</th>
                                 <th style="text-align: center;">NIK</th>
                                 <th style="text-align: center;">Name</th>
                                 <th style="text-align: center;">Blood</th>
                                 <th style="text-align: center;">Sex</th>
                                 <th style="text-align: center;">Place of Birth</th>
                                 <th style="text-align: center;">Date of Birth</th>
                                 <th style="text-align: center;">Religion</th>
                                 <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                              $no = 0;
                              @endphp
                              @foreach ($employees as $employee)
                              <tr class="read">
                                 <td class="text-center">{{ ++$no }}</td>
                                 <td class="text-left">{{ $employee->nik }}</td>
                                 <td class="text-left">{{ $employee->name }}</td>
                                 <td class="text-center">{{ $employee->blood }}</td>
                                 <td class="text-center">{{ $employee->sex }}</td>
                                 <td class="text-center">{{ $employee->placeOfBirth }}</td>
                                 <td class="text-center">{{ $employee->dateOfBirth }}</td>
                                 <td class="text-center">{{ $employee->religion->name }}</td>
                                 <td class="text-center">
                                    <a href="{{route('employee/detail', $employee->id)}}" class="btn btn-primary btn-sm btn-outline"><i class="fa fa-file"></i> </a>
                                    <a href="{{route('employee/destroy', $employee->id)}}" class="btn btn-danger btn-sm btn-outline"><i class="fa fa-trash"></i> </a>
                                 </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <br>
   <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               </div>
               <form action="{{ route('duty/store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                   <div class="modal-body">
                       <fieldset class="form-horizontal">
                           <div class="form-group">
                               @if ($errors->has('name'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('name') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Name</label>
                               <div class="col-sm-10">
                                   <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                               </div>
                           </div>
                       </fieldset>
                       {{ csrf_field() }}
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-white btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                       <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
@endsection
