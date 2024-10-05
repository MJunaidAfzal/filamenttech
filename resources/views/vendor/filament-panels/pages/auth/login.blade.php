<x-filament-panels::page.simple>
    @if (filament()->hasRegistration())
        <x-slot name="subheading">
            {{ __('filament-panels::pages/auth/login.actions.register.before') }}

            {{ $this->registerAction }}
        </x-slot>
    @endif
{{--
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif --}}

{{-- @if ($errors->has('admin'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="border-color: orange" role="alert">
        <strong class="font-bold" style="color: orange;">Unauthorized Access</strong>
        <span class="block sm:inline">For Client access <a style="color: orange" href="{{ route('filament.client.auth.login') }}">Login Here</a></span>
      </div>
    @endif --}}

    <style>
        body{
            background: linear-gradient(90deg, #000000, #7ebc27, #000000);
        }
    </style>

    @if ($errors->has('client'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="border-color:#84CC16" role="alert">
        <strong class="font-bold" style="color:#84CC16;">Unauthorized Access</strong>
        <span class="block sm:inline">You are not a Client please <a style="color:#84CC16;text-decoration:none" href="{{ route('login') }}">Login here </a></span>
      </div>
    @endif




    {{-- @if ($errors->has('developer'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="border-color:#C084FC" role="alert">
        <strong class="font-bold" style="color:#C084FC;">Unauthorized Access</strong>
        <span class="block sm:inline">You are not a Developer</span>
      </div>
    @endif

    @if ($errors->has('support'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="border-color:#60A5FA" role="alert">
        <strong class="font-bold" style="color:#60A5FA;">Unauthorized Access</strong>
        <span class="block sm:inline">You are not a Support</span>
      </div>
    @endif --}}


    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

    <x-filament-panels::form id="form" wire:submit="authenticate">
        {{ $this->form }}
        <a href="{{ route('register') }}" class="text-sm text-primary-600 hover:text-primary-900">
            Don't have an account? Register here
        </a>
        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
</x-filament-panels::page.simple>



