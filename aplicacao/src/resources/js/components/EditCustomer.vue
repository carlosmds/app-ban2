<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Edit Customer</h1>
            <form @submit.prevent="edit">
                <div class="form-group">
                    <label>Name</label>
                    <input required type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input required type="date" class="form-control" v-model="date_of_birth">
                </div>
                <div class="form-group">
                    <label>Document</label>
                    <input required type="number" class="form-control" v-model="document">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            edit() { 
                this.axios
                   .patch(`http://localhost/api/customers/${this.$route.params.id}`, {
                        data: {
                            name: this.name,
                            date_of_birth: this.date_of_birth,
                            document: this.document,
                        }
                    })
                    .then(response => {
                        alert("customer updated!")
                        this.$router.push('/customers')
                    });
            },
        },
        data() {
            return {
                name: null,
                date_of_birth: null,
                document: null,
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/customers/${this.$route.params.id}`)
                .then(response => {
                    this.name = response.data.name
                    this.date_of_birth = response.data.date_of_birth
                    this.document = response.data.document
                });
        },
    }
</script>