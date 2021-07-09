import axios from "axios";

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
    return request;
});

instance.interceptors.response.use(
    response => { return response; },
    error => { return Promise.reject(error); }
);

export default instance;