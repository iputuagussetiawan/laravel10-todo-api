import api from "./api"
const resource="/users"
export const allUser=()=>api.get(resource)
export const createUser=()=>user=>api.post(resource,user)
export const updateUser=(id,user)=>api.put(`${resource}/${id}`,user)
export const removeUser=id=>api.delete(`${resource}/${id}`)