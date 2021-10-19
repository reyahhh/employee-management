@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-start mb-4">
    <a  data-toggle="tooltip" data-placement="top" title="Back" class="mx-2" href="{{  route('states.index') }}">
        <i class="fas fa-arrow-alt-circle-left"></i></a>
    <h1 class="h3 mb-0 text-gray-800">Add State</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-12 my-4">
        <form method="POST" action="{{ route('states.store') }}">
        @csrf

        <div class="form-group row">
            <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

            <div class="col-md-6">
                <select id="country_id" name="country_id" class="form-control" aria-label="Select country">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('State') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('State')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection