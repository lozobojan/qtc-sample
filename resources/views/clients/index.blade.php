<x-app-layout title="Table">
    @include('sweetalert::alert')

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="container grid px-6 mx-auto text-center">
            <h2 class="my-6 text-2xl font-semibold ">
                Your Clients Listing
            </h2>
        </div>
        <div class="mb-5 ml-32">
            <a href="{{ route('clients.create') }}">
                <button
                    class="px-16 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    ADD NEW CLIENT
                </button>
            </a>
        </div>
        <div class="w-10/12 mx-auto my-auto overflow-x-auto bg-white shadow-purple-400 shadow-2xl">
            <table class="my-auto mx-auto w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b  bg-purple-600">
                    <th class="px-2 py-3">Company</th>
                    <th class="px-2 py-3">Company email</th>
                    <th class="px-2 py-3">Type</th>
                    <th class="px-2 py-3">Contact name</th>
                    <th class="px-2 py-3">Contact email</th>
                    <th class="px-2 py-3">Delete</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
                @foreach($clients as $client)
                    <tr class="text-gray-700 hover:bg-purple-200">
                        <td class="px-2 py-3">
                            <div>
                                <a href="{{ route('clients.edit', ['client' => $client]) }}" class="hover:underline">
                                    {{ $client->company_name }}
                                </a>
                            </div>
                        </td>
                        <td class="px-2 py-3">
                            <div>
                                {{ $client->company_email }}
                            </div>
                        </td>
                        <td class="px-2 py-3">
                            <div>
                                {{ $client->type_of_client }}
                            </div>
                        </td>
                        <td class="px-2 py-3">
                            <div>
                                <a href="{{ route('clients.edit', ['client' => $client]) }}" class="hover:underline">
                                    {{ $client->contact_name }}
                                </a>
                            </div>
                        </td>
                        <td class="px-2 py-3">
                            <div>
                                {{ $client->contact_email }}
                            </div>
                        </td>

                        <td class="flex items-center justify-center space-x-4 text-sm">
                            <form action="{{ route('clients.destroy', ['client' => $client]) }}" method="POST"
                                  id="deleteForm-{{ $client->id }}"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    class="show-submit flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete" data-id="{{ $client->id }}">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mx-5 my-5 float-right">{{ $clients->links() }}</div>
        </div>
        <div class="mt-20">

        </div>
    </div>
    </div>
</x-app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.show-submit').click(function (e) {
        let id = this.dataset.id;
        e.preventDefault();
        swal({
            title: "Are you sure you want to delete the client?",
            icon: "warning",
            buttons: ["No", "Yes"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $('#deleteForm-' + id).submit();
            }
        });
    })
</script>
