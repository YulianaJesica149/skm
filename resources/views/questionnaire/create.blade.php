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
                <div class="card mt-3 mb-3">
                    <div class="card-header">SURVEI</div>

                    <div class="card-body">
                        <form method="POST" action="/result">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="respondent_id" value="{{ $respondent->id }}">
                                <input type="hidden" name="service_id" value="{{ $service_id }}">
                                @foreach ($questions as $question)
                                    <div class="card @if (!$loop->last) mb-3 @endif">
                                        <div class="card-header">{{ $question->question_text }}</div>

                                        <div class="card-body">
                                            <input type="hidden" name="questions[{{ $question->id }}]"
                                                value="questions">
                                            @foreach ($question->options as $option)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="answers[{{ $question->id }}]"
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

                                <div class="form-floating mt-4">
                                    <textarea class="form-control" placeholder="Jawaban Anda" id="saran" name="saran" required></textarea><label for="saran">Masukan Saran Anda</label>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                    <button class="btn btn-primary" type="submit" value="submit">Simpan</button>
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
