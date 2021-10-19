@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-start mb-4">
    <a  data-toggle="tooltip" data-placement="top" title="Back" class="mx-2" href="{{  route('departments.index') }}">
       <i class="fas fa-arrow-alt-circle-left"></i></a>
    <h1 class="h3 mb-0 text-gray-800">Add Department</h1>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 mx-auto">
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf
            <div class="form-group row">
                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
    
                <div class="col-md-6">
                    <input id="department" type="text" class="form-control @error('Department') is-invalid @enderror" name="name" value="{{ old('Department') }}" required autocomplete="name" autofocus>
    
                    @error('Department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection