// @author Gufran Ahmad
function message(icon,message,timer){

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: timer,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: icon,
            title: message,
           
        })
}
function redirectURL(url,timer)
{
    setTimeout(function () {
        window.location.href = url; //will redirect to your dashboard page
     }, timer);
}