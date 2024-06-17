<table class="table table-bordered " id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Responden</th>
            <th>Jenis Pelayanan</th>
            <th>Pertanyaan</th>
            <th>Pilihan</th>
            <th>Saran</th>
        </tr>
    </thead>
    <tbody>
        @forelse($groupedResults as $respondent_id => $services)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $respondent_id }}</td>
                <td>
                    @foreach ($services as $service_id => $results)
                        {{ $results->first()->service->service_text }}
                    @endforeach
                </td>
                <td>
                    <ol>
                        @foreach ($results as $result)
                            <li>{{ $result->question->question_text }}</li>
                        @endforeach
                    </ol>
                </td>
                <td>
                    <ol>
                        @foreach ($results as $result)
                            <li>{{ $result->option->option_text }}</li>
                        @endforeach
                    </ol>
                </td>
                <td>
                    @foreach ($results as $result)
                        @if ($loop->first)
                            {{ $result->saran }}
                        @endif
                    @endforeach
                </td>
            @empty
            <tr>
                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>
