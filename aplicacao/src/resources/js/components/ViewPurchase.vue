<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>View purchase</h1>
            <form @submit.prevent="create">
                <div class="form-group">
                    <label>Discount %</label>
                    <input required type="number" class="form-control" v-model="discount">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            create() { 
                this.axios
                   .patch(`http://localhost/api/purchases/${this.$route.params.purchase_id}`, {
                        data: {
                            discount: this.discount,
                        }
                    })
                    .then(response => {
                        this.$router.push('/orders')
                    });
            },
        },
        data() {
            return {
                discount: null,
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/purchases/${this.$route.params.purchase_id}`)
                .then(response => {
                    this.discount = response.data.discount 
                });
        },
    }
</script>