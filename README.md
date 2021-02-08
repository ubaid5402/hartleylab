# HartleyLab

PHP 7
Laravel Version 5.6

Designed RESTFUL API'S for maintaing the Payroll System for an employee.

1. Add Employee
	
   API - http://localhost/payroll_system/api/employees (POST)
   POST Param : Form-data

2. Update Employee
   
   API - http://localhost/payroll_system/api/employees/2 (PUT)
   PUT Param : JSON Payload (raw)

4. Delete/Disable Employee
   
   API - http://localhost/payroll_system/api/employees/2 (DELETE)

5. Employee List
   
   API - http://localhost/payroll_system/api/employees (GET)

6. Employee Details Page
   
   API - http://localhost/payroll_system/api/employees/2 (GET)

7. Add Employee Payroll Details
	
   API - http://localhost/payroll_system/api/payroll (POST)
   POST Param : Form-data

8. Add Employee working days for given month
9. Add Employee Leaves for given month
	
   API - http://localhost/payroll_system/api/add_working_days (POST)
   POST Param : Form-data

11. Get Employee Payslip
	
	API - http://localhost/payroll_system/api/payroll/1 (GET)

12. PDF Download Employee Payslip for given month

	API - http://localhost/payroll_system/api/downloadPDF/1 (GET)

13. Email Employee Payslip for a given month

	API - http://localhost/payroll_system/api/sendEmailPDF/1 (GET)


