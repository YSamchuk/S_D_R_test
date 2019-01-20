@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        {{ \Session::get('success') }}
                    </div>
                @endif
                @if(\Session::has('error'))
                    <div class="alert alert-error">
                        {{ \Session::get('error') }}
                    </div>
                @endif
                <form class="card" method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
                    <div class="card-header">{{ __('files.form.addTitle') }}</div>
                    <div class="card-body">
                        <label class="" for="file">
                            <input type="file" class="form-control-file" id="file" name="file" required>
                        </label>

                        @if ($errors->has('file'))
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </div>
                        @endif
                        <input type="hidden" value="{{ Auth::user()->id }}" id="user_id" name="user_id" />
                        @csrf
                    </div>
                    <div class="card-footer">
                        <div class="clearfix">
                            <a href="{{ route('images.index') }}" class="btn btn-secondary" title="{{ __('files.form.cancelButton') }}">{{ __('files.form.cancelButton') }}</a>
                            <button type="submit" class="btn btn-primary float-right" title="{{ __('files.form.saveButton') }}">{{ __('files.form.saveButton') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
