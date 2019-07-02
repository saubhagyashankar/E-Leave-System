document.getElementById('home').addEventListener("click",home);
document.getElementById('apply').addEventListener("click",apply);
document.getElementById('cancel').addEventListener("click",cancel);
document.getElementById('history').addEventListener("click",history);
document.getElementById('approve').addEventListener("click",approve);
document.getElementById('contact').addEventListener("click",contact);


function home(){
window.location.href="house.php";
}

function approve(){
    window.location.href="approve.php";
    }

function apply(){
    window.location.href="apply.php";
}
function cancel(){
    window.location.href="cancel.php";
}
function history(){
    window.location.href="history.php";
}
function contact(){
    window.location.href="contact.php";
}