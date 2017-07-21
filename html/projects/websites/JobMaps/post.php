<?php // Example 21-3: setup.php
include_once 'header.php';
?>
  	<div align="center">
    <h2>Job Posting</h2>        
    <form action="insert.php" method="post" onSubmit="myFunction()">
    <table width="300" height="100%" align="center" cellpadding="10">
    <tr>
    <td>Company:<font color="#FF0000">*</font></td><td><input type="text" name="cname" autofocus required></td>
    </tr>
    <tr>
    <td>Position Title:<font color="#FF0000">*</font></td><td><input type="text" name="title" required></td>
    </tr>
    <tr>
    <td>Category<font color="#FF0000">*</font></td><td><select name='category' required>---Select One---
    <option value="Accounting">Accounting</option> 
    <option value="Administrative/Clerical">Administrative/Clerical</option> 
    <option value="Banking">Banking</option> 
    <option value="Business">Business</option> 
    <option value="Customer Service">Customer Service</option> 
    <option value="Engineering">Engineering</option> 
    <option value="Food &amp; Beverage">Food &amp; Beverage</option> 
    <option value="Government">Government</option> 
    <option value="Hospitality">Hospitality</option> 
    <option value="Human Resources">Human Resources</option> 
    <option value="Information Technology">Information Technology</option> 
    <option value="Internships">Internships</option>
    <option value="Law">Law</option> 
    <option value="Marketing">Marketing</option> 
    <option value="Media &amp; Journalism">Media &amp; Journalism</option> 
    <option value="Medical">Medical</option> 
    <option value="Nurse">Nurse</option> 
    <option value="Programmer">Programmer</option> 
    <option value="Real Estate">Real Estate</option> 
    <option value="Retail">Retail</option> 
    <option value="Sales">Sales</option> 
    <option value="Telecommunications">Telecommunications</option> 
    <option value="Transportation">Transportation</option> 
    <option value="Web Design">Web Design</option>    
    </select></td>
    </tr>
    <tr>
    <td>Salary<font color="#FF0000">*</font></td><td><select name='salary' required>---Select One---
    <option value="20000+">20000+</option>
    <option value="40000+">40000+</option>
    <option value="60000+">60000+</option>
    <option value="80000+">80000+</option>
    <option value="100000+">100000+</option>
    <option value="120000+">120000+</option>
    </select></td>
    </tr>
    <tr>
    <td>Job Type<font color="#FF0000">*</font></td>
    <td><input type="radio" name='type' value="Full Time" id="type" > Full Time
    <br><input type="radio" name='type' value="Part Time" id="type" > Part Time
    <br><input type="radio" name='type' value="Freelance" id="type" > Freelance
    <br><input type="radio" name='type' value="Contract" id="type" > Contract
    <br><input type="radio" name='type' value="Internship" id="type" > Internship</td>
    </tr>
    <tr>
    <td>Address:<font color="#FF0000">*</font> </td>
    <td><input type="text" name="address" required></td>
    </tr><tr><td>       </td><td>  <input type="text" name="address2" placeholder="Suite, Bldg, Floor"></td>
    </tr><tr><td>City:  <font color="#FF0000">*</font> </td><td> <input type="text" name="city" required></td></tr>
    <tr><td>State:<font color="#FF0000">*</font></td><td><select name='state'>---Select One---
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>	</td></tr>			
       <tr><td>Zip Code:<font color="#FF0000">*</font></td><td> <input type="text" name="zip" required></td></tr>    
       <tr>
         <td>Details and Requirements:<font color="#FF0000">*</font></td><td><textarea name="description" rows="10" cols="50" required></textarea></td></tr>
        <tr><td><input type="submit" value=" Submit Job "></td><td><button type="reset" value="Reset">Reset</button></td></tr>
       </table>
        </form>	
    </div>