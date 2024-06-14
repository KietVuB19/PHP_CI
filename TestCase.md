Author: KietVuB19  
Start date: 12/06/2024

Required fields are:
1. UserName
2. Password
3. Confirm Password 
4. Email

</br>

## Test Cases for Registration Page

- Name, password, confirm password are mandatory fields
- There is a Log in button at the bottom of the form to redirect to Log in page
- A message is showed after user click on button Register


| No. | Test Cases | Description | Steps To Execute | Test Data / Input  | Epected Results  | Actual output | Note |
|-----|------------|-------------|------------------|--------------------|-------------------|--------|------|
| 1 | TC-01 | Leave the required fields blank | 1. Leave required fields blank <br/> 2. Click on the Register button | N/A | Highlight all required fields. | Not highlight all fields | Only highlight 1 field at a time |
| 2 | TC-02 | User register success by filling all the required fields with no name exits on db, password match with confirm password| 1. Enter valid values in the required fields <br/> 2. Click the Register button | name: 'admin', password: 'abc', confirm password: 'abc', email: 'abc@ee.com'| 1. Users registered successfully <br/> 2. A successful registration message show up <br/> 3. Mail sent to the user | User register success but no mail sent to user email | Func send_email error |
| 3 | TC-03  | User input name already exits | Enter valid data in required fields, but on name field enter an exits name (in this case 'acc1') <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'abc', email: 'abc@ee.com' | A message show: User name already taken | A message show: User name already taken | N/A |
| 4 | TC-04  | User input password and confirm pasword not match | Enter valid data in required fields, but different password and confirm password <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'aaaa', email: 'abc@ee.com' | A message show: Password not match | A message show: Password not match | N/A |
| 5 | TC-05  | User input name already exits, password and confirm pasword not match | Enter valid data in required fields, but name exits, different password and confirm password <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'aaaa', email: 'abc@ee.com' | Show both error message: Password not match and Name is taken| Only a message show: Name is taken | N/A |
| 6 | TC-06 | 1. User input wrong format email (without @ symbol <br> 2. With random string instead of a real email <br> 3. Without a dot in the email address | 1. Enter Invalid Emails <br/> 2. Click on the Register Button | 1. admingmail.com <br/> 2. admin@dfsd.com <br/> 3. admin@mailcom <br/> 4. @gmail | A message show for all case: Email is not valid | Only show error for case 1, 4. | N/A | 


</br>

## Test Cases for Login Page

| No. | Test Cases | Description | Steps To Execute | Test Data / Input  | Epected Results  | Actual output | Note |
|-----|------------|-------------|------------------|--------------------|-------------------|--------|------|
| 1 | TC-01 | Leave the required fields blank | 1. Leave required fields blank <br/> 2. Click on the Login button | N/A | Highlight all required fields. | Not highlight all fields | Only highlight 1 field at a time |
| 2 | TC-02 | User log in| 1. Enter valid values in the required fields <br/> 2. Click the Login button | name: 'admin', password: 'admin'| 1. Users log in successfully <br/> 2. Home page for user show up according to user role (in this case show admin_home page) | User login to admin_home page successfully| N/A |
| 3 | TC-03  | User input name already exits | Enter valid data in required fields, but on name field enter an exits name (in this case 'acc1') <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'abc', email: 'abc@ee.com' | A message show: User name already taken | A message show: User name already taken | N/A |
| 4 | TC-04  | User input password and confirm pasword not match | Enter valid data in required fields, but different password and confirm password <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'aaaa', email: 'abc@ee.com' | A message show: Password not match | A message show: Password not match | N/A |
| 5 | TC-05  | User input name already exits, password and confirm pasword not match | Enter valid data in required fields, but name exits, different password and confirm password <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'aaaa', email: 'abc@ee.com' | Show both error message: Password not match and Name is taken| Only a message show: Name is taken | N/A |
| 6 | TC-06 | 1. User input wrong format email (without @ symbol <br> 2. With random string instead of a real email <br> 3. Without a dot in the email address | 1. Enter Invalid Emails <br/> 2. Click on the Register Button | 1. admingmail.com <br/> 2. admin@dfsd.com <br/> 3. admin@mailcom <br/> 4. @gmail | A message show for all case: Email is not valid | Only show error for case 1, 4. | N/A | 



## Conclusion
.m.)b
