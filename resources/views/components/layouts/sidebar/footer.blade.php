<div class="border-t  border-white/20  p-6 text-xs">

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button
        type="submit"
        class="w-full flex items-center gap-4 rounded-xl px-4 py-3 hover:bg-white/20 transition">

        <span x-show="sidebar">
            Logout
        </span>

    </button>

</form>

    <div x-show="sidebar" class="mt-6 text-center text-xs opacity-70">
        HALAL Framework
        <br>
        Version Latihan
    </div>

</div>