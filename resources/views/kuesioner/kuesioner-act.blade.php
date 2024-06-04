<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- AJAX --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Survei</div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif --}}

                        <form>
                            @csrf
                            <!-- /.form group -->
                            <div class="form-group">
                                <label for="service" class="form-label">Jenis Pelayanan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-file-earmark-medical"></i></span>
                                    </div>
                                    <select class="form-select" id ="service" name="service">
                                        <option selected>Pilih Layanan</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->service_text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="question" class="form-label">Jenis Pertanyaan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-file-earmark-medical"></i></span>
                                    </div>
                                    <select class="form-select" id ="question" name= "question"></select>
                                </div>
                            </div>

                            {{-- @push('js')
                                {{-- <script type="text/javascript">
                                    jQuery(document).ready(function($) {
                                        $('#service').on('change', function() {
                                            var id_service = $(this).val();
                                            // console.log(id_service);
                                            if (id_service) {
                                                $.ajax({
                                                    url: '/question/' + id_service,
                                                    type: 'GET',
                                                    data: {
                                                        '_token': '{{ csrf_token() }}'
                                                    },
                                                    dataType: 'json',
                                                    success: function(data) {
                                                        console.log(data);
                                                    }
                                                });
                                            } else {}
                                        });
                                    });
                                </script> --}}
                            {{-- @push('js')
                                <script type="text/javascript">
                                    jQuery(document).ready(function($) {
                                        $('#serviceId').change(function() {
                                            var kriteria = document.form1.serviceId.value;
                                            document.form1.questionId.value = null;

                                            $.get("{{ url('api/get-question') }}/" + kriteria,
                                                //{ id: $(this).val() }, 
                                                function(data) {
                                                    //console.log(message);
                                                    var model = $('#questionId');
                                                    model.empty();
                                                    var question = '';
                                                    $.each(data, function(index, element) {
                                                        question += "<option value='pilih" + element.id + "'>" +
                                                            element.question_text + "</option>";
                                                    });
                                                    $('#questionId').html(question);

                                                });
                                        });
                                    });
                                </script>
                            @endpush --}}
                            {{-- <script>
                                $(document).ready(function() {
                                    $('#serviceId').on('change', function() {
                                        var idService = this.value;
                                        $("#questionId").html('');
                                        $.ajax({
                                            url: "{{ url('api/get-question') }}",
                                            type: "POST",
                                            data: {
                                                service_id: idService,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            dataType: 'json',
                                            success: function(result) {
                                                $('#questionId').html(
                                                    '<option value="">-- Pilih Pertanyaan --</option>');
                                                $.each(result.question, function(key, value) {
                                                    $("#questionId").append(
                                                        '<option value="' + value.id + '">' + value
                                                        .question_text + '</option>'
                                                    );
                                                });
                                            }
                                        });
                                    });
                                });
                            </script> --}}

                            @push('js')
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#service').on('change', function() {
                                            var idService = this.value;
                                            $("#question").html('');
                                            $.ajax({
                                                url: "{{ url('question') }}?service_id=" + idService,
                                                type: "POST",
                                                dataType: 'json',
                                                success: function(result) {
                                                    $("#question").html(
                                                        '<option value="">-- Pilih Pertanyaan --</option>');
                                                    $.each(result.question, function(key, value) {
                                                        $("#question").append(
                                                            '<option value="' + value.id + '">' + value
                                                            .question_text + '</option>'
                                                        );
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                            @endpush

                            {{-- <script>
                                $(function() {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRFTOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                    });

                                    $(function() {
                                        $('#service').on('change', function() {
                                            let serviceId = $('#service').val();

                                            $ajax({
                                                type: 'POST',
                                                url: "{{ route('getquestion') }}",
                                                data: {
                                                    service_id: serviceId
                                                },
                                                cache: false,

                                                success: function(msg) {
                                                    $('#question').html(msg);
                                                },
                                                error: function(data) {
                                                    console.log('error:', data)
                                                },
                                            })
                                        })
                                    })
                                })
                            </script> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
