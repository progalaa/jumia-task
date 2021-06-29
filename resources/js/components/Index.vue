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
                                <select @change="getClients" v-model="country" class="form-control">
                                    <option disabled value="" selected="selected">Select country</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Uganda">Uganda</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select @change="getClients" v-model="phoneState" class="form-control">
                                    <option disabled value="">Filter by phone state</option>
                                    <option value="true">Valid</option>
                                    <option value="false">Not Valid</option>
                                </select>
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
                            <tbody v-if="!isLoading">
                            <tr v-for="client in clients">
                                <td>{{ client.name }}</td>
                                <td>{{ client.country_name }}</td>
                                <td>{{ client.phone_state ? ("OK") : ("NOK") }}</td>
                                <td>+{{ client.country_code }}</td>
                                <td>{{ client.phone_number }}</td>
                            </tr>
                            </tbody>
                            <div v-else>Loading...</div>
                        </table>
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
            clients: {},
            filters: {},
            phoneState: null,
            country: null,
            'isLoading': true,
        };
    },

    methods: {
        async getClients(page) {
            try {
                if (this.phoneState) {
                    this.filters.PhoneState = this.phoneState
                }
                if (this.country) {
                    this.filters.Country = this.country
                }
                this.clients = (await axios.get(
                    '/api/clients', {params: this.filters})).data.data;
                this.isLoading = false;
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

<style scoped>
.pagination{
    margin-bottom: 0;
}
</style>
