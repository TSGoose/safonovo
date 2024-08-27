@props(['title', 'description' => null])
<div class="mb-12 text-center">
    <h2
        class="font-6xl text-BebasNeue text-white mb-8 lg:mb-16">
        {{ $title }}
    </h2>

    @isset($description)
        <p class="mt-6 text-sm text-gray-400">
            {!! $description !!}
        </p>
    @endisset
</div>
