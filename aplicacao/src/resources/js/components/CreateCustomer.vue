<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Create Customer</h1>
            <form @submit.prevent="create">
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
                   .post('http://localhost/api/customers', {
                        data: {
                            name: this.name,
                            date_of_birth: this.date_of_birth,
                            document: this.document,
                        }
                    })
                    .then(response => {
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
                .get('http://localhost/api/customers/create')
                .then(response => {
                    // 
                });
        },
    }
</script>