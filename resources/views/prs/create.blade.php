@extends('layouts.admin')
@section('title')
   PR Create - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Member</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{route('pr/index')}}">PR</a></li>
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
                        <form action="{{ route('pr/store') }}" method="post">
                           <div class="panel-body">
                              <fieldset class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Note:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('note'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('note') }}</strong>
                                          </span>
                                       @endif
                                       <textarea name="note" rows="10" class="form-control summernote"></textarea>
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
