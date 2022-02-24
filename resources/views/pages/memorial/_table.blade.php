<div class="table-responsive">
    <table class="table table-styling table-de">
        <thead>
            <tr class="table-primary">
                <th class="text-center">#</th>
                <th>Kode Memorial</th>
                <th>Tanggal</th>
                <th>Tipe</th>
                <th>Total</th>
                {!! Auth::user()->level != 'Viewer' ? "<th>Aksi</th>" : '' !!}
            </tr>
        </thead>
        <tbody>
            @php
                $page = Request::get('page');
                $no = !$page || $page == 1 ? 1 : ($page - 1) * 10 + 1;
            @endphp
            @foreach ($memorial as $item)
                <tr class="border-bottom-primary">
                    <td class="text-center text-muted">{{ $no }}</td>
                    <td>{{ $item->kode_memorial }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td>{{ $item->tipe }}</td>
                    <td>Rp. {{number_format($item->total, 2, ',', '.') }}</td>
                    @if (Auth::user()->level != 'Viewer')
                        <td>
                            <div class="form-inline">
                                <a href="{{ route('memorial.edit', $item->kode_memorial) }}" class="mr-2">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm"
                                        data-toggle="tooltip" title="Edit" data-placement="top"><span
                                            class="feather icon-edit"></span></button>
                                </a>
                                <form action="{{ route('memorial.destroy', $item->kode_memorial) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"
                                        data-placement="top"
                                        onclick="confirm('{{ __('Move data to trash ?') }}') ? this.parentElement.submit() : ''">
                                        <span class="feather icon-trash"></span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {{ $memorial->appends(Request::all())->links('vendor.pagination.custom') }}
    </div>
</div>
