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
                    <div class="col-md-10">
                        <div class="card">
                            <form action="{{route('complaint.store')}}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Complaint Reporting</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                        </div>
                                        <br><br>
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Complaint</label>
                                        <div class="col-sm-9">
                                           <textarea name="complaint" class="form-control" cols="30" rows="10" placeholder="Enter Your Complaints"></textarea>
                                        </div>
                                        <input type="hidden" name="employee_id" value="{{$employee_id}}">
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-dark">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if(count($complaints)>0)
                    <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>title</th>
                                            <th>Complaints</th>
                                            @can('isEmployee')
                                            <th>Actions</th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($complaints as $complaint)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{$complaint->title }}</td>
                                                <td>{{$complaint->complait}}</td>
                                                @can('isEmployee')
                                                <td>
                                                    <form action="{{route('complaint.delete')}}" method="post"><button class="btn btn-danger">Delete</button>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$complaint->id}}">
                                                </form>
                                                </td>
                                                @endcan
                                        </tbody>
                                        @endforeach
                                    </table>
                                    
                                </div>
                    @endif
                </div>
            </div>
    </div>

@endsection