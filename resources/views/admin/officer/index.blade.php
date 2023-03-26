<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb name="officer" />
    </x-slot>

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
        <div class="d-block d-md-flex gap-2">
            <button class="btn btn-secondary" id="activeRecord">Aktif</button>
            <button class="btn btn-secondary" id="nonActiveRecord">Tidak Aktif</button>
            <button class="btn btn-secondary" id="allRecord">Semua</button>
        </div>
        <div>
            <a href="{{ route('admin.officer.create') }}" class="btn btn-primary">
                <span data-feather="plus"></span>
                Tambah Petugas
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="officersTable" class="table table-hover no-wrap w-100 align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>No. Telepon</th>
                        <th>Sejak</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin <span id="type"></span> data <span id="name" class="fw-semibold"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            function btnDelete(id, name) {
                $('#modalLabel').text('Hapus Data');
                $('#modal #type').text('hapus');
                $('#modal #name').text(name);
                let url = "{{ route('admin.officer.destroy', ':id') }}";
                url = url.replace(':id', id);
                $('#modal form').attr('action', url);
                $('#modal button[type="submit"]').addClass('btn btn-danger').text('Hapus');
            }

            function btnActivate(id, name) {
                $('#modalLabel').text('Aktifkan Data');
                $('#modal #type').text('aktifkan');
                $('#modal #name').text(name);
                let url = "{{ route('admin.officer.activate', ':id') }}";
                url = url.replace(':id', id);
                $('#modal form').attr('action', url);
                $('#modal button[type="submit"]').removeClass('btn btn-danger').addClass('btn btn-success').text('Aktifkan');
                $('#modal form').find('input[name="_method"]').remove();
            }

            $(function() {
                $('#officersTable').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ajax: "{{ route('admin.officer.index') }}",
                    columns: [{
                        data: 'name',
                        name: 'name'
                    }, {
                        data: 'sex',
                        name: 'sex'
                    }, {
                        data: 'job',
                        name: 'job'
                    }, {
                        data: 'phone',
                        name: 'phone'
                    }, {
                        data: 'created_at',
                        name: 'created_at'
                    }, {
                        data: 'status',
                        name: 'status'
                    }, {
                        data: 'action',
                        name: 'action'
                    }],
                });

                $('#activeRecord').on('click', function() {
                    $('#officersTable').DataTable().ajax.url("{{ route('admin.officer.index') }}?is_active=1").load();
                });

                $('#nonActiveRecord').on('click', function() {
                    $('#officersTable').DataTable().ajax.url("{{ route('admin.officer.index') }}?is_active=0").load();
                });

                $('#allRecord').on('click', function() {
                    $('#officersTable').DataTable().ajax.url("{{ route('admin.officer.index') }}").load();
                });
            });

            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ Session::get('success') }}'
                });
            @endif

            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Berhasil',
                    text: '{{ Session::get('error') }}'
                });
            @endif
        </script>
    @endpush
</x-app-layout>
