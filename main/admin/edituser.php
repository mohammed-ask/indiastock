<?php
include "main/session.php";
$id = $_GET['hakuna'];
$rowuser = $obj->selectextrawhere('users', 'id="' . $id . '"')->fetch_assoc();
?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('id', '<?= $id ?>', 'updateuser', 'resultid', 'adduser');return 0;">
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input name="username" data-bvalidator="required" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['name'] ?>" placeholder="Client's Name" />
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <input name="email" data-bvalidator="required,email" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['email'] ?>" placeholder="Client's Email ID" />
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Mob No.</span>
        <input data-bvalidator="required,digit,minlength[10],maxlength[10]" name="mobileno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['mobile'] ?>" placeholder="Client's Mobile No." />
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">DOB</span>
        <input id="date" data-bvalidator="required,gap18year" onfocus="setcalenderlimit(this.id,'')" data-bvalidator-msg-gap18year="Customer Should be minimum 18 year Old" name="dob" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= changedateformatespecito($rowuser['dob'], "Y-m-d", "d/m/Y") ?>" placeholder="Date of Birth" /></label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Address</span>
        <input data-bvalidator="required" name="address" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['address'] ?>" placeholder="Client's Address" />
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Aadhar No.</span>
        <input data-bvalidator="required" name="adharno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['adharno'] ?>" placeholder="Enter 12 Digit Aadhar No." /></label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">PAN No.</span>
        <input data-bvalidator="required" name="panno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['panno'] ?>" placeholder="Client's Pan No." /></label>

    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Bank Name</span>
        <input data-bvalidator="required" name="bankname" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['bankname'] ?>" placeholder="eg. BOI, State bank of India, Kotak etc..." /></label>

    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Account No.</span>
        <input data-bvalidator="required" name="accountno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['accountno'] ?>" placeholder="Client's A/c No." /></label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">IFSC Code</span>
        <input data-bvalidator="required" name="ifsc" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['ifsc'] ?>" placeholder="IFSC Code of Bank" /></label>

    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Investment Amt.</span>
        <input type="number" name="investmentamount" data-bvalidator="required" step="any" onfocus="this.select()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['investmentamount'] ?>" readonly placeholder="Client's Investment" /></label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Limit</span>
        <input type="number" name="limit" data-bvalidator="required" step="any" onfocus="this.select()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowuser['limit'] ?>" placeholder="Client's Limit on Investment" /></label>
        <div class="row">
    <label class="col-6 block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Withdrawel Request Start Time</span>
        <input name="starttime" id="starttime" value="<?= changedateformatespecito($rowuser['startdatetime'], "Y-m-d H:i:s", "d/m/Y H:i:s") ?>" data-bvalidator="required" onfocus="datetimepicker(this.id)" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Select Start Time" />
    </label>
    <label class="col-6 block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Withdrawel Request End Time</span>
        <input name="endtime" id="endtime" value="<?= changedateformatespecito($rowuser['enddatetime'], "Y-m-d H:i:s", "d/m/Y H:i:s") ?>" data-bvalidator="required" onfocus="datetimepicker(this.id)" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Select End Time" />
    </label></div>
    <!-- <label class="block text-md" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Withdrawel Request Start Time</span>
        <select data-bvalidator="required" class="form-control select2" name="starttime" id="starttime">
            <?php
            //for ($i = 0; $i <= 23; $i++) {
            ?>
                <option <?php //echo ($i == $rowuser['starttime']) ? 'selected="selected"' : ""; 
                        ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            //}
            ?>
        </select>
    </label><br>
    <label class="block text-md" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Withdrawel Request End Time</span>
        <select data-bvalidator="required" class="form-control select2" name="endtime" id="endtime">
            <?php
            //for ($i = 0; $i <= 23; $i++) {
            ?>
                <option <?php //echo ($i == $rowuser['endtime']) ? 'selected="selected"' : ""; 
                        ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            //}
            ?>
        </select>
    </label><br> -->
    <label class="block text-sm" style="margin-bottom: 5px;position:relative">
        <span class="text-gray-700 dark:text-gray-400">Change Password</span>
        <input type="password" id="password" value="<?= $rowuser['password'] ?>" name="password" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Please Give Strong Password!" />
        <i id="eye" class="fa fa-eye" style="position: absolute;top:34px;right:10px;z-index:50" aria-hidden="true"></i>
    </label>
    <!-- <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
        <input type="password" id="confirmpassword" data-bvalidator="matchconfirmpassword[password]" data-bvalidator-msg-matchconfirmpassword="Confirm Password Not Matched" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Confirm Password" />
    </label> -->
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Employee ID</span>
        <input xdata-bvalidator="required" name="employeeref" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" disabled value="<?= $rowuser['employeeref'] === '' ? 'NA' : $rowuser['employeeref'] ?>" placeholder="Employee ID For Furthur Reference" /></label>
    <div>
        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium hidden">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>
<script>
    $('select').select2()
</script>