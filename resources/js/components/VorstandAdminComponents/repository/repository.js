import api from "../api/api";

export default {

  // Session-Cookie von Laravel Sanctum API abrufen
  createSession() {
    return api.get("/sanctum/csrf-cookie");

  },

  login(params) {
    return api.post("/api/admin/login");
  },

  logout() {
    return api.delete("/api/admin/logout");
  },

  getAussteller() {
    return api.get("/api/aussteller");
  },

  getNews() {
    return api.get("/api/news");
  },

  postFotogalerie(formData) {
    return api.post("/api/imageupload", formData);
  },

  getProgramm() {
    return api.get("/api/programm");
  },

  getHomeContent() {
    return api.get("/api/homecontent");
  },
}
