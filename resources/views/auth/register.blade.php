<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol de usuario -->
        <div class="mt-4">
            <x-text-input id="rol" class="block mt-1 w-full" type="hidden" name="rol" value="2" readonly/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <!--sexo-->
        <div class="mt-4">
            <x-input-label for="id_sexo" :value="__('Sexo')" />
            <select id="id_sexo" name="id_sexo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus autocomplete="sexo">
                <option value="" disabled selected>Selecciona una opción</option>
                @foreach($sexos as $sexo)
                    <option value="{{ $sexo->id }}" {{ old('id_sexo') == $sexo->id ? 'selected' : '' }}>
                        {{ $sexo->sexo }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_sexo')" class="mt-2" />
        </div>

        <!-- Fecha nacimiento -->
        <div class="mt-4">
            <x-input-label for="fecha_nacimiento" :value="__('Fecha nacimiento')" />

            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" :value="old('fecha_nacimiento')"
                          type="date"
                          name="fecha_nacimiento" required/>

            <x-input-error :messages="$errors->get('Fecha de nacimiento')" class="mt-2" />
        </div>

        <!-- oficio -->
        <div class="mt-4">
            <label for="id_oficio" class="block font-medium text-sm text-gray-700">Oficio</label>
            <select id="id_oficio" name="id_oficio" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="" disabled selected>Selecciona una opción</option>
                @foreach($oficios as $oficio)
                    <option value="{{ $oficio->id }}" {{ old('id_oficio') == $oficio->id ? 'selected' : '' }}>
                        {{ $oficio->oficio }}
                    </option>
                @endforeach
            </select>
            @error('id_oficio')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        <!-- Carrera -->
        <div class="mt-4">
            <label for="id_carrera" class="block font-medium text-sm text-gray-700">Carrera</label>
            <select id="id_carrera" name="id_carrera" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="" disabled selected>Selecciona una opción</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ old('id_carrera') == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->carrera }}
                    </option>
                @endforeach
            </select>
            @error('id_carrera')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Región -->
        <div class="mt-4">
            <label for="id_region" class="block font-medium text-sm text-gray-700">Región</label>
            <select id="id_region" name="id_region" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="" disabled selected>Selecciona una opción</option>
                @foreach($regiones as $region)
                    <option value="{{ $region->id }}" {{ old('id_region') == $region->id ? 'selected' : '' }}>
                        {{ $region->region }}
                    </option>
                @endforeach
            </select>
            @error('id_region')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
