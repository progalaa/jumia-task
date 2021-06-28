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
                                <button type="button"  @click="clearFilters()" style="float:right"
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
                            <tr v-for="client in clients">
                                <td>{{ client.name }}</td>
                                <td>{{ client.country }}</td>
                                <td>{{ client.phone_state ? ("OK") : ("NOK") }}</td>
                                <td>{{ client.country_code_with_plus }}</td>
                                <td>{{ client.phone_number }}</td>

                            </tr>
                            </tbody>
                        </table>
                        <pagination :data="clients" @pagination-change-page="getClients"></pagination>
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
            clients: [],
            filters: {},
            phoneState: "",
            country: "",
            'isLoading': true,
        };
    },

    methods: {
        clearFilters() {
            this.phoneState = "";
            this.country = "";
            this.filters = {};
            this.getCustomersByFilter()
        },
        async getClients() {
            try {
                this.clients = (await axios.get(
                '/api/clients')).data.data;
            } catch (err) {
                this.clients = null;
            }
        },
    },
    created() {
    this.getClients()
  }
}
</script>
