<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survei</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">SURVEI</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="">
                            @csrf
                            {{-- @foreach ($services as $service)
                                <div class="card mb-3">
                                    <div class="card-header">{{ $service->service_text }}</div> --}}

                            <div class="card-body">
                                @foreach ($questions as $question)
                                    <div class="card @if (!$loop->last) mb-3 @endif">
                                        <div class="card-header">{{ $question->question_text }}</div>

                                        <div class="card-body">
                                            <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                            @foreach ($question->options as $option)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="questions[{{ $question->id }}]"
                                                        id="option-{{ $option->id }}"
                                                        value="{{ $option->id }}"@if (old("questions.$question->id") == $option->id) checked @endif>
                                                    <label class="form-check-label" for="option-{{ $option->id }}">
                                                        {{ $option->option_text }}
                                                    </label>
                                                </div>
                                            @endforeach

                                            @if ($errors->has("questions.$question->id"))
                                                <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;"
                                                    role="alert">
                                                    <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- </div>
                            @endforeach --}}

                            {{-- @foreach ($questions as $question)
                                <div class="card-header">{{ $question->question_text }}</div>
                            @endforeach --}}
                            {{-- <div class="card-body">
                                @foreach ($questions as $question)
                                    <div class="card @if (!$loop->last) mb-3 @endif">
                                        <div class="card-header">{{ $question->question_text }}</div>

                                        <div class="card-body">
                                            <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                            @foreach ($question->options as $option)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="questions[{{ $question->id }}]"
                                                        id="option-{{ $option->id }}"
                                                        value="{{ $option->id }}"@if (old("questions.$question->id") == $option->id) checked @endif>
                                                    <label class="form-check-label" for="option-{{ $option->id }}">
                                                        {{ $option->option_text }}
                                                    </label>
                                                </div>
                                            @endforeach

                                            @if ($errors->has("questions.$question->id"))
                                                <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;"
                                                    role="alert">
                                                    <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div> --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
