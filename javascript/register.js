const openModal = document.querySelector('#buttonOpen');
const closeModal = document.querySelector('#closeButton');
const modal = document.querySelector('#regDialog');
const modal2 = document.querySelector('#logDialog');
const openModal2 = document.querySelector('#register');
const closeModal2 = document.querySelector('#closeLogin'); 
const openModal3 = document.querySelector('#login');
const switchB = document.querySelector('#regClick');

function LoginValidation(){
    var uName2 = document.getElementById("usernameL").value;
    var pWord2 = document.getElementById("passwordL").value;
    if(uName2 == "" && pWord2 == ""){
        modal2.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Fields are empty",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
    return false;
    }
    else if(uName2 == ""){
        modal2.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Username is empty",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
    return false;
    }else if(pWord2 == ""){
        modal2.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Password is empty",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
    return false;
    }
}

function formValidation(){
    var eMail = document.getElementById("email").value;
    var uName = document.getElementById("username").value;
    var pWord1 = document.getElementById("password1").value;
    var pWord2 = document.getElementById("password2").value;
    if(eMail == ""){
        modal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Email is empty!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
    return false;
    }
    else if(uName == ""){
        modal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Username is empty",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
    return false;
    }
    else if(pWord1 == ""||pWord2 == ""){
        modal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Passwords are empty!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
        return false;
    }else if(pWord1 != pWord2){
        modal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Passwords are not the same!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
        return false;
    }else if(uName.length <= 7){
        modal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Username is too short",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
        return false;
    }else if(pWord1.length <= 7){
        modal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Password is too short",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        modal.showModal();
        }
        })
        return false;
    }

}

openModal3.addEventListener('click', ()=>{
    modal2.showModal();
})

closeModal2.addEventListener('click',()=>{
    modal2.close();
})

openModal.addEventListener('click', ()=>{
    modal.showModal();
})

openModal2.addEventListener('click', ()=>{
    modal.showModal();
})

closeModal.addEventListener('click',()=>{
    modal.close();
})

switchB.addEventListener('click', ()=>{
    modal2.close();
    modal.showModal();
})

