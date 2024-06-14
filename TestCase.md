Author: KietVuB19  
Date: 12/06/2024

Required fields are:
1. ID 
2. UserName
3. Password
4. Confirm Password 
5. Roles
6. Status
7. Attempts
8. Last_attempts


## Test Cases for Registration Page

- Name, password, confirm password are mandatory fields
- There is a Log in button at the bottom of the form to redirect to Log in page
- A message is showed after user click on button Register


| No. | Test Cases | Description | Steps To Execute | Test Data / Input  | Epected Results  | Actual output | Note |
|-----|------------|-------------|------------------|--------------------|-------------------|--------|------|
| 1 | TC-01 | Leave the required fields blank | 1. Leave required fields blank <br/> 2. Click on the Register button | N/A | Highlight all required fields. | Not highlight all fields | Only highlight 1 field at a time |
| 2 | TC-02 | Check user should Register by filling all the required fields with no name exits on db, password match with confirm password| 1. Enter valid values in the required fields <br/> 2. Click the Register button | name: 'admin', password: 'abc', confirm password: 'abc', email: 'abc@ee.com'| 1. Users should be registered successfully <br/> 2. A successful registration message should show up <br/> 3. Mail should be sent to the user | User register success but no mail sent to user email | Func send_email error |
| 3 | TC-03  | User input name already exits | Enter valid data in required fields, but on name field enter an exits name (in this case 'acc1') <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'abc', email: 'abc@ee.com' | A message show: User name already taken | A message show: User name already taken | N/A |
| 4 | TC-04  | User input password and confirm pasword not match | Enter valid data in required fields, but different password and confirm password <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'aaaa', email: 'abc@ee.com' | A message show: Password not match | A message show: Password not match | N/A |
| 5 | TC-05  | User input name already exits, password and confirm pasword not match | Enter valid data in required fields, but name exits, different password and confirm password <br/> 2. Click on the Register button | name: 'acc1', password: 'abc', confirm password: 'aaaa', email: 'abc@ee.com' | Show both error message: Password not match and Name is taken| Only a message show: Name is taken | N/A |
| 6 | TC-06 | 1. User input wrong format email (without @ symbol <br> 2. With random string instead of a real email <br> 3. Without a dot in the email address | 1. Enter Invalid Emails <br/> 2. Click on the Register Button | 1. admingmail.com <br/> 2. admin@dfsd.com <br/> 3. admin@mailcom <br/> 4. @gmail | A message show for all case: Email is not valid | Only show error for case 1, 4. | N/A | 


</br>

## Test Cases for Login Page

| No. | Test Cases | Description  | Steps To Execute| Expected Results |
|-----|------------|--------------|-----------------|------------------|
|1 | TC-01 | Check all the text boxes and buttons| Check Page | 1. UI should be perfect <br> 2. Text boxes and button should be aligned |
|2 | TC-02 | Check the required fields by not filling in any data. | 1. Enter an invalid username <br/> 2. Enter the correct password <br/> 3. Click on the Login button | The user should not log in and should show a proper error message |
|3 | TC-03 | Check when passing a correct username and invalid password| 1. Enter a valid username <br/> 2. Enter an incorrect password <br/> 3. Click on Login Button | The user should not log in, and a proper error message should show up |
|4 | TC-04 | Check Keeping Password | 1. Enter valid username <br/> 2. Do not enter password <br/> 3. Click on Login Button  | User should not log in, and a proper error message should show up |
|5 | TC-05 | Check when passing correct email and password | 1. Enter a valid username <br/> 2. Enter a valid password <br/> 3. Click on Login Button| User should log in |


## Conclusion
.m.)b
