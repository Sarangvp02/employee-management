@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Complaints</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('complaint')}}">Vacancy</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

            <div class="container-fluid">

                <div class="row">
                    @if(count($complaints)>0)
                    <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>title</th>
                                            <th>Complaints</th>
                                            <th>Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($complaints as $complaint)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{$complaint->title }}</td>
                                                <td>{{$complaint->complait}}</td>
                                                <td>{{$complaint->first_name}}</td>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    
                                </div>
                    @endif
                </div>
            </div>
    </div>

@endsection