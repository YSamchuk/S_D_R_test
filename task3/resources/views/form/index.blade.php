@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">Файлы</div>
                    <div class="card-body">
                        @if(count($images))
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>№</th>
                                    <th>{{ __('files.tableName') }}</th>
                                    <th>{{ __('files.tableUser') }}</th>
                                </tr>
                                </thead>
                                @foreach($images as $key => $image)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $image->filename }}</td>
                                        <td>{{ $image->user->name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            {{ __('files.empty') }}
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="text-right my-1">
                            <a href="{{ route('images.create') }}" class="btn btn-primary">
                                {{ __('files.createButton') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
