import api from "../api/api";

export default {

    // Session-Cookie von Laravel Sanctum API abrufen
    createSession() {
        return api.get("http://localhost/sanctum/csrf-cookie");

    },

    login(params) {
        return api.post("http://localhost:8000/api/admin/login");
    },

    logout() {
        return api.delete("http://localhost:8000/api/admin/logout");
    },

    getAussteller() {
        return api.get("http://localhost:8000/api/aussteller");
    }
}