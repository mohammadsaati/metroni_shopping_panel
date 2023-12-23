<x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" method="post" action="{{ route("login") }}">
        @csrf
        <input type="hidden" name="guard" value="admin">
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">
                ورود به پنل مدیریتی
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->

            <!--end::Subtitle--->
        </div>
        <!--begin::Heading-->

        <!--begin::Login options-->
        <div class="row g-3 mb-9">
            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Google link--->
                {{--<a href="{{ url('/auth/redirect/google') }}?redirect_uri={{ url()->current() }}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ image('svg/brand-logos/google-icon.svg') }}" class="h-15px me-3"/>
                    Sign in with Google
                </a>--}}
                <!--end::Google link--->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Google link--->
             {{--   <a href="{{ url('/auth/redirect/apple') }}?redirect_uri={{ url()->current() }}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ image('svg/brand-logos/apple-black.svg') }}" class="theme-light-show h-15px me-3"/>
                    <img alt="Logo" src="{{ image('svg/brand-logos/apple-black-dark.svg') }}" class="theme-dark-show h-15px me-3"/>
                    Sign in with Apple
                </a>--}}
                <!--end::Google link--->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Login options-->


        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="demo@demo.com"/>
            <!--end::Email-->
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" value="demo"/>
            <!--end::Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
         {{--   <a href="/forgot-password" class="link-primary">
                Forgot Password ?
            </a>--}}
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" class="btn btn-primary">
                ورود
            </button>
        </div>
        <!--end::Submit button-->

    </form>
    <!--end::Form-->

</x-auth-layout>
