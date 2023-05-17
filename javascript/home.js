const addModal = document.querySelector('#newTask');

const openNew = document.querySelector('#newT');
const NewDialog = document.querySelector('#newTask');
const CloseDialog = document.querySelector('#closeNewT');
const closeDialog = document.querySelector('body');
const viewDialog = document.querySelector('#viewTask');
const openviewDialog = document.querySelector('#view');
const closeviewDialog = document.querySelector('#closeNewT2');
const editDialog = document.querySelector('#editTask');
const openeditDialog= document.querySelector('#edit')
const closeeditDialog = document.querySelector('#closeNewT3');
const openchangePdialog = document.querySelector('#changePdialog');
  

function taskValidation(){
    var titleTD = document.getElementById("titleTD").value;
    var contentTD = document.getElementById("contentTD").value;
    var dateTD = document.getElementById("dateTD").value;
    

    if(titleTD == "" && contentTD == "" && dateTD == ""){
        addModal.close();;
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
        addModal.showModal();
        }
        })
    return false;
    }else if(titleTD == ""){
        addModal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Title is empty",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        addModal.showModal();
        }
        })
    return false;
    }else if(contentTD == ""){
        addModal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "Content is empty",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        addModal.showModal();
        }
        })
    return false;
    }else if(dateTD == ""){
        addModal.close();
        Swal.fire({
        title: 'Something went wrong!',
        text: "date is empty",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Try again'
        }).then((result) => {
        if (result.isConfirmed) {
        addModal.showModal();
        }
        })
    return false;
    }
}

    openNew.addEventListener('click',()=>{
    NewDialog.showModal();
    })
    
    CloseDialog.addEventListener('click',()=>{
        NewDialog.close();
    })

    openviewDialog.addEventListener('click',()=>{
        viewDialog.showModal();
    })

    closeviewDialog.addEventListener('click',()=>{
        viewDialog.close();
    })

    openeditDialog.addEventListener('click',()=>{
        editDialog.showModal();
    })

    closeeditDialog.addEventListener('click',()=>{
        editDialog.close();
    })


    