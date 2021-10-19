@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">States</h1>
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
                        <form method="GET" action="{{ route('states.index') }}" class="form-row align-items-center">
                            <div class="col">
                                <input type="search" id="inline-search" name="search" class="form-control mb-2 mr-sm-2" placeholder="Search State">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Search</button>
                            </div>
                          </form>
                    </div>
                    <div>
                        <a class="btn btn-primary mb-2" href={{ route('states.create') }}><i class="fas fa-user-plus"></i> Create</a>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                            <td># ID</td>
                            <td>Country</td>
                            <td>State</td>
                            <td>Manage</td>
                    </thead>
                    <tbody>
                        @foreach ($states as $state)
                            <tr>
                                <th scope="row">{{ $state->id }}</th>
                                <td>{{ $state->country->country_name }}</td>
                                <td>{{ $state->name }}</td>
                                <td>
                                    <a href={{ route('states.edit', $state->id) }} class="btn btn-success">
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