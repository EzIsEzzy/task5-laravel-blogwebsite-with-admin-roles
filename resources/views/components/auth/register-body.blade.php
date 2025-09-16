<x-auth.auth-layout pageName="Register" brandName="Blog Website" pageDesc="Please Register to proceed" action="{{ route('register') }}" >
    <x-slot:auth_content>
        <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your Name"
                    autofocus
                  />
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
    <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    autofocus
                  />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Confirm Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password_confirmation"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                </div>
    </x-slot:auth_content>
        
    <x-slot:auth_redirect>
        <span>Registered Already?</span>
                <a href="{{ route('login') }}">
                  <span>Sign in here!</span>
                </a>
    </x-slot:auth_redirect>
</x-auth.auth-layout>