<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Customers Report</h1>
            <table class="table" :key="table">
                <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Date of birth</th>
                        <th>Orders Quantity</th>
                        <th>Purchases Quantity</th>
                        <th>Rentals Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="customer_data in this.customers_data" :key="customer_data.id">
                        <td>{{ customer_data.customer_id }}</td>
                        <td>{{ customer_data.customer_name }}</td>
                        <td>{{ customer_data.customer_date_of_birth }}</td>
                        <td>{{ customer_data.orders_quantity }}</td>
                        <td>{{ customer_data.purchases_quantity }}</td>
                        <td>{{ customer_data.rentals_quantity }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            search() { 
                // 
            },
        },
        data() {
            return {
                customers_data: null,
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/customers-report/`)
                .then(response => {
                    this.customers_data = response.data 
                });
        },
    }
</script>