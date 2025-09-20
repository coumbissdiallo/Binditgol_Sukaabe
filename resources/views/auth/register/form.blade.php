            <!-- formulaire parent -->
@if ($role=='parent')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- prenom -->
        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>


        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- telephone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('telephone')" required autocomplete="given-tel" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- select région -->
        <div class="mt-4">
            <x-input-label for="region" :value="__('Région')" />

                <select name="region" id="region" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('region')"  required autocomplete="name">
                    
                    <option value="">Selectionnez votre région</option>
                    @foreach($regions as $region)
                    <option value="{{$region->region}}">{{$region->region}}
                    </option>
                    @endforeach
                </select>
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

<!-- select commune -->
        <div class="mt-4">
            <x-input-label for="commune" :value="__('Commune')" />

                <select name="id_commune" id="commune" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('id_commune')" required autocomplete="name">
                    
                    <option value="">Selectionnez votre commune</option>
                </select>
            <x-input-error :messages="$errors->get('id_commune')" class="mt-2" />
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
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Avez-vous déjà un compte?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endif



            <!-- formulaire agent sante communautaire -->
@if ($role=='asc')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- prenom -->
        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>


        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- telephone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('telephone')" required autocomplete="number" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- select Zone d'intervention -->
        <div class="mt-4">
            <x-input-label for="region" :value="__('Zone d\'intervention')" />

                <select name="region" id="region" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('region')" required autocomplete="name">
                    
                    <option value="">Selectionnez votre région</option>
                    @foreach($regions as $region)
                    <option value="{{ $region->region }}">
                        {{$region->region}}
                    </option>
                    @endforeach
                </select>
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
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
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Avez-vous déjà un compte?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endif



            <!-- formulaire officier -->
@if ($role=='officier')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
            <input type="hidden" name="role" value="{{ $role }}">

        <!-- prenom -->
        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>


        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- telephone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('telephone')" required autocomplete="number" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- select région -->
        <div class="mt-4">
            <x-input-label for="region" :value="__('Région')" />

                <select name="region" id="region" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('region')" required autocomplete="name">
                    
                    <option value="">Selectionnez votre région</option>
                    @foreach($regions as $region)
                    <option value="{{$region->region}}">
                         {{$region->region}}
                    </option>
                    @endforeach
                </select>
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

<!-- select commune -->
        <div class="mt-4">
            <x-input-label for="commune" :value="__('Commune')" />

                <select name="id_commune" id="commune" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('id_commune')" required autocomplete="name">
                    
                    <option value="">Selectionnez votre commune</option>
                </select>
            <x-input-error :messages="$errors->get('id_commune')" class="mt-2" />
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

        <!-- cle access -->
        <div class="mt-4">
            <x-input-label for="cle" :value="__('Clé d\'accés')" />
            <x-text-input id="cle" class="block mt-1 w-full" type="name" name="cle" :value="old('cle')"/>
            <x-input-error :messages="$errors->get('cle')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Avez-vous déjà un compte?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endif



            <!-- formulaire agent civil -->
@if ($role=='agent')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
            <input type="hidden" name="role" value="{{ $role }}">

        <!-- prenom -->
        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>


        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- telephone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('telephone')" required autocomplete="number" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- select région -->
        <div class="mt-4">
            <x-input-label for="region" :value="__('Région')" />

                <select name="region" id="region" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('region')" required autocomplete="name">
                    
                    <option value="">Selectionnez votre région</option>
                    @foreach($regions as $region)
                    <option value="{{$region->region}}">
                        {{$region->region}}</option>
                    @endforeach
                </select>
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

<!-- select commune -->
        <div class="mt-4">
            <x-input-label for="commune" :value="__('Commune')" />

                <select name="id_commune" id="commune" class="block mt-1 w-full block font-medium text-sm text-gray-700" required autocomplete="name">
                    
                    <option value="">Selectionnez votre commune</option>
                </select>
            <x-input-error :messages="$errors->get('id_commune')" class="mt-2" />
        </div>

        <!-- cle access -->
        <div class="mt-4">
            <x-input-label for="cle" :value="__('Clé d\'accés')" />
            <x-text-input id="cle" class="block mt-1 w-full" type="name" name="cle" :value="old('cle')"/>
            <x-input-error :messages="$errors->get('cle')" class="mt-2" />
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
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Avez-vous déjà un compte?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endif


            <!-- formulaire maternité -->
@if ($role=='maternite')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
            <input type="hidden" name="role" value="{{ $role }}">

        <!-- prenom -->
        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>


        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- telephone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('phone')" required autocomplete="number" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- select région -->
        <div class="mt-4">
            <x-input-label for="region" :value="__('Région')" />

                <select name="region" id="region" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('region')" required autocomplete="name">
                    
                    <option value="">Selectionnez votre région</option>
                    @foreach($regions as $region)
                    <option value="{{$region->region}}">
                        {{$region->region}}</option>
                    @endforeach
                </select>
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

<!-- select commune -->
        <div class="mt-4">
            <x-input-label for="commune" :value="__('Commune')" />

                <select name="id_commune" id="commune" class="block mt-1 w-full block font-medium text-sm text-gray-700" :value="old('id_commune')" required autocomplete="name">
                    
                    <option value="">Selectionnez votre commune</option>
                </select>
            <x-input-error :messages="$errors->get('id_commune')" class="mt-2" />
        </div>

        <!-- cle access -->
        <div class="mt-4">
            <x-input-label for="cle" :value="__('Clé d\'accés')" />
            <x-text-input id="cle" class="block mt-1 w-full" type="name" name="cle" :value="old('cle')"/>
            <x-input-error :messages="$errors->get('cle')" class="mt-2" />
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
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Avez-vous déjà un compte?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endif


