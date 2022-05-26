<template>
    <div>
        <div class="col-md-6 mx-auto">
            <h1>Customers</h1>
            <form @submit.prevent="search">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <label>Document</label>
                    <input type="number" class="form-control" v-model="document">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <router-link :to="{name: 'create-customer'}" class="btn btn-success">Create</router-link>
            </form>
        </div>
        <br>
        <div class="col-md-6 mx-auto">
            <table class="table" :key="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Document</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="customer in customers" :key="customer.id">
                    <td>{{ customer.id }}</td>
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.date_of_birth }}</td>
                    <td>{{ customer.document }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit-customer', params: { id: customer.id }}" class="btn btn-warning">Edit</router-link>
                            <button class="btn btn-danger" @click="deletecustomer(customer.id)">Delete</button>
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
            deletecustomer(id) { 
                this.axios
                    .delete(`http://localhost/api/customers/${id}`)
                    .then(response => {
                        alert("customer deleted!")
                        this.search()
                    });
            },
            search() { 
                this.axios
                   .get('http://localhost/api/customers/', {
                        params: {
                            name: this.name,
                            document: this.document,
                        }
                    })
                    .then(response => {
                        this.customers = response.data;
                    });
            },
        },
        data() {
            return {
                customers: [],
                name: "",
                document: "",
                date_of_birth: "",
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/customers/', {
                    params: {
                        // 
                    }
                })
                .then(response => {
                    this.customers = response.data;
                });
        },
    }
</script>