<x-app-layout title="Forms">
    <div class="container grid px-6 mx-auto">
        <form action="{{ route('clients.update', ['client' => $client]) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Client Details
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 ">
                        <input type="radio"
                               class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple "
                               name="type_of_client" value="{{ \App\Enums\ClientType::PERSON->value }}" id="radio"
                               @checked(
                                    $client->type_of_client == \App\Enums\ClientType::PERSON->value ||
                                    old('type_of_client') == \App\Enums\ClientType::PERSON->value)
                                    onchange="addInput()"
                        />
                        <span class="ml-2">{{ \App\Enums\ClientType::PERSON->value }}</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 ">
                        <input type="radio"
                               class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple "
                               name="type_of_client" value="{{ \App\Enums\ClientType::COMPANY->value }}" id="radio"
                               @checked(
                                    $client->type_of_client == \App\Enums\ClientType::COMPANY->value ||
                                    old('type_of_client') == \App\Enums\ClientType::COMPANY->value)
                                    onchange="addInput()"
                        />
                        <span class="ml-2">{{ \App\Enums\ClientType::COMPANY->value }}</span>
                    </label>
                </div>

                @error('type_of_client')
                    <span class="text-xs text-red-600 ">
                        {{ $message }}
                    </span>
                @enderror

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 ">Company Name</span>
                    <input
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                        placeholder="Enter the company name" name="company_name"
                        value="{{ old('company_name') ?? $client->company_name }}"
                    />
                    @error('company_name')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 ">Company Email</span>
                    <!-- focus-within sets the color for the icon when input is focused -->
                    <div class="relative text-gray-500 focus-within:text-purple-600 ">
                        <input
                            class="block w-full pl-10 mt-1 text-sm text-black    focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  form-input"
                            placeholder="Enter the company email address" name="company_email"
                            value="{{ old('company_email') ?? $client->company_email }}"
                        />
                        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @error('company_email')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm" id="type_of_client">
                    @if($errors->any() && old('type_of_client') == \App\Enums\ClientType::PERSON->value)
                        <span class="text-gray-700 " id="type_of_client_span">Date of birth</span>
                        <input id="type_of_client_input" type="date"
                               class="block w-full mt-1 text-sm   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                               name="date_of_birth" value="{{ old('date_of_birth') }}"
                        />
                    @elseif($errors->any() && old('type_of_client') == \App\Enums\ClientType::COMPANY->value)
                        <span class="text-gray-700 " id="type_of_client_span">Company registration number</span>
                        <input id="type_of_client_input"
                               class="block w-full mt-1 text-sm   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                               placeholder="Enter the company registration number" name="registration_number"
                               value="{{ old('registration_number') }}"
                        />
                    @elseif($client->date_of_birth || $client->type_of_client == \App\Enums\ClientType::PERSON->value)
                        <span class="text-gray-700 " id="type_of_client_span">Date of birth</span>
                        <input id="type_of_client_input" type="date"
                               class="block w-full mt-1 text-sm   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                               name="date_of_birth"
                               value="{{ $client->date_of_birth ? $client->date_of_birth->format('Y-m-d') : '' }}"
                        />
                    @elseif($client->registration_number || $client->type_of_client == \App\Enums\ClientType::COMPANY->value)
                        <span class="text-gray-700 " id="type_of_client_span">Company registration number</span>
                        <input id="type_of_client_input"
                               class="block w-full mt-1 text-sm   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                               placeholder="Enter the company registration number" name="registration_number"
                               value="{{ $client->registration_number }}"
                        />
                    @endif
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 ">Contact name</span>
                    <input
                        class="block w-full mt-1 text-sm   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple   form-input"
                        placeholder="Enter the name of the contact" name="contact_name"
                        value="{{ old('contact_name') ?? $client->contact_name}}"/>
                    @error('contact_name')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 ">Contact email</span>
                    <!-- focus-within sets the color for the icon when input is focused -->
                    <div class="relative text-gray-500 focus-within:text-purple-600 ">
                        <input
                            class="block w-full pl-10 mt-1 text-sm text-black    focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  form-input"
                            placeholder="Enter the contact email address" name="contact_email"
                            value="{{ old('contact_email') ?? $client->contact_email }}"
                        />
                        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @error('contact_email')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <div>
                    <label class="block mt-4 text-sm">
                        <button
                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Save
                        </button>
                    </label>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
<script src="{{ asset('js/client_func.js') }}"></script>
