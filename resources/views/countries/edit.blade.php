@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-start mb-4">
    <a  data-toggle="tooltip" data-placement="top" title="Back" class="mx-2" href="{{  route('countries.index') }}">
       <i class="fas fa-arrow-alt-circle-left"></i></a>
    <h1 class="h3 mb-0 text-gray-800">Update Country</h1>
    <div class="col m-2">
       <form action="{{ route('countries.destroy', $country->id) }}" method="post">
           @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-danger float-right">Delete Country</button>
       </form>
      </div>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 mx-auto">
        <form method="POST" action="{{ route('countries.update', $country->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
    
                <div class="col-md-6">
                    <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('Country code', $country->country_code) }}" required autocomplete="name" autofocus>
    
                    @error('country_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="Country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
    
                <div class="col-md-6">
                    <input id="Country" type="text" class="form-control @error('Country') is-invalid @enderror" name="country_name" value="{{ old('Country', $country->country_name) }}" required autocomplete="name" autofocus>
    
                    @error('Country')
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