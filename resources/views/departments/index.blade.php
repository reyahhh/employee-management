@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departments</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="col p-0">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{  session('message') }}
                </div>
                @endif
            </div>
        </div>
        <div class="card mx-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('departments.index') }}" class="form-row align-items-center">
                            <div class="col">
                                <input type="search" id="inline-search" name="search" class="form-control mb-2 mr-sm-2" placeholder="Search">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Search</button>
                            </div>
                          </form>
                    </div>
                    <div>
                        <a class="btn btn-primary mb-2" href={{ route('departments.create') }}><i class="fas fa-plus"></i>  Create</a>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td># ID</td>
                            <td>Department</td>
                            <td>Manage</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <th scope="row">{{ $department->id }}</th>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a href={{ route('departments.edit', $department->id) }} class="btn btn-success">
                                        <i class="far fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection