<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Orders</h1>
            <form @submit.prevent="search">
                <div class="form-group">
                    <label>Customer</label>
                    <select v-model="customer_id" class="form-control" >
                        <option v-for="customer in this.customers" :value="customer.id">
                            {{ customer.name }}
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <router-link :to="{name: 'create-Order'}" class="btn btn-success">Create</router-link>
            </form>
        </div>
        <br>
        <div class="col-md-6 mx-auto">
            <table class="table" :key="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer Name</th>
                    <th>Description</th>
                    <th>Closed</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td>{{ order.id }}</td>
                    <td>{{ order.customer.name }}</td>
                    <td>{{ order.description }}</td>
                    <td>
                        <svg v-if="order.closed === true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z"/>
                        </svg>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :disabled="closed === true" :to="{name: 'view-order', params: { id: order.id }}" class="btn btn-success">View</router-link>
                            <button :disabled="closed === true" class="btn btn-danger" @click="deleteOrder(order.id)">Delete</button>
                            <button :disabled="closed === true" class="btn btn-warning" @click="closeOrder(order.id)">Close</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            closeOrder(id) { 
                this.axios
                    .patch(`http://localhost/api/orders/${id}`, {
                        data: {
                            closed: true,
                        }
                    })
                    .then(response => {
                        alert("Order closed!")
                        this.search()
                    });
            },
            deleteOrder(id) { 
                this.axios
                    .delete(`http://localhost/api/orders/${id}`)
                    .then(response => {
                        alert("Order deleted!")
                        this.search()
                    });
            },
            search() { 
                this.axios
                   .get('http://localhost/api/orders/', {
                        params: {
                            customer_id: this.customer_id,
                        }
                    })
                    .then(response => {
                        this.orders = response.data;
                    });
            },
            searchCustomers() { 
                this.axios
                    .get('http://localhost/api/customers/').then(response => {
                        this.customers = response.data;
                    });
            },
        },
        data() {
            return {
                orders: [],
                customers: [],
                customer_id: null,
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/orders/', {
                    params: {
                        // 
                    }
                })
                .then(response => {
                    this.orders = response.data;
                    this.searchCustomers()
                });
        },
    }
</script>