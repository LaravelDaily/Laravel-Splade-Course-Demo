<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <x-splade-table :for="$users" class="min-w-full">
            <x-splade-cell actions>
                <Link modal href="/users/{{ $item->id }}"> Show </Link>
            </x-splade-cell>
        </x-splade-table>
    </x-panel>
</x-layout>
