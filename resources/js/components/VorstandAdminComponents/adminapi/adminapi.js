import axios from 'axios';

/**
 * Globaler axios wrapper zur Wiederverwendung
 */
let instance = axios.create({
    withCredentials: true //siehe CORS-config Laravel
});

//Dem Request die nötigen Headercredentials mitgeben
instance.interceptors.request.use(request => {
    request.headers.common['Accept'] = 'application/json'; //Accept Header setzen
    request.headers.common['Content-Type'] = 'application/json'; //Accept Header setzen
    request.headers.common['Authorization'] = `Bearer ${token}`;
    return request;
});

instance.interceptors.response.use(
    response => { return response; },
    error => { return Promise.reject(error); }
);

export default instance;


/*
axios.defaults.headers.common = { 'Authorization': `Bearer ${token}` }

let api = ()=>{
    let token = localStorage.getItem('token');
    if(token){
        axiosInstance.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    }
    return axiosInstance;
}

import axios from "axios";*/







