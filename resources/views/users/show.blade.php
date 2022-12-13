<x-splade-modal>
    <h1 class="text-2xl mb-4">User details</h1>

    <b>Name</b>: {{ $user->name }}
    <br />
    <b>Email</b>: {{ $user->email }}
    <br />
    <b>Registered on</b>: {{ $user->created_at }}
</x-splade-modal>
