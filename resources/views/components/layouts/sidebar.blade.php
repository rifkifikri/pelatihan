<aside x-bind:class="sidebar ? 'w-72' : 'w-24'"  class="fixed left-0 top-0 h-screen 
bg-linear-to-b from-[#5AA71B] via-[#4C8E17] to-[#407613] text-white shadow-2xl transition-all duration-300 flex flex-col">

    <x-layouts.sidebar.brand />

    <!-- <x-layouts.sidebar.profile /> -->

    <x-layouts.sidebar.menu />

    <!-- <x-layouts.sidebar.footer /> -->

</aside>