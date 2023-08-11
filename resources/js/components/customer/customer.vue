<script setup>
    import axios from "axios";
    import { onMounted, ref } from "vue";
    import { useRouter } from "vue-router";

    const router = useRouter()


    let customers = ref([])
    let searchCustomer = ref([])


    onMounted(async() => {
        getCustomer()
    })



    // get all customer
    const getCustomer = async() => {
        let response = await axios.get("/api/get_all_customer")
        // console.log('response', response.data)
        customers.value = response.data.customers
    }

    function deleteCustomer(id) {
        if (confirm('Are you sure, want to delete it?')) {
            let response = axios.get(`/api/customer/delete/${id}`)
            .then(res => {
               alert(res.data.message);
              this.getCustomer();
            });
        }
    }

    // get all customer
    const search = async() => {
        let response = await axios.get("/api/search_customer?c="+searchCustomer.value)
        customers.value = response.data.customers
    }

</script>

<template>
    <div class="container">
        <div class="invoices">

            <div class="card__header">
                <div>
                    <h2 class="invoice__title">Customer Crud</h2>
                </div>
                <div>
                    <router-link to="/" class="btn btn-secondary" style="float: right; textDecoration: none; color: black;">
                        Back To Invoices
                    </router-link>
                    <router-link to="/customer/create" class="btn btn-secondary" style="float: right;margin-left: 15px; textDecoration: none; color: black;">
                        Create Customer
                    </router-link>
                </div>
            </div>

            <div class="table card__content">

                <div class="table--search">
                    <div class="relative">
                        <i class="table--search--input--icon fas fa-search "></i>
                        <input class="table--search--input" v-model="searchCustomer" @keyup="search()" type="text" placeholder="Search Customer">
                    </div>
                </div>

                <div class="table--heading">
                    <p>ID</p>
                    <p>Name</p>
                    <p>Customer E-Mail</p>
                    <p>Date Of Birth</p>
                    <!-- <p>Address</p> -->
                    <p>Action</p>
                </div>

                <!-- customer -->
                <div class="table--items" v-for="cust in customers" :key="cust.id" v-if="customers.length > 0">
                    <p href="javascript:void(0)">#{{ cust.id }}</p>
                    <p>{{ cust.firstname }}</p>
                    <p>{{ cust.email }}</p>

                    <p style="margin-left: 30px;" v-if="cust.date">{{ cust.date }}</p>
                    <p style="margin-left: 30px;" v-else>N/A</p>
                    <!-- <p>{{ cust.address }}</p> -->
                    <p>
                        <router-link :to="{path: '/customer/'+cust.id+'/edit'}" class="btn btn-secondary" style=" textDecoration: none; color: black;">
                            Edit
                        </router-link>
                        <span style="margin:10px;"></span>
                        <button type="button" class="btn btn-danger" @click="deleteCustomer(cust.id)" style="textDecoration: none; color: ghostwhite;background-color: brown;">
                            Delete
                        </button>
                    </p>

                </div>

                <div class="table--items" v-else>
                    <span>Customer Not Found</span>
                </div>


            </div>

        </div>
    </div>
</template>

