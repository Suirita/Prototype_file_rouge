// import $ from 'jquery';
// role = $('#role').value;
role = document.querySelector('#role')
role.addEventListener('change',function(){
    if(role.value === 'admin'){
        permissions = document.querySelectorAll('.form-check-input')
        permissions.forEach(permission => {
            permission.checked = true;
            permission.disabled = true;
        })}else if(role.value === 'user'){
        permissions = document.querySelectorAll('.form-check-input')
        permissions.forEach(permission => {
            if(permission.value === 'public'){
            permission.checked = true;
            permission.disabled = true;}else{
                permission.checked = false;
                permission.disabled = false;
            }
           
        });
    }
})