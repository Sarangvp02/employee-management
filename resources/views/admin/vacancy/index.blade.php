@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
    @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Vacancies</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacancy')}}">Vacancy</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Vacancy List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Vacancy</th>
                                            <th>Nos</th>
                                            @can('isAdmin')
                                            <th>Actions</th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vacancies as $vacancy)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{$vacancy->vacancy }}</td>
                                                <td>{{$vacancy->qty}}</td>
                                                @can('isAdmin')
                                                <td>
                                                    <form action="{{route('vacancy.delete')}}" method="post"><button class="btn btn-danger">Delete</button>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$vacancy->id}}">
                                                </form>
                                                </td>
                                                @endcan
                                        </tbody>
                                        @endforeach
                                    </table>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection  