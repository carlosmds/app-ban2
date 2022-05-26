<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Orders Report</h1>
            <table class="table" :key="table">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Items Quantity</th>
                        <th>Rental Value</th>
                        <th>Purchase Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order_data in this.orders_data" :key="order_data.id">
                        <td>{{ order_data.order_id }}</td>
                        <td>{{ order_data.items_quantity }}</td>
                        <td>{{ order_data.rental_value }}</td>
                        <td>{{ order_data.purchase_value }}</td>
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
                orders_data: null,
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/orders-report/`)
                .then(response => {
                    this.orders_data = response.data 
                });
        },
    }
</script>