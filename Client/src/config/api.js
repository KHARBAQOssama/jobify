import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:8000/api/",
  headers: {
    "content-Type": "application/json",
    accept: "application/json",
  },
});

api.interceptors.request.use((config) => {
  const token = JSON.parse(localStorage.getItem("token"));
  if (token) {
    config.headers.Authorization = `Bearer ${token.access_token}`;
  }
  return config;
});

export default api;
