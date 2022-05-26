<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Create Order</h1>
            <form @submit.prevent="create">
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
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            create() { 
                this.axios
                   .post(`http://localhost/api/orders`, {
                        data: {
                            customer_id: this.customer_id,
                            description: this.description,
                            closed: false
                        }
                    })
                    .then(response => {
                        alert("order created!")
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
                customer_id: null,
                description: null,
            }
        },
        created() {
            this.searchCustomers()
        },
    }
</script>