<table class="table table-hover text-nowrap" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            {{-- <th>Id</th> --}}
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            {{-- @if (auth()->user()->hasRole('admin'))
                <th>Aksi</th>
            @endif --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($respondents as $respondent)
            <tr data-entry-id="{{ $respondent->id }}">
                <td>{{ $loop->iteration }}</td>
                {{-- <td>{{ $respondent->id }}</td> --}}
                <td>{{ $respondent->umur }}</td>
                <td>{{ $respondent->jenis_kelamin }}</td>
                <td>{{ $respondent->pendidikan }}</td>
                <td>{{ $respondent->pekerjaan }}</td>
                {{-- @if (auth()->user()->hasRole('admin') ||
    auth()->user()->can('edit_respondent' || 'delete_respondent'))
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="/respondent-edit/{{ $respondent->id }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form onclick="return confirm('Yakin mau menghapus ? ')" class="d-inline"
                                action="/respondent-destroy/{{ $respondent->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"
                                    style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                @endif --}}
            </tr>
        @endforeach
    </tbody>
</table>
