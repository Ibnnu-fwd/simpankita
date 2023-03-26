<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb name="officer.edit" :data="$officer" />
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.officer.update', $officer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-2">
                        <img src="{{ $officer->avatar ? asset('storage/' . $officer->avatar) : asset('images/noimage.jpg') }}"
                            class="img-fluid img-responsive rounded object-fit-fill" id="thumbnailContainer">
                        <div class="mt-3 d-grid">
                            <button type="button" class="btn btn-dark" id="btnChoose">Pilih Gambar
                            </button>
                            <x-input id="avatar" name="avatar" type="file" class="d-none" />
                        </div>
                    </div>
                    <div class="col-sm-10 mt-4 mt-sm-0">
                        <div class="d-sm-flex d-block gap-3 align-items-center">
                            <div class="col">
                                <x-input id="name" name="name" label="Nama Lengkap" :value="$officer->name"
                                    required />
                            </div>
                            <div class="col">
                                <div class="mb-3 d-block">
                                    <label class="form-label">{{ __('Jenis Kelamin') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="d-sm-flex d-block gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" value="1"
                                                {{ $officer->sex == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex"value="2"
                                                {{ $officer->sex == 2 ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-sm-flex d-block gap-3 align-items-center">
                            <div class="col">
                                <x-input id="job" name="job" label="Pekerjaan" :value="$officer->job" required />
                            </div>
                            <div class="col">
                                <x-input id="datepicker" name="birth_date" label="Tanggal Lahir" required
                                    autocomplete="off" :value="$officer->birth_date"/>
                            </div>
                        </div>
                        <div class="d-sm-flex d-block gap-3 align-items-center">
                            <div class="col">
                                <x-input id="username" name="username" label="Username" :value="$officer->user->username" required />
                            </div>
                            <div class="col">
                                <x-input id="email" name="email" :value="$officer->user->email" label="Email" required />
                            </div>
                            <div class="col">
                                <x-input id="password" name="password" label="Password" type="password" />
                            </div>
                        </div>
                        <div class="d-sm-flex d-block gap-3 align-items-start">
                            <div class="col">
                                <x-textarea id="address" name="address" label="Alamat" required>{{$officer->address}}
                                </x-textarea>
                            </div>
                            <div class="col">
                                <x-input id="phone"  name="phone" label="No. Telepon" :value="$officer->phone" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Simpan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('js-internal')
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    autoclose: true,
                    todayHighlight: true
                });

                $("#btnChoose").click(function() {
                    $("#avatar").click();
                });

                $("#avatar").change(function() {
                    const file = $(this)[0].files[0];
                    const fileReader = new FileReader();
                    fileReader.onloadend = function() {
                        $("#thumbnailContainer").attr("src", fileReader.result);
                    }
                    fileReader.readAsDataURL(file);
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
