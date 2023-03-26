<x-dropdown-icon>
    <a class="dropdown-item" href="{{ route('admin.officer.show', $data->id) }}">Detail</a>
    <a class="dropdown-item" href="{{ route('admin.officer.edit', $data->id) }}">Edit</a>
    @if ($data->is_active == 0)
        <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#modal"
            onclick="btnActivate('{{ $data->id }}', '{{ $data->name }}')">Aktifkan</a>
    @else
        <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#modal"
            onclick="btnDelete('{{ $data->id }}', '{{ $data->name }}')">Hapus</a>
    @endif
</x-dropdown-icon>
