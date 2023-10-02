import axios from "axios";

(() => {

    const logout = document.getElementById('logout')

    if(!logout) return false

    const logoutRoute = logout.getAttribute('href')

    logout.addEventListener('click', e => {
        e.preventDefault()

        axios.post(logoutRoute)
            .then(e => {
                location.reload()
            }).catch(error => {
                location.reload()
        })
    })

})()
