@extends(Auth::user()->mutationActive()->department->id == 1 ? 'layouts.admin' : 'layouts.employee')
@section('title')
   Employee - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Employee</h2>
         <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('employee/index')}}">Employee</a></li>
            <li class="active"><strong>Detail</strong></li>
            <li class="active"><strong>{{$employee->name}}</strong></li>
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
         <div class="col-lg-3 col-md-3">
            <div class="contact-box center-version">
              <a href="profile.html">
                  <img alt="image" class="img-circle" src="{{asset('inspinia/img/a7.jpg')}}">
                  <h3 class="m-b-xs"><strong>{{$employee->name}}</strong></h3>
                  <div class="font-bold">
                     @if (!empty($employee->mutationActive()))
                        {{$employee->mutationActive()->position->name}}
                     @endif
                  </div>
                  <address class="m-t-md">
                     <strong>
                        @if (!empty($employee->mutationActive()))
                           {{$employee->mutationActive()->branch->name}}
                        @endif
                     </strong><br>
                     @if (!empty($employee->mutationActive()))
                       {{$employee->mutationActive()->branch->address}}
                     @endif<br>
                      <abbr title="Phone">P:</abbr> (123) 456-7890
                  </address>
              </a>
              <div class="contact-box-footer">
                  <div class="m-t-xs btn-group">
                      <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                      <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                      <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                  </div>
              </div>
            </div>
         </div>
         <div class="col-lg-9 col-md-9">
            <div class="ibox-content">
               <div class="tabs-container">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#mutation"> Mutation</a></li>
                     <li class=""><a data-toggle="tab" href="#computer"> Computer</a></li>
                  </ul>
                  <div class="tab-content">
                     {{-- mutation --}}
                     <div id="mutation" class="tab-pane active">
                        <div class="mail-tools tooltip-demo m-t-md">
                           <div class="btn-group pull-right">
                              {{-- {{ $banks->links() }} --}}
                           </div>
                           <a class="btn btn-primary btn-sm" data-toggle="modal" href="#mutationModal"><i class="fa fa-plus-circle"></i> Add</a>
                           <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                        </div><br>
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                       <th style="text-align: center;">No.</th>
                                       <th style="text-align: center;">SK</th>
                                       <th style="text-align: center;">ID</th>
                                       <th style="text-align: center;">Branch</th>
                                       <th style="text-align: center;">Department</th>
                                       <th style="text-align: center;">Duty</th>
                                       <th style="text-align: center;">Position</th>
                                       <th style="text-align: center;">Salary</th>
                                       <th style="text-align: center;">Date</th>
                                       <th style="text-align: center;">Stat</th>
                                       <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 0;
                                    @endphp
                                    @foreach ($employee->mutations as $mutation)
                                    <tr class="read">
                                       <td class="text-center">{{ ++$no }}</td>
                                       <td class="text-center">{{ $mutation->sk }}</td>
                                       <td class="text-center">{{ $mutation->code }}</td>
                                       <td class="text-center">{{ $mutation->branch->name }}</td>
                                       <td class="text-center">{{ $mutation->department->name }}</td>
                                       <td class="text-center">{{ $mutation->duty->name }}</td>
                                       <td class="text-center">{{ $mutation->position->name }}</td>
                                       <td class="text-right">{{ $mutation->salary }}</td>
                                       <td class="text-center">{{ $mutation->date }}</td>
                                       <td class="text-center">{!!$mutation->getStat($mutation->stat)!!}</td>
                                       <td class="text-center">
                                          <a href="{{route('employee/destroy', $employee->id)}}" class="btn btn-danger btn-sm btn-outline"><i class="fa fa-trash"></i> </a>
                                       </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                     </div>
                     {{-- computer --}}
                     <div id="computer" class="tab-pane">
                        <div class="mail-tools tooltip-demo m-t-md">
                           <div class="btn-group pull-right">
                              {{-- {{ $banks->links() }} --}}
                           </div>
                           <a class="btn btn-primary btn-sm" data-toggle="modal" href="#mutationModal"><i class="fa fa-plus-circle"></i> Add</a>
                           <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                        </div><br>
                        <div class="table-responsive">
                            <table id="example3" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                       <th style="text-align: center;">No.</th>
                                       <th style="text-align: center;">Code</th>
                                       <th style="text-align: center;">Name</th>
                                       <th style="text-align: center;">Position</th>
                                       <th style="text-align: center;">Duty</th>
                                       <th style="text-align: center;">Department</th>
                                       <th style="text-align: center;">Branch</th>
                                       <th style="text-align: center;">Date</th>
                                       <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 0;
                                    @endphp
                                    @foreach ($computers as $computer)
                                    <tr class="read">
                                       <td class="text-center">{{ ++$no }}</td>
                                       <td class="text-center">{{ $computer->computer->code }}</td>
                                       <td class="text-center">{{ $computer->computer->name }}</td>
                                       <td class="text-center">{{ $computer->mutation->position->name }}</td>
                                       <td class="text-center">{{ $computer->mutation->duty->name }}</td>
                                       <td class="text-center">{{ $computer->mutation->department->name }}</td>
                                       <td class="text-center">{{ $computer->mutation->branch->name }}</td>
                                       <td class="text-center">{{ $computer->date }}</td>
                                       <td class="text-center">
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
         </div>
      </div>
   </div>
   <br>
   {{-- mutation modal --}}
   <div class="modal inmodal" id="mutationModal" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               </div>
               <form action="{{ route('mutation/store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                   <div class="modal-body">
                       <fieldset class="form-horizontal">
                           <div class="form-group">
                               @if ($errors->has('sk'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('sk') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">SK</label>
                               <div class="col-sm-10">
                                   <input type="text" name="sk" class="form-control" value="{{ old('sk') }}">
                               </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('branch'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('branch') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Branch</label>
                              <div class="col-sm-10">
                                 <select class="form-control" name="branch">
                                    <option value="">-- Please select Branch --</option>
                                    @foreach ($branches as $branch)
                                       <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                 </select>
                               </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('department'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('department') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Department</label>
                               <div class="col-sm-10">
                                  <select class="form-control" name="department">
                                     <option value="">-- Please select Department --</option>
                                     @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                     @endforeach
                                  </select>
                               </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('duty'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('duty') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Duty</label>
                              <div class="col-sm-10">
                                 <select class="form-control" name="duty">
                                    <option value="">-- Please select Duty --</option>
                                    @foreach ($duties as $duty)
                                       <option value="{{$duty->id}}">{{$duty->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('position'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('position') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Position</label>
                              <div class="col-sm-10">
                                 <select class="form-control" name="position">
                                    <option value="">-- Please select Position --</option>
                                    @foreach ($positions as $position)
                                       <option value="{{$position->id}}">{{$position->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('salary'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('salary') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Salary</label>
                               <div class="col-sm-10">
                                   <input type="number" name="salary" class="form-control" value="{{ old('salary') }}">
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
                                   <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                               </div>
                           </div>
                           <div class="form-group">
                               @if ($errors->has('stat'))
                               <span class="help-block">
                                   <strong style="color: red">{{ $errors->first('stat') }}</strong>
                               </span>
                               @endif
                               <label class="col-sm-2 control-label">Stat</label>
                               <div class="col-sm-10">
                                 <select class="form-control" name="stat">
                                    <option value="">-- Please select stat --</option>
                                    <option value="1">Probation</option>
                                    <option value="2">Contract</option>
                                    <option value="3">Permanent</option>
                                    <option value="4">Resign</option>
                                 </select>
                               </div>
                           </div>
                           <input type="hidden" name="employee" value="{{$employee->id}}">
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
