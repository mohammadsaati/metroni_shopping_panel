<x-auth-layout>

    @if($errors->any())
        <div class="bg-danger text-light px-3 py-2 text-start mb-3 rounded-3">
            @foreach($errors->all() as $error)
                <p class="mx-1">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <!--begin::Form-->
    <form class="form w-100" method="post"  action="{{ route('admin.login') }}">
        @csrf


        <!--begin::Login options-->
        {{--<div class="row g-3 mb-9">
            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Google link--->
                <a href="{{ url('/auth/redirect/google') }}?redirect_uri={{ url()->current() }}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ image('svg/brand-logos/google-icon.svg') }}" class="h-15px me-3"/>
                    Sign in with Google
                </a>
                <!--end::Google link--->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Google link--->
                <a href="{{ url('/auth/redirect/apple') }}?redirect_uri={{ url()->current() }}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ image('svg/brand-logos/apple-black.svg') }}" class="theme-light-show h-15px me-3"/>
                    <img alt="Logo" src="{{ image('svg/brand-logos/apple-black-dark.svg') }}" class="theme-dark-show h-15px me-3"/>
                    Sign in with Apple
                </a>
                <!--end::Google link--->
            </div>
            <!--end::Col-->
        </div>--}}
        <!--end::Login options-->


        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email"  class="form-control bg-transparent" />
            <!--end::Email-->
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent"/>
            <!--end::Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        {{--<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
            <a href="/forgot-password" class="link-primary">
                Forgot Password ?
            </a>
            <!--end::Link-->
        </div>--}}
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'ورود'])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        {{--  <div class="text-gray-500 text-center fw-semibold fs-6">
              Not a Member yet?

              <a href="/register" class="link-primary">
                  Sign up
              </a>
          </div>--}}
        <!--end::Sign up-->
    </form>
    <!--end::Form-->

</x-auth-layout>
