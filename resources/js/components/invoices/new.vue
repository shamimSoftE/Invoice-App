<template>
     <!--==================== NEW INVOICE ====================-->
    <div class="container">
        <div class="invoices">
            <form @submit.prevent="loginForm">

                <div class="card__header">
                    <div>
                        <h2 class="invoice__title">New Invoice</h2>
                    </div>
                    <div>
                        <router-link to="/" class="btn btn-secondary" style="
                                            float: right;
                                            textDecoration: none;
                                            color: gray;
                                            ">
                            Back To Invoices
                        </router-link>
                    </div>
                </div>

                <div class="card__content">
                    <div class="card__content--header">
                        <div>
                            <p class="my-1">Customer</p>
                            <select name="" id="" class="input">
                                <option value="">cust 1</option>
                            </select>
                        </div>
                        <div>
                            <p class="my-1">Date</p>
                            <input id="date" placeholder="dd-mm-yyyy" v-model="formData.date" type="date" class="input"> <!---->
                            <p class="my-1">Due Date</p>
                            <input id="due_date" v-model="formData.due_date" type="date" class="input">
                        </div>
                        <div>
                            <p class="my-1">Numero</p>
                            <input type="text" class="input"  v-model="formData.numero">
                            <p class="my-1">Reference(Optional)</p>
                            <input type="text" class="input"  v-model="formData.reference">
                        </div>
                    </div>
                    <br><br>
                    <div class="table">

                        <div class="table--heading2">
                            <p>Item Description</p>
                            <p>Unit Price</p>
                            <p>Qty</p>
                            <p>Total</p>
                            <p></p>
                        </div>

                        <!-- item 1 -->
                        <div class="table--items2">
                            <p>#093654 vjxhchkvhxc vkxckvjkxc jkvjxckvjkx </p>
                            <p>
                                <input type="text" class="input" >
                            </p>
                            <p>
                                <input type="text" class="input" >
                            </p>
                            <p>
                                $ 10000
                            </p>
                            <p style="color: red; font-size: 24px;cursor: pointer;">
                                &times;
                            </p>
                        </div>
                        <div style="padding: 10px 30px !important;">
                            <button class="btn btn-sm btn__open--modal">Add New Line</button>
                        </div>
                    </div>

                    <div class="table__footer">
                        <div class="document-footer" >
                            <p>Terms and Conditions</p>
                            <textarea cols="50" rows="7" class="textarea" ></textarea>
                        </div>
                        <div>
                            <div class="table__footer--subtotal">
                                <p>Sub Total</p>
                                <span>$ 1000</span>
                            </div>
                            <div class="table__footer--discount">
                                <p>Discount</p>
                                <input type="text" class="input">
                            </div>
                            <div class="table__footer--total">
                                <p>Grand Total</p>
                                <span>$ 1200</span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card__header" style="margin-top: 40px;">
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
        <!--==================== add modal items ====================-->
        <div class="modal main__modal ">
            <div class="modal__content">
                <span class="modal__close btn__close--modal">×</span>
                <h3 class="modal__title">Add Item</h3>
                <hr><br>
                <div class="modal__items">
                    <select class="input my-1">
                        <option value="None">None</option>
                        <option value="None">LBC Padala</option>
                    </select>
                </div>
                <br><hr>
                <div class="model__footer">
                    <button class="btn btn-light mr-2 btn__close--modal">
                        Cancel
                    </button>
                    <button class="btn btn-light btn__close--modal ">Save</button>
                </div>
            </div>
        </div>

        <br><br><br>
    </div>

</template>
<script>
import axios from 'axios';
  export default{
    data: () => ({
        formData: {
            date: "",
            due_date: "",
            numero: "",
            reference: ""
        }
    }),
    methods: {
        loginForm(){

            // if (!this.formData.email) {
            //     this.$eventBus.emit('toast', {
            //         type: 'Error',
            //         message: 'Email field is required'
            //     });
            //     this.$refs.email.focus();
            //     return;
            // }

            // if (!this.formData.password) {
            //     this.$eventBus.emit('toast', {
            //         type: 'Error',
            //         message: 'Password field is required'
            //     });
            //     this.$refs.password.focus();
            //     return;
            // }

            // if (this.formData.password.length < 6) {
            //     this.$eventBus.emit('toast', {
            //         type: 'Error',
            //         message: 'Password must be 6 characters or long',
            //     });
            //     this.$refs.password.focus();
            //     return;
            // }

            console.log(this.formData);

            // here include API
        }
    },

  };
</script>
