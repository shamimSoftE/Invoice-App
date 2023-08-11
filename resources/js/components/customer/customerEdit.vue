<template>
    <!--==================== NEW Customer ====================-->
   <div class="container">
       <div class="invoices">
           <form @submit.prevent="customerForm">

               <div class="card__header">
                   <div>
                       <h2 class="invoice__title">Edit Customer</h2>
                   </div>
                   <div>
                       <router-link to="/customer"
                       class="btn btn-secondary"
                        style="float: right; textDecoration: none;">
                           Back To Customer
                       </router-link>
                   </div>
               </div>

               <div class="card__content">
                   <div style="padding: 15px;">
                       <ul style="background-color: rgb(233, 74, 74);color: black;" v-if="Object.keys(this.errorList).length > 0">
                           <li style="margin: 5px;" v-for="(error, index) in this.errorList" :key="index">
                               {{ error[0] }}
                           </li>
                       </ul>
                   </div>
                   <div class="card__content--header">


                       <div>
                           <p class="my-1">First Name</p>
                            <input placeholder="First Name" v-model="formData.firstname" type="text" class="input" >
                           <p class="my-1"> Date Of Birth</p>
                           <input v-model="formData.date" type="date" class="input" >
                       </div>
                       <input type="hidden" v-model="formData.id">

                       <div>
                            <p class="my-1">Last Name</p>
                            <input v-model="formData.lastname" type="text" placeholder="Last Name" class="input" >

                            <p class="my-1">Address</p>
                            <textarea v-model="formData.address" cols="40" rows="2"></textarea>
                       </div>

                        <div>
                            <p class="my-1">E-Mail</p>
                            <input v-model="formData.email" type="email" placeholder="E-mail" class="input" >
                       </div>
                   </div>
                   <br><br>
                </div>


               <div class="card__header">
                   <div>

                   </div>
                   <div>
                       <button type="submit" class="btn btn-secondary">
                           Update
                       </button>
                   </div>
               </div>
           </form>

       </div>

   </div>

</template>
<script>
    import axios from 'axios';
    export default{
    data: () => ({
        errorList: '',
        formData: {
            id: "",
            date: "",
            firstname: "",
            lastname: "",
            email: "",
            address: ""
        }
    }),

    mounted(){
        // console.log(this.$route.params.id);
        this.customerDataGet(this.$route.params.id);
    },

   methods: {
    // fetch customer data from the database
    customerDataGet(customerId){
        axios.get(`/api/customer/edit/${customerId}`)
        .then(res => {
            // console.log(res.data);
            this.formData = res.data.customer
        })
        .catch(function (error) {
                if (error.response) {
                    if (error.response.status == 404) {
                        alert(error.response.data.message);
                    }
                }
            });
    },

    customerForm(){
        let mythis = this;

           // here include API
           axios.post(`/api/customer/update`,this.formData)
           .then(res => {
                alert(res.data.message);
           })
           .catch(function (error) {
                if (error.response) {
                    // validation error
                    if (error.response.status == 422) {
                        mythis.errorList = error.response.data.errors;
                    }

                    // 404 error
                    if (error.response.status == 404) {
                        alert(error.response.data.message);
                    }

                }

            });

       }
   },

 };
</script>
