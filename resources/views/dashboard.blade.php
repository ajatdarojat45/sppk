@extends(Auth::user()->mutationActive()->department->id == 1 ? 'layouts.admin' : Auth::user()->mutationActive()->department->id == 4 ? 'layouts.hr' : 'layouts.employee')

@section('title')
   Dashboard - FIMZ Cemerlang Bangsa
@endsection
@section('content')
@endsection
