<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb name="officer.show" :data="$officer" />
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <img src="{{ $officer->avatar ? asset('storage/' . $officer->avatar) : asset('images/noimage.jpg') }}"
                        class="img-fluid img-responsive rounded object-fit-fill" id="thumbnailContainer">
                </div>
                <div class="col-sm-10 mt-4 mt-sm-0">
                    <div class="d-sm-flex d-block gap-3 align-items-center">
                        <div class="col">
                            <x-input id="name" name="name" label="Nama Lengkap" :value="$officer->name" />
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
                            <x-input id="job" name="job" label="Pekerjaan" :value="$officer->job" />
                        </div>
                        <div class="col">
                            <x-input id="datepicker" name="birth_date" label="Tanggal Lahir" autocomplete="off"
                                :value="$officer->birth_date" />
                        </div>
                    </div>
                    <div class="d-sm-flex d-block gap-3 align-items-center">
                        <div class="col">
                            <x-input id="username" name="username" label="Username" :value="$officer->user->username" />
                        </div>
                        <div class="col">
                            <x-input id="email" name="email" label="Email" :value="$officer->user->email" />
                        </div>
                        <div class="col">
                            <x-input id="password" name="password" value="Rahasia" label="Password" type="text" />
                        </div>
                    </div>
                    <div class="d-sm-flex d-block gap-3 align-items-start">
                        <div class="col">
                            <x-textarea id="address" name="address" label="Alamat">{{ $officer->address }}
                            </x-textarea>
                        </div>
                        <div class="col">
                            <x-input id="phone" name="phone" label="No. Telepon" :value="$officer->phone" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.officer.index') }}" class="btn btn-dark">Kembali</a>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            $(function() {
                // disable all input
                $('input').attr('disabled', true);
                $('textarea').attr('disabled', true);
            });
        </script>
    @endpush
</x-app-layout>
