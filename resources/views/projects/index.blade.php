<x-layout>
    <x-slot name="header">
        {{ __('Projects') }}
    </x-slot>

    <x-panel class="flex flex-col pt-16 pb-16">
        <Link href="{{ route('projects.create') }}" class="underline">Add new project</Link>

        <x-splade-table :for="$projects" class="min-w-full">
            <x-splade-cell actions>
                <Link href="{{ route('projects.edit', $item) }}">Edit</Link>
                <x-splade-form action="{{ route('projects.destroy', $item) }}" method="delete" confirm>
                    <x-splade-submit label="Delete" class="bg-red-500 text-white" />
                </x-splade-form>
            </x-splade-cell>
        </x-splade-table>
    </x-panel>
</x-layout>
