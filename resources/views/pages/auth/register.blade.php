<x-auth-layout>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="text-start">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--begin::Form-->
    <form method="POST" class="form w-100"  action="{{ route('admin.register') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">
                ثبت نام ادمین
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->

            <!--end::Subtitle--->
        </div>
        <!--begin::Heading-->

        <!--begin::Login options-->

        <!--end::Login options-->

        <!--begin::Separator-->

        <!--end::Separator-->

        <!--begin::Input group--->

        <div class="fv-row mb-8">
            <!--begin::Name-->
            <input type="text" placeholder="نام" name="full_name" autocomplete="off" class="form-control bg-transparent text-start" value="{{ old('full_name') }}"/>
            <!--end::Name-->
        </div>


        <div class="fv-row mb-8">
            <!--begin::Name-->
            <input type="text" placeholder="شماره تلفن" name="phone_number" autocomplete="off" class="form-control bg-transparent text-start" value="{{ old('phone_number') }}"/>
            <!--end::Name-->
        </div>

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent text-start" value="{{ old('email') }}"/>
            <!--end::Email-->
        </div>


        <div class="fv-row mb-8">
            <!--begin::Email-->

            <!--end::Email-->
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control  text-start" type="password" placeholder="Password" name="password" autocomplete="off"/>

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->


            </div>
            <!--end::Wrapper-->


        </div>
        <!--end::Input group--->

        <!--end::Input group--->

        <!--end::Input group--->

        <!--begin::Accept-->

        <!--end::Accept-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'ثبت نام'])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">
            {{ trans('auth.after_registered_txt') }}

            <a href="/login" class="link-primary fw-semibold">
                {{ trans('auth.login_btn') }}
            </a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->


</x-auth-layout>
