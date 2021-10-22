<template>
    <div>
            <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="col p-0">
            <div v-if="showMessage">
                <div class="alert alert-success">{{ message }}</div>
            </div>
        </div>
        <div class="card mx-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <form class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                    <input v-model.lazy="search" type="search" id="inline-search" name="search" class="form-control mb-2 mr-sm-2" placeholder="Search">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Search</button>
                                </div>
                                </div>
                          </form>
                          <div class="col-4">
                                <select
                                v-model="selectedDepartment"
                                name="city"
                                class="form-control"
                                aria-label="Default select example"
                            >
                                <option
                                    v-for="department in departments"
                                    :key="department.id"
                                    :value="department.id"
                                    >{{ department.name }}</option
                                >
                            </select>
                          </div>
                        </div>
                    </div>
                     
                    <div>
                        <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Create</router-link>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td># ID</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Address</td>
                            <td>Department</td>
                            <td>Manage</td>
                        </tr>
                    </thead>
                    <tbody>
                            <tr v-for="employee in employees" :key="employee.id">
                                <th scope="row">#{{ employee.id }}</th>
                                <td>{{ employee.first_name }}</td>
                                 <td>{{ employee.last_name }}</td>
                                 <td>{{ employee.address }}</td>
                                  <td>{{ employee.department.name }}</td>
                                <td>
                                    <router-link :to="{name: 'EmployeesEdit', params:{id: employee.id}}" class="btn btn-success"><i class="far fa-edit"></i> Edit</router-link>
                                    <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</template>

<script>
export default{
    data(){
        return {
            employees: [],
            showMessage: false,
            message: '',
            search: null,
            selectedDepartment: null,
            departments: []
        }
    },
    watch: {
        search(){
            this.getEmployees();
        },
        selectedDepartment(){
            this.getEmployees();
        }
    },
    created(){
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees(){
            axios.get('/api/employees', {
                params: {
                    search: this.search,
                    department_id: this.selectedDepartment
                }
            })
            .then(res => {
                this.employees = res.data.data
            }).catch(error => {
                console.log(error)
            });
        },
        getDepartments(){
             axios.get('/api/employees/departments')
            .then(res => {
                this.departments = res.data
            }).catch(error => {
                console.log(console.error())
            })
        },
        deleteEmployee(id)
        {   
            axios.delete('api/employees/'+id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getEmployees();
            })
        }
    }
}
</script>

<style>

</style>