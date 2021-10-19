<template>
<div>
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
       <router-link :to="{name: 'EmployeesIndex'}" data-toggle="tooltip" data-placement="top" title="Back" class="mx-2" ><i class="fas fa-arrow-alt-circle-left"></i> Back</router-link>
    <h1 class="h3 mb-0 text-gray-800">Add Employee</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-12 my-4">
        <form @submit.prevent="storeEmployee">
            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">First name</label>

                <div class="col-md-6">
                    <input v-model="form.first_name" id="first_name" type="text" class="form-control" name="first_name" value="" required autocomplete="name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle name</label>

                <div class="col-md-6">
                    <input v-model="form.middle_name" id="middle_name" type="text" class="form-control" name="middle_name" value="" required autocomplete="name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>

                <div class="col-md-6">
                    <input v-model="form.last_name" id="last_name" type="text" class="form-control" name="last_name" value="" required autocomplete="name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

             <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                <div class="col-md-6">
                    <input v-model="form.address" id="address" type="text" class="form-control" name="address" value="" required autocomplete="name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

             <div class="form-group row">
                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                <div class="col-md-6">
                    <select id="country_id" name="country" class="form-control" aria-label="Select Country" v-model="form.country_id" @change="getStates()">
                        <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.country_name }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>

                <div class="col-md-6">
                    <select v-model="form.state_id" @change="getCities()" id="state" name="state" class="form-control" aria-label="Select State">
                        <option v-for="state in states" :key="state.id" :value="state.id">
                            {{ state.name }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

                <div class="col-md-6">
                    <select v-model="form.department_id" id="department" name="department" class="form-control" aria-label="Select Department">
                        <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="City" class="col-md-4 col-form-label text-md-right">City</label>

                <div class="col-md-6">
                    <select v-model="form.city_id" id="city" name="City" class="form-control" aria-label="Select City">
                        <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="zip_code" class="col-md-4 col-form-label text-md-right">Zip code</label>
                <div class="col-md-6">
                    <input v-model="form.zip_code" id="zip_code" type="text" class="form-control" name="zip_code" value="" required autocomplete="name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="birthdate" class="col-md-4 col-form-label text-md-right">Birthdate</label>
                <div class="col-md-6">
                    <datepicker v-model="form.birthdate" input-class="form-control"></datepicker>
                </div>
            </div>

            <div class="form-group row">
                <label for="date_hired" class="col-md-4 col-form-label text-md-right">Date Hired</label>
                <div class="col-md-6">
                    <datepicker v-model="form.date_hired" input-class="form-control"></datepicker>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
export default {
 components: {
    Datepicker
  },
  data(){
      return {
          countries: [],
          states: [],
          departments: [],
          cities: [],
          form: {
              first_name: '',
              last_name: '',
              middle_name: '',
              address: '',
              country_id: '',
              state_id: '',
              department_id: '',
              city_id: '',
              zip_code: '',
              birthdate: null,
              date_hired: null
          }
      }
  },
  created(){
      this.getCountries();
      this.getDepartments();
  },
  methods: {
      getCountries(){
          axios.get('/api/employees/countries')
          .then(res => {
              this.countries = res.data
          }).catch(error => {
              console.log(console.error())
          })
      },
        getStates(){
          axios.get('/api/employees/'+ this.form.country_id +'/states')
          .then(res => {
              this.states = res.data
          }).catch(error => {
              console.log(console.error())
          })
      },
       getCities(){
          axios.get('/api/employees/'+ this.form.state_id +'/cities')
          .then(res => {
              this.cities = res.data
          }).catch(error => {
              console.log(console.error())
          })
      },
       getDepartments(){
          axios.get('/api/employees/departments')
          .then(res => {
              this.departments = res.data
          }).catch(error => {
              console.log(console.error())
          })
      },
      storeEmployee(){
          axios  .post("/api/employees", {
                    first_name: this.form.first_name,
                    middle_name: this.form.middle_name,
                    last_name: this.form.last_name,
                    address: this.form.address,
                    country_id: this.form.country_id,
                    state_id: this.form.state_id,
                    city_id: this.form.city_id,
                    department_id: this.form.department_id,
                    zip_code: this.form.zip_code,
                    birthdate: this.format_date(this.form.birthdate),
                    date_hired: this.format_date(this.form.date_hired)
                })
                .then(res => {
                    this.$router.push({ name: "EmployeesIndex" });
                });
      },
      format_date(value){
          if(value){
              return moment(String(value)).format('YYYYMMDD')
          }
      }

  }
}
</script>

<style>

</style>