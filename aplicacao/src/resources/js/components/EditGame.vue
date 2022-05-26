<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Edit Game</h1>
            <form @submit.prevent="edit">
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
                   .patch(`http://localhost/api/games/${this.$route.params.id}`, {
                        data: {
                            name: this.name,
                            value: this.value,
                            day_rental_value: this.day_rental_value,
                        }
                    })
                    .then(response => {
                        alert("Game updated!")
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
                .get(`http://localhost/api/games/${this.$route.params.id}`)
                .then(response => {
                    this.name = response.data.name
                    this.value = response.data.value
                    this.day_rental_value = response.data.day_rental_value
                });
        },
    }
</script>