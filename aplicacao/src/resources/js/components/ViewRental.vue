<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>View rental</h1>
            <form @submit.prevent="update">
                <div class="form-group">
                    <label>Days Of Rent</label>
                    <input required type="number" class="form-control" v-model="days_of_rent">
                </div>
                <div class="form-group">
                    <label>Returned at</label>
                    <input type="date" class="form-control" v-model="returned_at">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            update() { 
                this.axios
                   .patch(`http://localhost/api/rentals/${this.$route.params.rental_id}`, {
                        data: {
                            days_of_rent: this.days_of_rent,
                            returned_at: this.returned_at,
                        }
                    })
                    .then(response => {
                        this.$router.push('/orders')
                    });
            },
        },
        data() {
            return {
                days_of_rent: null,
                returned_at: null,
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/rentals/${this.$route.params.rental_id}`)
                .then(response => {
                    this.days_of_rent = response.data.days_of_rent
                    this.returned_at = response.data.returned_at
                });
        },
    }
</script>