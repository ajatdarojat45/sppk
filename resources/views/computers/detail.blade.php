@extends('layouts.admin')
@section('title')
   Computer Detail - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Computer</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{route('computer/index')}}">Computer</a></li>
            <li class="active"><strong>Detail</strong></li>
            <li class="active"><strong>{{$computer->code}}</strong></li>
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
         <div class="col-lg-12 col-md-12">
            <div class="ibox-content">
               <div class="tabs-container">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#specification"> Specification</a></li>
                     <li class=""><a data-toggle="tab" href="#mapping"> Mapping</a></li>
                     <li class=""><a data-toggle="tab" href="#maintenance"> Maintenance</a></li>
                     <li class=""><a data-toggle="tab" href="#component"> Component</a></li>
                     <li class=""><a data-toggle="tab" href="#employee"> Employee</a></li>
                  </ul>
                  <div class="tab-content">
                     {{-- specification --}}
                     <div id="specification" class="tab-pane active">
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
                                      <th style="text-align: center;">Code</th>
                                      <th style="text-align: center;">Merk</th>
                                      <th style="text-align: center;">Model</th>
                                      <th style="text-align: center;">Price</th>
                                      <th style="text-align: center;">Category</th>
                                      <th style="text-align: center;">Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @php
                                   $no = 0;
                                   @endphp
                                   @foreach ($computer->componentComputers as $componentComputer)
                                   <tr class="read">
                                      <td class="text-center">{{ ++$no }}</td>
                                      <td class="text-center">{{ $componentComputer->component->code }}</td>
                                      <td class="text-center">{{ $componentComputer->component->merk }}</td>
                                      <td class="text-center">{{ $componentComputer->component->model }}</td>
                                      <td class="text-center">{{ $componentComputer->component->price }}</td>
                                      <td class="text-center">{{ $componentComputer->component->componentCategory->name }}</td>
                                      <td class="text-center">
                                      </td>
                                   </tr>
                                   @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     {{-- mapping --}}
                     <div id="mapping" class="tab-pane">
                        <div class="mail-tools tooltip-demo m-t-md">
                           <div class="btn-group pull-right">
                              {{-- {{ $banks->links() }} --}}
                           </div>
                           <a class="btn btn-primary btn-sm" data-toggle="modal" href="#mutationModal"><i class="fa fa-plus-circle"></i> Add</a>
                           <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                        </div><br>
                        <div class="table-responsive">
                           <table id="example6" class="table table-hover table-striped">
                              <thead>
                                   <tr>
                                      <th style="text-align: center;">No.</th>
                                      <th style="text-align: center;">Code</th>
                                      <th style="text-align: center;">ID</th>
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
                                   @foreach ($computer->computerMutations as $computerMutation)
                                   <tr class="read">
                                      <td class="text-center">{{ ++$no }}</td>
                                      <td class="text-center">{{ $computerMutation->code }}</td>
                                      <td class="text-center">{{ $computerMutation->mutation->code }}</td>
                                      <td class="text-center">{{ $computerMutation->mutation->employee->name }}</td>
                                      <td class="text-center">{{ $computerMutation->mutation->position->name }}</td>
                                      <td class="text-center">{{ $computerMutation->mutation->duty->name }}</td>
                                      <td class="text-center">{{ $computerMutation->mutation->department->name }}</td>
                                      <td class="text-center">{{ $computerMutation->mutation->branch->name }}</td>
                                      <td class="text-center">{{ $computerMutation->date }}</td>
                                      <td class="text-center">
                                      </td>
                                   </tr>
                                   @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     {{-- maintenance --}}
                     <div id="maintenance" class="tab-pane">
                        <div class="mail-tools tooltip-demo m-t-md">
                           <div class="btn-group pull-right">
                              {{-- {{ $banks->links() }} --}}
                           </div>
                           <a class="btn btn-primary btn-sm" data-toggle="modal" href="#mutationModal"><i class="fa fa-plus-circle"></i> Add</a>
                           <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                        </div><br>
                        <div class="table-responsive">
                           <table id="example4" class="table table-hover table-striped">
                              <thead>
                                   <tr>
                                      <th style="text-align: center;">No.</th>
                                      <th style="text-align: center;">Code</th>
                                      <th style="text-align: center;">Component Code</th>
                                      <th style="text-align: center;">Merk</th>
                                      <th style="text-align: center;">Model</th>
                                      <th style="text-align: center;">Price</th>
                                      <th style="text-align: center;">Category</th>
                                      <th style="text-align: center;">Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @php
                                   $no = 0;
                                   @endphp
                                   @foreach ($computer->componentComputerHistories as $componentComputerHistory)
                                   <tr class="read">
                                      <td class="text-center">{{ ++$no }}</td>
                                      <td class="text-center">{{ $componentComputerHistory->code }}</td>
                                      <td class="text-center">{{ $componentComputerHistory->component->code }}</td>
                                      <td class="text-center">{{ $componentComputerHistory->component->merk }}</td>
                                      <td class="text-center">{{ $componentComputerHistory->component->model }}</td>
                                      <td class="text-center">{{ $componentComputerHistory->component->price }}</td>
                                      <td class="text-center">{{ $componentComputerHistory->component->componentCategory->name }}</td>
                                      <td class="text-center">
                                      </td>
                                   </tr>
                                   @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     {{-- component --}}
                     <div id="component" class="tab-pane">
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
                                       <th style="text-align: center;">Merk</th>
                                       <th style="text-align: center;">Model</th>
                                       <th style="text-align: center;">Price</th>
                                       <th style="text-align: center;">Category</th>
                                       <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 0;
                                    @endphp
                                    @foreach ($components as $component)
                                    <tr class="read">
                                       <td class="text-center">{{ ++$no }}</td>
                                       <td class="text-center">{{ $component->code }}</td>
                                       <td class="text-center">{{ $component->merk }}</td>
                                       <td class="text-center">{{ $component->model }}</td>
                                       <td class="text-center">{{ $component->price }}</td>
                                       <td class="text-center">{{ $component->componentCategory->name }}</td>
                                       <td class="text-center">
                                          <a href="{{route('componentComputer/store', ['component' => $component->id, 'computer' =>$computer->id])}}" class="btn btn-primary btn-sm btn-outline"><i class="fa fa-check-circle"></i> </a>
                                       </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                     </div>
                     {{-- employee --}}
                     <div id="employee" class="tab-pane">
                        <div class="mail-tools tooltip-demo m-t-md">
                           <div class="btn-group pull-right">
                              {{-- {{ $banks->links() }} --}}
                           </div>
                           <a class="btn btn-primary btn-sm" data-toggle="modal" href="#mutationModal"><i class="fa fa-plus-circle"></i> Add</a>
                           <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                        </div><br>
                        <div class="table-responsive">
                           <table id="example5" class="table table-hover table-striped">
                              <thead>
                                   <tr>
                                      <th style="text-align: center;">No.</th>
                                      <th style="text-align: center;">ID</th>
                                      <th style="text-align: center;">Name</th>
                                      <th style="text-align: center;">Position</th>
                                      <th style="text-align: center;">Duty</th>
                                      <th style="text-align: center;">Department</th>
                                      <th style="text-align: center;">Branch</th>
                                      <th style="text-align: center;">Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @php
                                   $no = 0;
                                   @endphp
                                   @foreach ($mutations as $mutation)
                                   <tr class="read">
                                      <td class="text-center">{{ ++$no }}</td>
                                      <td class="text-center">{{ $mutation->code }}</td>
                                      <td class="text-left">{{ $mutation->employee->name }}</td>
                                      <td class="text-center">{{ $mutation->position->name }}</td>
                                      <td class="text-center">{{ $mutation->duty->name }}</td>
                                      <td class="text-center">{{ $mutation->department->name }}</td>
                                      <td class="text-center">{{ $mutation->branch->name }}</td>
                                      <td class="text-center">
                                          <a href="{{route('computerMutation/store', ['mutation' => $mutation->id, 'computer' => $computer->id])}}" class="btn btn-primary btn-sm btn-outline"><i class="fa fa-check-circle"></i> </a>
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
@endsection
