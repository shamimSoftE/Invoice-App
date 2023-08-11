<template>
    <!--==================== NEW Customer ====================-->
   <div class="container">
       <div class="invoices">
           <form @submit.prevent="customerForm">

               <div class="card__header">
                   <div>
                       <h2 class="invoice__title">Create Customer</h2>
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
                           Save
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
            date: "",
            firstname: "",
            lastname: "",
            email: "",
            address: ""
        }
    }),
   methods: {
    customerForm(){
        let mythis = this;
            // console.log(this.formData);
           // here include API
           axios.post('/api/customer_store', this.formData)
           .then(res => {
                console.log(res)
                alert(res.data.success);

                this.formData = {
                     date: "",
                     firstname: "",
                     lastname: "",
                     email: "",
                     address: ""
                }
                mythis.errorList = '';
           })
           .catch(function (error) {
                if (error.response) {
                    if (error.response.status == 422) {
                        mythis.errorList = error.response.data.errors;
                    }

                } else if (error.request) {
                    // The request was made but no response was received
                    // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                    // http.ClientRequest in node.js
                    console.log(error.request);
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                }
                console.log(error.config);
            });

       }
   },

 };
</script>
