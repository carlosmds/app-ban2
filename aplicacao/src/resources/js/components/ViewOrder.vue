<template>
    <div>
        <div class="col-md-3 mx-auto">
            <h1>View Order</h1>
            <form @submit.prevent="update">
                <div class="form-group">
                    <label>Customer</label>
                    <select v-model="customer_id" class="form-control" >
                        <option v-for="customer in this.customers" :value="customer.id">
                            {{ customer.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input required type="text" class="form-control" v-model="description">
                </div>
                <div class="form-checkbox-group">
                    <label>Closed</label>
                    <input type="checkbox" class="form-checkbox" v-model="closed">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <br>
        <br>
        <div class="col-md-6 mx-auto">
            <h2>Order Items</h2>
            <b-button-group>
                <b-dropdown variant="success" right text="Create Item">                    
                    <b-dropdown-item><router-link :to="{name: 'add-purchase', params: { order_id: this.$route.params.id }}">Purchase</router-link></b-dropdown-item>
                    <b-dropdown-item><router-link :to="{name: 'add-rental', params: { order_id: this.$route.params.id }}">Rental</router-link></b-dropdown-item>
                </b-dropdown>
            </b-button-group>
            <br>
            <br>
            <table class="table" :key="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Game Description</th>
                        <th>Purchase Id</th>
                        <th>Rental Id</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order_item in this.order_items" :key="order_item.id">
                        <td>{{ order_item.id }}</td>
                        <td>{{ order_item.game.name }}</td>
                        <td>
                            <router-link v-if="order_item.purchase_id" :to="{name: 'view-purchase', params: { purchase_id: order_item.purchase_id }}">Purchase #{{ order_item.purchase_id }}</router-link>
                        </td>
                        <td>
                            <router-link v-if="order_item.rental_id" :to="{name: 'view-rental', params: { rental_id: order_item.rental_id }}">Rental #{{ order_item.rental_id }}</router-link>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-danger" @click="deleteOrderItem(order_item.id)">Delete</button>
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
            deleteOrderItem(id) {
                this.axios
                   .delete(`http://localhost/api/order-items/${id}`)
                    .then(response => {
                        alert("order item deleted!")
                        this.$router.push('/orders')
                    });
            },
            update() { 
                this.axios
                   .patch(`http://localhost/api/orders/${this.$route.params.id}`, {
                        data: {
                            customer_id: this.customer_id,
                            description: this.description,
                            closed: this.closed,
                        }
                    })
                    .then(response => {
                        alert("order updated!")
                        this.$router.push('/orders')
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
                customers: [],
                order_items: [],
                customer_id: null,
                description: null,
                closed: null,
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/orders/${this.$route.params.id}`)
                .then(response => {
                    
                    this.customer_id = response.data.customer_id
                    this.description = response.data.description
                    this.closed = response.data.closed
                    this.order_items = response.data.items

                    this.searchCustomers()
                });
        },
    }
</script>