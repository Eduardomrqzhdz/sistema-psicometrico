<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!--Sexo-->
        <div>
            <label for="id_sexo">Sexo</label>
            <select name="id_sexo" id="id_sexo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @foreach ($sexos as $sexo)
                    <option value="{{ $sexo->id }}" {{ $user->id_sexo == $sexo->id ? 'selected' : '' }}>
                        {{ $sexo->sexo }}
                    </option>
                @endforeach
            </select>
        </div>

        <!--Fecha de nacimiento-->
        <div>
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="mt-1 block w-full" :value="old('fecha_nacimiento', $user->fecha_nacimiento)" required autofocus autocomplete="fecha_nacimiento" />
            <x-input-error class="mt-2" :messages="$errors->get('fecha_nacimiento')" />
        </div>

        <!--oficio-->
        <div>
            <label for="id_oficio">Oficio</label>
            <select name="id_oficio" id="id_oficio" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @foreach ($oficios as $oficio)
                    <option value="{{ $oficio->id }}" {{ $user->id_oficio == $oficio->id ? 'selected' : '' }}>
                        {{ $oficio->oficio }}
                    </option>
                @endforeach
            </select>
        </div>

        <!--carrera-->
        <div>
            <label for="id_carrera">Carrera</label>
            <select name="id_carrera" id="id_carrera" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $user->id_carrera == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->carrera }}
                    </option>
                @endforeach
            </select>
        </div>

        <!--region-->
        <div>
            <label for="id_region">Region</label>
            <select name="id_region" id="id_region" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @foreach ($regiones as $region)
                    <option value="{{ $region->id }}" {{ $user->id_region == $region->id ? 'selected' : '' }}>
                        {{ $region->region }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
