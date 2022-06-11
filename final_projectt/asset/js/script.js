function validateForm() {
            if (document.forms["formRegist"]["firstName"].value == "") {
                alert("Nama Depan Tidak Boleh Kosong");
                document.forms["formRegist"]["firstName"].focus();
                return false;
            }
            if (document.forms["formRegist"]["email"].value == "") {
                alert("Email Tidak Boleh Kosong");
                document.forms["formRegist"]["email"].focus();
                return false;
            }
            if (document.forms["formRegist"]["password"].value == "") {
                alert("Password Tidak Boleh Kosong");
                document.forms["formRegist"]["password"].focus();
                return false;
            }
            if (document.forms["formRegist"]["address"].value == "") {
                alert("Address Tidak Boleh Kosong");
                document.forms["formRegist"]["address"].focus();
                return false;
            }
            if (document.forms["formRegist"]["city"].value == "") {
                alert("City Tidak Boleh Kosong");
                document.forms["formRegist"]["city"].focus();
                return false;
            }
            if (document.forms["formRegist"]["province"].value == "") {
                alert("Province Tidak Boleh Kosong");
                document.forms["formRegist"]["province"].focus();
                return false;
            }
        }
function validate() {
    if (document.getElementById("publish")) {
        const publish = confirm("Publish Hasil Konsultasi?");
        if (publish) {
            return true;
            
        }else{
            return false;
        }
    }
    
}
function validate1() {
    if (document.getElementById("publish1")) {
        const publish = confirm("Publish Hasil Konsultasi?");
        if (publish) {
            return true;
            
        }else{
            return false;
        }
    }    
}
function deletevalidate() {
    if (document.getElementsByName("dlt")) {
        const dlt = confirm("Delete Data?");
        if (dlt) {
            return true; 
            
        }else{
            return false;
        }
    }    
}