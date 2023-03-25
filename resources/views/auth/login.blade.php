<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-3">

                    <div class="card-body mt-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <x-input id="email" name="email" label="Email Address" required type="email" />
                            <x-input id="password" name="password" label="Password" required type="password" />

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark px-4">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
