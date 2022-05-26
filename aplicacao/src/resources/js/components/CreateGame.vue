<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Create Game</h1>
            <form @submit.prevent="create">
                <div class="form-group">
                    <label>Name</label>
                    <input required type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <label>Value</label>
                    <input required type="number" class="form-control" v-model="value">
                </div>
                <div class="form-group">
                    <label>Day Rental Value</label>
                    <input required type="number" class="form-control" v-model="day_rental_value">
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
                   .post('http://localhost/api/games', {
                        data: {
                            name: this.name,
                            value: this.value,
                            day_rental_value: this.day_rental_value,
                        }
                    })
                    .then(response => {
                        this.$router.push('/games')
                    });
            },
        },
        data() {
            return {
                name: null,
                value: null,
                day_rental_value: null,
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/games/create')
                .then(response => {
                    // 
                });
        },
    }
</script>