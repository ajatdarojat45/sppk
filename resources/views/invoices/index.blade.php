@extends('layouts.admin')
@section('title')
   Invoice - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Branch</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><strong>Invoice</strong></li>
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
                  <h2 class="page-header">Invoice ({{ $invoices->count() }})</h2>
                  <div class="mail-tools tooltip-demo m-t-md">
                     <div class="btn-group pull-right">
                        {{-- {{ $banks->links() }} --}}
                     </div>
                     <a class="btn btn-primary btn-sm" data-toggle="modal" href='#myModal'><i class="fa fa-plus-circle"></i> Add</a>
                     <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                  </div><br>
                  <div class="table-responsive">
                      <table id="example1" class="table table-hover table-striped">
                          <thead>
                              <tr>
                                 <th style="text-align: center;">No.</th>
                                 <th style="text-align: center;">Code</th>
                                 <th style="text-align: center;">No</th>
                                 <th style="text-align: center;">Store</th>
                                 <th style="text-align: center;">Address</th>
                                 <th style="text-align: center;">Date</th>
                                 <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                              $no = 0;
                              @endphp
                              @foreach ($invoices as $invoice)
                              <tr class="read">
                                 <td class="text-center">{{ ++$no }}</td>
                                 <td class="text-center">{{ $invoice->code }}</td>
                                 <td class="text-center">{{ $invoice->no }}</td>
                                 <td class="text-left">{{ $invoice->store }}</td>
                                 <td class="text-left">{{ $invoice->address }}</td>
                                 <td class="text-center">{{ $invoice->date }}</td>
                                 <td class="text-center">
                                    <a href="{{route('invoice/destroy', $invoice->id)}}" class="btn btn-danger btn-sm btn-outline"><i class="fa fa-trash"></i> </a>
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
               <form action="{{ route('invoice/store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                   <div class="modal-body">
                       <fieldset class="form-horizontal">
                           <div class="form-group">
                               @if ($errors->has('no'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('no') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">No</label>
                               <div class="col-sm-10">
                                   <input type="text" name="no" class="form-control" value="{{ old('no') }}">
                               </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('store'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('store') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Store</label>
                               <div class="col-sm-10">
                                   <input type="text" name="store" class="form-control" value="{{ old('store') }}">
                               </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('address'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('address') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Address</label>
                               <div class="col-sm-10">
                                   <textarea name="address" rows="3" class="form-control"></textarea>
                               </div>
                           </div>
                           <div class="form-group">
                              @if ($errors->has('date'))
                              <span class="help-block">
                                  <strong style="color: red">{{ $errors->first('date') }}</strong>
                              </span>
                              @endif
                              <label class="col-sm-2 control-label">Date</label>
                              <div class="col-sm-10">
                                 <div class="" id="data_1">
                                    <div class="input-group date">
                                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                       <input type="date" class="form-control" value="{{ old('date') }}" name="date">
                                    </div>
                                 </div>
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
