<template>
    <div class="container">
        <table class="table table-dark">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Name</th>
                <th>Order Status</th>
                <th>Created At</th>
                <th>Update Order status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{order.id}}</th>
                <td>{{order.order_name}}</td>
                <td v-if="!order.order_shipped">Pending</td>
                <td v-if="order.order_shipped">Shipped</td>
                <td>{{order.created_at}}</td>
                <td><button type="button" class="btn btn-light" @click="updateStatus(order.id)">Update</button></td>
            </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    created(){
        this.fetchOrder()
    },

    data(){
        return {
            order:''
        }
    },

    methods:{
        fetchOrder(){
            axios.get('/api/fetchOrder')
            .then( response => {
                this.order = response.data
                
                window.Echo.private(`order.${this.order.id}`)
                .listen('OrderShipped', (e) => {
                    console.log(e);
                });
            })
            .catch( err => {
                console.log(err)
            })
        },
        updateStatus(id){
            axios({
                url:'/api/updateOrderStatus/'+id,
                method: 'PATCH'
            })
            .then(response => {
                // console.log(response.data)
                this.order.order_shipped = response.data.order_shipped
            })
            .catch( err => {
                console.log(err)
            })
        }
    }
}
</script>
