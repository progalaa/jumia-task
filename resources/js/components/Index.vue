<template>
    <div class="container">
        <br><br><br><br>
        <h1>Phone Numbers</h1>
        <div class="row">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <select v-model="country" class="custom-select">
                                    <option disabled value="">Select country</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Uganda">Uganda</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select v-model="phoneState" class="custom-select">
                                    <option disabled value="">Filter by phone state</option>
                                    <option value="true">Valid</option>
                                    <option value="false">Not Valid</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <button type="button" style="float:right"
                                        class="btn btn-outline-dark">Reset
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Country</th>
                                <th scope="col">State</th>
                                <th scope="col">Country code</th>
                                <th scope="col">Phone num</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="customer in customers">
                                <td>{{ customer.name }}</td>
                                <td>{{ customer.country }}</td>
                                <td>{{ customer.phone_state ? ("OK") : ("NOK") }}</td>
                                <td>{{ customer.country_code_with_plus }}</td>
                                <td>{{ customer.phone_number }}</td>

                            </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            'isLoading': true,
        };
    },
}
</script>
