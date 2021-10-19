<template>
    <div>
            <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="col p-0">
            <div>
                <div class="alert alert-success">
                </div>
            </div>
        </div>
        <div class="card mx-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form>
                            <div class="col">
                                <input type="search" id="inline-search" name="search" class="form-control mb-2 mr-sm-2" placeholder="Search Country">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Search</button>
                            </div>
                          </form>
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
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <router-link :to="{name: 'EmployeesEdit'}" class="btn btn-success"><i class="far fa-edit"></i> Edit</router-link>
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

}
</script>

<style>

</style>