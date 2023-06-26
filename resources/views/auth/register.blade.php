<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" pattern="[A-Z]+" title="Please enter capital letters only" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="use UTM email" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <button id="toggle-password" type="button">show</button>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <button id="toggle-password-confirm" type="button">show</button>
            </div>

            <div class="row">
                <div class="col-md-4 mt-4">
                    <x-label for="course" value="{{ __('Course') }}" />
                    <x-input id="course" class="block mt-1 w-full" type="text" name="course" pattern="[A-Z]+" title="Please enter capital letters only" placeholder="E.g. BACHELOR OF SCIENCE" />
                </div>

                <div class="col-md-4 mt-4">
                    <x-label for="block" value="{{ __('Block') }}" />
                    <x-input id="block" class="block mt-1 w-full" type="text" name="block" pattern="[A-Z]+" title="Please enter capital letters only" placeholder="E.g. MA1" />
                </div>

                <div class="col-md-4 mt-4">
                    <x-label for="room" value="{{ __('Room No') }}" />
                    <x-input id="room" class="block mt-1 w-full" type="text" name="room" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

    <script>
    const togglePassword = document.querySelector('#toggle-password');
    const passwordField = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        togglePassword.textContent = type === 'password' ? 'Show' : 'Hide';
    });
    const togglePasswordConfirm = document.querySelector('#toggle-password-confirm');
    const passwordConfirmField = document.querySelector('#password_confirmation');

    togglePasswordConfirm.addEventListener('click', function () {
        const type = passwordConfirmField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmField.setAttribute('type', type);
        togglePasswordConfirm.textContent = type === 'password' ? 'Show' : 'Hide';
    });

        const emailInput = document.getElementById('email');
        const courseBlock = document.getElementById('course');
        const blockBlock = document.getElementById('block');
        const roomBlock = document.getElementById('room');
        const courseLabel = document.querySelector('label[for="course"]');
        const blockLabel = document.querySelector('label[for="block"]');
        const roomLabel = document.querySelector('label[for="room"]');

        // Hide the fields and labels initially
        courseBlock.style.display = 'none';
        blockBlock.style.display = 'none';
        roomBlock.style.display = 'none';
        courseLabel.style.display = 'none';
        blockLabel.style.display = 'none';
        roomLabel.style.display = 'none';

        emailInput.addEventListener('input', function() {
            const emailValue = this.value.trim();
            const isGraduateEmail = emailValue.endsWith('@graduate.utm.my');

            if (isGraduateEmail) {
                courseBlock.style.display = 'block';
                blockBlock.style.display = 'block';
                roomBlock.style.display = 'block';
                courseLabel.style.display = 'block';
                blockLabel.style.display = 'block';
                roomLabel.style.display = 'block';
            } else {
                courseBlock.style.display = 'none';
                blockBlock.style.display = 'none';
                roomBlock.style.display = 'none';
                courseLabel.style.display = 'none';
                blockLabel.style.display = 'none';
                roomLabel.style.display = 'none';
            }
        });
    </script>
</x-guest-layout>
