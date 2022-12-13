<x-layout>
    <x-slot name="header">
        {{ __('Edit project') }}
    </x-slot>

    <x-panel class="flex flex-col pt-16 pb-16">
        <x-splade-form :default="$project" action="{{ route('projects.update', $project) }}" method="put">
            <x-splade-input name="name" label="Name" />
            <br />

            <x-splade-input date name="start_date" label="Start date" />
            <br />

            <x-splade-select name="category_id" label="Category" :options="$categories" />
            <br />

            <x-splade-checkbox name="is_active" value="1" label="Is active?" />
            <br />

            <x-splade-select name="users[]" label="Participants" :options="$users" multiple choices relation />
            <br />

            <x-splade-file name="logo" label="Logo" filepond preview accept="image/png" />
            <br />

{{--            <x-splade-checkboxes name="participants" label="Participants" :options="$users" />--}}

            <x-splade-submit label="Save" :spinner="false" />
        </x-splade-form>
    </x-panel>
</x-layout>
