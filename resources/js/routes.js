import EmployeesCreate from "./components/employees/Create";
import EmployeesEdit from "./components/employees/Edit";
import EmployeesIndex from "./components/employees/Index";

export const routes = [
    {
        path: "/employees",
        name: "EmployeesIndex",
        component: EmployeesIndex
    },
    {
        path: "/employees/create",
        name: "EmployeesCreate",
        component: EmployeesCreate
    },
    {
        path: "/employees/:id",
        name: "EmployeesEdit",
        component: EmployeesEdit
    }
];
