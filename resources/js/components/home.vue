<template>
  <div class="container">
      <form class="col s12"  id="app" novalidate="true"> 
                <p v-if="errors.length">
                  <b>Please correct the following error(s):</b>
                  <ul>
                    <li v-for="error in errors" v-bind:key="error.id">{{ error }}</li>
                  </ul>
                </p>
                  <div class="row">
                              <div class="input-field col s6">
                                <input  id="first_name" type="text" class="validate">
                                <label for="first_name">First Name</label>
                              </div>
                              <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name">Last Name</label>
                              </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s5">
                      <input id="email" type="email" class="validate">
                      <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>
                     <div class="input-field col s7">
                      <input value="" id="disabled" type="text" class="validate">
                      <label for="phone">Phone Number</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s6">
                      <label for="datepicker">Birthday</label>
                      <input type="text" id="bdate" class="datepicker">
                    </div>
                  </div>
                  <div class="row">
                      <div class="col s12">
                          <input class="with-gap" name="gender" type="radio" id="male" checked />
                          <label for="male">Male</label>
                          <input class="with-gap" name="gender" type="radio" id="female" checked />
                          <label for="female">Female</label>
                      </div>
                  </div>
                  <div class="row">
                        <div class="col s6">
                            <label>State of origin</label>
                            <select  class="browser-default" v-for="state in states" v-bind:key="state.id" v-model="state.state">
                                <option value="" disabled selected>Choose your State</option>
                                <option v-html="state.state"></option>
                            </select>
                       </div>
                        <div class="col s6">
                    <label>University</label>
                    <select class="browser-default" v-for="dept in depts" v-bind:key="dept.id" v-model="dept.dept">
                      <option value="" disabled selected>Choose your Department</option>
                      <option v-html="dept.dept"></option>
                    </select>
                  </div>
                  </div>
                  <div class="row">
                      <div class="col s12">
                            <label>Polytechnic</label>
                            <select class="browser-default"  v-for="poly in polys" v-bind:key="poly.id" v-model="poly.poly">
                            <option value="" disabled selected>Choose your Polytechnic</option>
                            <option v-html="poly.poly"></option>
                            </select>
                        </div>
                         <div class="col s12">
                            <label>University</label>
                            <select class="browser-default">
                            <option value="" disabled selected>Choose your University</option>
                            <option value="1" v-for="uni in unis" v-bind:key="uni.id">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            </select>
                         </div>
                  </div>
                  <button type="submit" class="btn blue"><i class="material-icons ">add</i>Save</button>
             </form>
  </div>
</template>

<script>

  export default {
    data() {
        return{
          states: [],
          polys: [],
          depts: [],
          unis: [],
          firstname: null,
            lastname: null,
            phone: null,
            dateReg: null,
            gender: null,
            //password: null,
            img: null,
            totalCoinsAccrued: null,
            totalCurrentCoin: null,
            email: null,
            state: null,
            polytechnic: null,
            university: null,
            department: null,
            regNum: null

        }
    },
    created() {
        // console.log('mounted');
    },
    methods: {
      getPoly(){
          this.axios
        .get("api/poly")
        // .then(res => res.json())
        .then((res) => {
          this.polys = res.data;
          // console.log(res.data);
        });
      },
       getUni(){
          this.axios
        .get("api/uni")
        // .then(res => res.json())
        .then((res) => {
          this.unis = res.data;
          // console.log(res.data);
        });
      },
       getState(){
          this.axios
        .get("api/state")
        // .then(res => res.json())
        .then((res) => {
          this.states = res.data;
          // console.log(res.data);
        });
      },
       getDept(){
          this.axios
        .get("api/dept")
        // .then(res => res.json())
        .then((res) => {
          this.depts = res.data;
          // console.log(res.data);
        });
      },
      register(){
        this.errors = [];
        if (!this.name) {
        this.errors.push("Name required.");
      }
      if (!this.email) {
        this.errors.push('Email required.');
      } else if (!this.validEmail(this.email)) {
        this.errors.push('Valid email required.');
      }

      if (!this.errors.length) {
        return true;
      }
      }
    }
      
 }
</script>

<style>

</style>