@extends('layouts.admin')
@section('title')
   Employee Create - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Member</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{route('employee/index')}}">Employee</a></li>
            <li class="active"><strong>Create</strong></li>
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
         <div class="col-lg-12">
            <div class="tabs-container">
               <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#tab-1"> Create</a></li>
               </ul>
                  <div class="tab-content">
                     <div id="tab-1" class="tab-pane active">
                        <form action="{{ route('employee/store') }}" method="post">
                           <div class="panel-body">
                              <fieldset class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">NIK:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('nik'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('nik') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
                                    </div>
                                    <label class="col-sm-2 control-label">Name:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('name') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Place of Birth:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('placeOfBirth'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('placeOfBirth') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="placeOfBirth" class="form-control" value="{{ old('placeOfBirth') }}">
                                    </div>
                                    <label class="col-sm-2 control-label">Date of Birth:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('dateOfBirth'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('dateOfBirth') }}</strong>
                                          </span>
                                       @endif
                                       <input type="date" name="dateOfBirth" class="form-control" value="{{ old('dateOfBirth') }}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Blood:</label>
                                    <div class="col-sm-2">
                                       @if ($errors->has('blood'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('blood') }}</strong>
                                          </span>
                                       @endif
                                       <select class="form-control" name="blood">
                                          <option value="">-- Please select blood --</option>
                                          <option value="A">A</option>
                                          <option value="B">B</option>
                                          <option value="AB">AB</option>
                                          <option value="O">O</option>
                                       </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Sex:</label>
                                    <div class="col-sm-2">
                                       @if ($errors->has('dateOfBirth'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('dateOfBirth') }}</strong>
                                          </span>
                                       @endif
                                       <select class="form-control" name="sex">
                                          <option value="">-- Please select sex --</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                       </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Religion:</label>
                                    <div class="col-sm-2">
                                       @if ($errors->has('religion'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('religion') }}</strong>
                                          </span>
                                       @endif
                                       <select class="form-control" name="religion">
                                          <option value="">-- Please select sex --</option>
                                          @foreach ($religions as $religion)
                                             <option value="{{$religion->id}}">{{$religion->name}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </fieldset>
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" title="Send">
                                 <i class="fa fa-save"></i> Save
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
@endsection
