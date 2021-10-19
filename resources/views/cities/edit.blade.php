@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-start mb-4">
    <a  data-toggle="tooltip" data-placement="top" title="Back" class="mx-2" href="{{  route('cities.index') }}">
        <i class="fas fa-arrow-alt-circle-left"></i></a>
    <h1 class="h3 mb-0 text-gray-800">Update City</h1>
    <div class="col m-2">
        <form action="{{ route('cities.destroy', $city->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger float-right">Delete City</button>
        </form>
       </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12 my-4">
        <form method="POST" action="{{ route('cities.update', $city->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

            <div class="col-md-6">
                <select id="state_id" name="state_id" class="form-control" aria-label="Select State">
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}" {{ $state->id == $city->state_id ? 'selected' : '' }}>{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('City') is-invalid @enderror" name="name" value="{{ old('name', $city->name) }}" required autocomplete="name" autofocus>

                @error('City')
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