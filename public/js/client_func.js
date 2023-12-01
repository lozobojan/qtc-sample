
function addInput() {
    if(document.getElementById('type_of_client_span')) {
        document.getElementById('type_of_client_span').remove();
        document.getElementById('type_of_client_input').remove();
    }
    if(String(document.querySelector('#radio:checked').value) === "Person") {
        document.getElementById('type_of_client').innerHTML=
            `<span class="text-gray-700 dark:text-gray-400" id="type_of_client_span">Date of birth</span>
                <input id="type_of_client_input" type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="date_of_birth" />`
    }
    else if(String(document.querySelector('#radio:checked').value) === "Company") {
        document.getElementById('type_of_client').innerHTML=
            `<span class="text-gray-700 dark:text-gray-400" id="type_of_client_span">Company registration number</span>
                <input id="type_of_client_input" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter the company registration number" name="registration_number" />`
    }
}
