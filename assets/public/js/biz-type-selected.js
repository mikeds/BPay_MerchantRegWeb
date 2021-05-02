$(document).ready(function(){
    $("#biz-type").change(function() {
        var bizID = $(this).val();
        var txtDesc = "Valid ID's and DTI or Mayor's Permit.";

        if (bizID == 1) {
            txtDesc = "Valid ID's and DTI or Mayor's Permit.";
        } else if (bizID == 2) {
            txtDesc = "Valid IDs, SEC Business Registation & General Info Sheet, Articles of Incorporations & By Laws, DTI or Business Permit, Board Resolution/Secretary's Certificate, Business or Mayor's Permit.";
        } else if (bizID == 3) {
            txtDesc = "Valid ID's, Cooperative Dev't. Authority Certificate of Registration, Board Resolution of Cooperative.";
        } else if (bizID == 4) {
            txtDesc = "Valid ID's, Appointment Letter, Special Power of Attorney, Board Resolution/Secretary's Certificate, BIR Certificate of Registration.";
        } else {
            txtDesc = "Valid ID's and DTI or Mayor's Permit.";
        }

        $('.biz-type-desc').html(txtDesc);
    });
});